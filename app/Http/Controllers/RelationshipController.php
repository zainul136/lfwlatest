<?php

namespace App\Http\Controllers;

use App\Http\Controllers\RelativeController;
use App\Models\Family;
use App\Models\Relationship;
use App\Models\TrustedContact;
use App\Models\User;
use App\Models\UserRelationship;
use App\Models\UserInformation;
use App\Http\Controllers\HomeController;
use App\Models\UserTree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RelationshipController extends Controller
{
    public function showRequests()
    {
        $loggedInUser = Auth::user();

        $users = UserRelationship::where('relative_id', $loggedInUser->id)
            ->where('status', 'pending')
            ->with(['relative', 'relationship:id,type'])
            ->get();

        $title = "Requests | Last Few Words";
        $data = (new NavigationController)->get_data_internal_pages();

        return view('requests', compact('users', 'title', 'data'));
    }






    public function showSentRequests()
    {
        $loggedInUser = Auth::user();

        $relativeIds = UserRelationship::where('user_id', $loggedInUser->id)
            ->where('status', 'pending')
            ->pluck('relative_id'); // Get a collection of relative_id values
        $users = User::with('userInformation') // Assuming your relationship is defined in the User model
        ->whereIn('id', $relativeIds)
            ->get();

        $title = "Requests | Last Few Words";
        $data = (new NavigationController)->get_data_internal_pages();

        return view('sentRequests', compact('users', 'title', 'data'));
    }
    public function approveRequest($userRequested)
    {
        $loggedInUserId = Auth::id();

        $userRelationshipId = UserRelationship::where('user_id', $userRequested)
            ->where('relative_id', $loggedInUserId)
            ->value('relationship_id');

        $userRelationshipType = Relationship::where('id', $userRelationshipId)->value('type');

        $userGender = UserInformation::where('user_id', $userRequested)->value('gender');
        // Get the inverse relationship type
        $inverseRelationshipType = (new RelativeController)->getInverseRelationshipType($userRelationshipType, $userGender);
        $inverseRelationshipId = Relationship::where('type', $inverseRelationshipType)->value('id');
        // Check if the inverse relationship already exists
        $existingInverseRelationship = UserRelationship::where('user_id', $loggedInUserId)
            ->where('relative_id', $userRequested)
            ->where('relationship_id', $inverseRelationshipId)
            ->first();

        $originalRelationship = UserRelationship::where('user_id', $userRequested)
            ->where('relative_id', $loggedInUserId)
            ->where('status', 'pending')
            ->first();

        if ($originalRelationship) {
            $originalRelationship->status = 'approved';
            $originalRelationship->save();
        }

        if ($userRelationshipType == 'Mother' || $userRelationshipType == 'Father') {
            if ($userRelationshipType) {
                $existingUserTree = UserTree::where('user_id', $userRequested)->first();
                if ($existingUserTree) {
                    $existingUserTree->f_id = $userRelationshipType == 'Father' ? $loggedInUserId : $existingUserTree->f_id;
                    $existingUserTree->m_id = $userRelationshipType == 'Mother' ? $loggedInUserId : $existingUserTree->m_id;
                    $existingUserTree->save();
                } else {
                    // Create a new UserTree
                    $userTree = new UserTree();
                    $userTree->user_id = $userRequested;
                    $userTree->f_id = $userRelationshipType == 'Father' ? $loggedInUserId : null;
                    $userTree->m_id = $userRelationshipType == 'Mother' ? $loggedInUserId : null;
                    $userTree->save();
                }
            }
        }

        if ($userRelationshipType === 'Wife' ||  $userRelationshipType === 'Husband' ){

            $entryPartner = new UserTree();
            $entryPartner->user_id  = $userRequested;
            $entryPartner->p_id = Auth::id();
            $entryPartner->save();

            $entryPartner = new UserTree();
            $entryPartner->user_id  = Auth::id();
            $entryPartner->p_id = $userRequested;
            $entryPartner->save();
        }

        $newRelationship = new UserRelationship();
        $newRelationship->user_id = $loggedInUserId;
        $newRelationship->relative_id = $userRequested;
        $newRelationship->relationship_id = $inverseRelationshipId;
        $newRelationship->status = 'approved';
        $newRelationship->save();
        if (!$existingInverseRelationship) {
            DB::beginTransaction();
            try {
                // Create the inverse relationship entry
                UserRelationship::create([
                    'user_id' => $loggedInUserId,
                    'relative_id' => $userRequested,
                    'relationship_id' => $inverseRelationshipId,
                    'status' => 'approved'
                ]);

                //Code for create family member
                $family = new Family();
                $family->user_id = $userRequested;
                $family->relationship_id = $inverseRelationshipId;
                $family->first_name = Auth::user()->first_name ?? '';
                $family->last_name = Auth::user()->last_name ?? '';
                $family->email = Auth::user()->email ?? '';
                $family->date_of_birth = Auth::user()->user_information->date_of_birth ?? '';
                $family->country = Auth::user()->user_information->country ?? '';
                $family->lat = Auth::user()->user_information->latitude ?? '';
                $family->long = Auth::user()->user_information->longitude ?? '';
                $family->save();

                // Commit the transaction
                DB::commit();

                return response()->json(['message' => 'Request approved and inverse relationship created'], 200);
            } catch (\Exception $e) {
                // Roll back the transaction in case of an exception
                DB::rollBack();

                return response()->json(['message' => 'Failed to process the request'], 400);
            }
        }



        return response()->json(['message' => 'Requests approved'], 200);
    }

    public function cancelRequest($id)
    {
        $loggedInUserId = Auth::id();

        UserRelationship::where(function ($query) use ($loggedInUserId, $id) {
            $query->where('user_id', $loggedInUserId)
                ->where('relative_id', $id);
        })->orWhere(function ($query) use ($loggedInUserId, $id) {
            $query->where('user_id', $id)
                ->where('relative_id', $loggedInUserId);
        })->delete();
        return 200;
    }

    public function addTrustedContact(Request $request){
        $trustedContact = new TrustedContact();
        $trustedContact->user_id = Auth::id();
        $trustedContact->trusted_contact_id = $request->trusted_contact_id;
    }

    public function removeTrustedContact(Request $request){
        $trustedContact = TrustedContact::where('user_id', Auth::id())->where('trusted_contact_id', $request->trusted_contact_id)->first();
        $trustedContact->delete();
    }

    public function getTrustedContacts(){
        $trustedContacts = TrustedContact::where('user_id', Auth::id())->get();
        $trustedContacts->load('trustedContact');
        return $trustedContacts;
    }
}
