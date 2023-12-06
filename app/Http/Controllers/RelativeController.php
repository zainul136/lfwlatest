<?php

namespace App\Http\Controllers;

use App\Models\DeathConfirmation;
use App\Models\User;
use App\Models\Relationship;
use App\Models\UserInformation;
use App\Models\UserRelationship;
use App\Models\UserTree;
use Carbon\Carbon;
use Cassandra\Type\UserType;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RelativeController extends Controller
{

    public function addRelative(Request $request)
    {

        $this->validate($request, [
            'user-id' => 'required|integer',
            'relationship' => 'required|string',
        ]);

        $userId = $request->input('user-id');
        $myID = Auth::id();
        $relationshipType = $request->input('relationship');

        $authUserExists = UserTree::where('user_id', $myID)->first();
        $userExists = UserTree::where('user_id', $userId)->first();

        if (isset($authUserExists)){
            if ($authUserExists) {
                $user_id = $userId;
            } elseif($userExists){
                $user_id = $myID;
            }

            $newUserTree = new UserTree();
            $newUserTree->user_id = $user_id;

            if ($authUserExists) {
                $newUserTree->f_id = $authUserExists->f_id;
                $newUserTree->m_id = $authUserExists->m_id;
            }
            if ($userExists) {
                $newUserTree->f_id = $userExists->f_id;
                $newUserTree->m_id = $userExists->m_id;

            }
            $newUserTree->save();

        }

        if ($request->email) {
            DB::transaction(function () use ($request, $userId, $myID, $relationshipType) {
                $newCreateParent = User::create([
                    'email' => $request->email,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'password' => Hash::make('password')
                ]);
                UserInformation::create([
                    'user_id' => $newCreateParent->id,
                    'date_of_birth' => $request->data_of_birth,
                    'gender' => $request->gender,
                ]);
                DeathConfirmation::create([
                    'user_id' => $newCreateParent->id,
                ]);

                $relationshipID = 0;
                if ($request->gender == "Male") {
                    $relationshipID = 4; //Father
                } else {
                    $relationshipID = 3; //Mother
                }

                //get gender of $user_id
                $genderUser01 = UserInformation::where('user_id', $userId)->first()->gender; //Waqas
                //get gender of $myID
                $genderUser02 = UserInformation::where('user_id', $myID)->first()->gender; //Kainat

                if ($genderUser01 == "Male") {
                    UserRelationship::create([
                        'user_id' => $newCreateParent->id,
                        'relative_id' => $userId,
                        'relationship_id' => 8,
                        'status' => 'approved'
                    ]);

                    UserRelationship::create([
                        'user_id' => $userId,
                        'relative_id' => $newCreateParent->id,
                        'relationship_id' => $relationshipID,
                        'status' => 'approved'
                    ]);
                } else {
                    UserRelationship::create([
                        'user_id' => $newCreateParent->id,
                        'relative_id' => $userId,
                        'relationship_id' => 7,
                        'status' => 'approved'
                    ]);

                    UserRelationship::create([
                        'user_id' => $userId,
                        'relative_id' => $newCreateParent->id,
                        'relationship_id' => $relationshipID,
                        'status' => 'approved'
                    ]);
                }

                if ($genderUser02 == "Male") {
                    UserRelationship::create([
                        'user_id' => $newCreateParent->id,
                        'relative_id' => $myID,
                        'relationship_id' => 8,
                        'status' => 'approved'
                    ]);

                    UserRelationship::create([
                        'user_id' => $myID,
                        'relative_id' => $newCreateParent->id,
                        'relationship_id' => $relationshipID,
                        'status' => 'approved'
                    ]);
                } else {
                    UserRelationship::create([
                        'user_id' => $newCreateParent->id,
                        'relative_id' => $myID,
                        'relationship_id' => 7,
                        'status' => 'approved'
                    ]);

                    UserRelationship::create([
                        'user_id' => $myID,
                        'relative_id' => $newCreateParent->id,
                        'relationship_id' => $relationshipID,
                        'status' => 'approved'
                    ]);
                }
                $userTree = new UserTree();
                $userTree->user_id = $userId;
                $userTree->f_id = $request->gender == 'Male' ? $newCreateParent->id : null;
                $userTree->m_id = $request->gender == 'Female' ? $newCreateParent->id : null;

                $userTree->save();

                $userTree = new UserTree();
                $userTree->user_id = $myID;
                $userTree->f_id = $request->gender == 'Male' ? $newCreateParent->id : null;
                $userTree->m_id = $request->gender == 'Female' ? $newCreateParent->id : null;
                $userTree->save();
            });
        }

        // Find or create the relationship type
        $relationship = Relationship::firstOrCreate(['type' => $relationshipType]);
        // Determine the inverse relationship based on the logged-in user's gender
        $userGender = Auth::user()->user_information->gender;
        $inverseRelationshipType = $this->getInverseRelationshipType($relationshipType, $userGender);

        // Check if the relationship already exists for the main relationship
        $existingRelationship = UserRelationship::where('user_id', $userId)
            ->where('relative_id', $myID)
            ->where('relationship_id', $relationship->id)
            ->first();

        if (!$existingRelationship) {
            DB::transaction(function () use ($relationshipType, $myID, $userId, $relationship, $inverseRelationshipType) {
                $relationship = Relationship::firstOrCreate(['type' => $relationshipType]);

                if (!empty($inverseRelationshipType)) {
                    $inverseRelationship = Relationship::firstOrCreate(['type' => $inverseRelationshipType]);
                }

                UserRelationship::firstOrCreate([
                    'user_id' => $myID,
                    'relative_id' => $userId,
                    'relationship_id' => $relationship->id,
                    'status' => "pending",
                ]);
            });

            return redirect()->back()->with('requestSent', true);
        } else {
            return redirect()->back()->with('requestSent', false);
        }

    }
    public function checkParentData(Request $request)
    {
        $authId = Auth::id();
        $userId = $request->input('userId');

        $authUserExists = UserTree::query()->where('id', $authId)->exists();
        $userExists = UserTree::query()->where('id', $userId)->exists();

        $hasUser = $authUserExists || $userExists;

        if ($hasUser) {

            $hasParentData = User::whereIn('id', [$authId, $userId])->with('userTree')->exists();

            return response()->json(['hasUser' => true, 'hasParentData' => $hasParentData]);
        } else {
            return response()->json(['hasUser' => false]);
        }
    }
    private function getRelationshipId($relationshipType)
    {
        $relationship = Relationship::where('type', $relationshipType)->first();
        if ($relationship) {
            return $relationship->id;
        }
    }

    public function getInverseRelationshipType($relationshipType, $gender)
    {
        // Define the inverse relationship types
        $inverseRelationshipTypes = [
            'Brother' => [
                'Male' => 'Brother',
                'Female' => 'Sister'
            ],
            'Sister' => [
                'Male' => 'Brother',
                'Female' => 'Sister'
            ],
            'Father' => [
                'Male' => 'Son',
                'Female' => 'Daughter'
            ],
            'Mother' => [
                'Male' => 'Son',
                'Female' => 'Daughter'
            ],
            'Son' => [
                'Male' => 'Father',
                'Female' => 'Mother'
            ],
            'Daughter' => [
                'Male' => 'Father',
                'Female' => 'Mother'
            ],
            'Grandfather' => [
                'Male' => 'Grandson',
                'Female' => 'Granddaughter'
            ],
            'Grandmother' => [
                'Male' => 'Grandson',
                'Female' => 'Granddaughter'
            ],
            'Grandson' => [
                'Male' => 'Grandfather',
                'Female' => 'Grandmother'
            ],
            'Granddaughter' => [
                'Male' => 'Grandfather',
                'Female' => 'Grandmother'
            ],
            'Uncle' => [
                'Male' => 'Nephew',
                'Female' => 'Niece'
            ],
            'Aunt' => [
                'Male' => 'Nephew',
                'Female' => 'Niece'
            ],
            'Nephew' => [
                'Male' => 'Uncle',
                'Female' => 'Aunt'
            ],
            'Niece' => [
                'Male' => 'Uncle',
                'Female' => 'Aunt'
            ],
            'Cousin' => [
                'Male' => 'Cousin',
                'Female' => 'Cousin'
            ],
            'BrotherInLaw' => [
                'Male' => 'BrotherInLaw',
                'Female' => 'SisterInLaw'
            ],
            'SisterInLaw' => [
                'Male' => 'BrotherInLaw',
                'Female' => 'SisterInLaw'
            ],
            'FatherInLaw' => [
                'Male' => 'SonInLaw',
                'Female' => 'DaughterInLaw'
            ],
            'MotherInLaw' => [
                'Male' => 'SonInLaw',
                'Female' => 'DaughterInLaw'
            ],
            'SonInLaw' => [
                'Male' => 'FatherInLaw',
                'Female' => 'MotherInLaw'
            ],
            'DaughterInLaw' => [
                'Male' => 'FatherInLaw',
                'Female' => 'MotherInLaw'
            ],
            'Husband' => [
                'Female' => 'Wife'
            ],
            'Wife' => [
                'Male' => 'Husband'
            ],

            'CloseFriend' => [
                'Male' => 'CloseFriend',
                'Female' => 'CloseFriend'
            ]
        ];

        // Add other relationship types as needed


        // Check if the relationship type and gender are valid
        if (isset($inverseRelationshipTypes[$relationshipType]) && isset($inverseRelationshipTypes[$relationshipType][$gender])) {
            return $inverseRelationshipTypes[$relationshipType][$gender];
        }

        // If the relationship type or gender is not valid, return null or throw an error
        return null;
    }


    public function searchFamily(Request $request)
    {
        $query = $request->input('query');

        // Perform the search using the query and retrieve matching users
        $users = User::where('first_name', 'LIKE', "%{$query}%")
            ->orWhere('last_name', 'LIKE', "%{$query}%")
            ->get();

        // Return the users in JSON format
        return response()->json($users);
    }

    public function showRelationships()
    {
        $loggedInUserId = Auth::id();

        // Fetch the logged-in user's relationships with others and their relationship types
        $relationships = UserRelationship::where('user_id', $loggedInUserId)
            ->with('relationship', 'relative')
            ->get();

        // Get the logged-in user's information
        $user = Auth::user();
        $userInformation = $user->userInformation;
        $age = null;

        if ($userInformation && $userInformation->date_of_birth) {
            $age = Carbon::parse($userInformation->date_of_birth)->age;
        }

        // Pass the data to the view
        $relatives = [
            'user' => $user,
            'age' => $age,
            'relationships' => $relationships,
        ];

        return $relatives;
    }

    public function pendingRequests()
    {
        $loggedInUser = Auth::id();

        $pendingRequests = DB::table('user_relationships')
            ->join('users_information', 'user_relationships.user_id', '=', 'users_information.user_id')
            ->join('users', 'user_relationships.user_id', '=', 'users.id')
            ->where('user_relationships.relative_id', $loggedInUser)
            ->where('user_relationships.status', 'pending')
            ->select('users.id', 'users.first_name', 'users.last_name', 'users.email', 'users_information.profile_picture')
            ->get();
        return response()->json($pendingRequests);
    }
}

