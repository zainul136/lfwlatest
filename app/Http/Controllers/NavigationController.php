<?php



namespace App\Http\Controllers;



use App\Events\DeathConfirmationNotificationEvent;

use App\Models\DeathConfirmation;

use App\Models\Family;

use App\Models\NotificationStatus;

use App\Models\Post;

use App\Models\PrivateTaggedPeople;
use App\Models\Relationship;

use App\Models\TrustedContact;

use App\Models\User;

use App\Models\Tag;

use App\Models\UserInformation;

use App\Models\UserRelationship;

use App\Notifications\DeathConfirmationDatabaseNotification;

use App\Notifications\DeathConfirmationNotification;

use Carbon\Carbon;

use Chatify\Facades\ChatifyMessenger;

use Illuminate\Contracts\View\Factory;

use Illuminate\Contracts\View\View;

use Illuminate\Database\QueryException;

use Illuminate\Foundation\Application;

use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

use Illuminate\Session\Store;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Notification;

use Chatify\Http\Controllers\MessagesController;



use function Illuminate\Events\queueable;



class NavigationController extends Controller

{



    public function __construct()

    {

        $this->middleware('auth');

    }





    public function get_data_internal_pages()

    {

        $data = [];

        $user = Auth::user();



        $user = User::findOrFail($user->id);



        $user_information = $user->userInformation;

        $age = optional($user_information)->date_of_birth ? Carbon::parse($user_information->date_of_birth)->age : "";



        $data['user'] = $user;

        $data['user_information'] = $user_information;

        $data['age'] = $age;



        return $data;

    }





    public function get_data()

    {

        $data = [];

        $user = Auth::user();

        $user = User::findOrFail($user->id);



        $loggedInUserId = Auth::id();



        $posts = $user->posts()

            ->with([

                'postText',

                'postImage',

                'postAudio',

                'postDocument',

                'tags', // Loading directly without conditions

                'tags' => function ($query) use ($loggedInUserId) {

                    $query->where('user_id', $loggedInUserId)

                        ->orWhereNull('user_id');

                },

                'tags.user' // Nested eager loading for the user relationship within tags

            ])

            ->where('post_scope', 'public')

            ->orderByDesc('created_at')

            ->get();



        $user_information = $user->userInformation;



        $age = optional($user_information)->date_of_birth ? Carbon::parse($user_information->date_of_birth)->age : "";



        $tags = Tag::where('user_id', $loggedInUserId)->orWhereNull('user_id')->get();

        $lastTag = $tags->last();



        $data['user'] = $user;

        $data['user_information'] = $user_information;

        $data['age'] = $age;

        $data['posts'] = $posts;

        $data['tags'] = $tags;

        $data['lastTag'] = $lastTag;



        return $data;

    }





    public function register()

    {

        return view('auth.register');

    }



    public function index()

    {

        // Get the currently logged-in user

        $user = Auth::user();

        $loggedInUserId = Auth::id();



        // Fetch the logged-in user's approved relationships with others and their relationship types

        $relationships = UserRelationship::where('user_id', $loggedInUserId)

            ->where('status', 'approved') // Filter by status

            ->with('relationship', 'relative.userInformation')

            ->get();





        // Get the logged-in user's information

        $user = Auth::user();

        $userInformation = $user->userInformation;

        $age = null;



        if ($userInformation && $userInformation->date_of_birth) {

            $age = Carbon::parse($userInformation->date_of_birth)->age;

        }



        $data = $this->get_data();



        // Pass the data to the view

        $relative = [

            'user' => $user,

            'age' => $age,

            'relationships' => $relationships,

        ];



        $title = "Home | Last Few Words";

        return view("home", compact("title", "data", "relative"));

    }



    public function familyTree()

    {
        $data = $this->get_data();
        $title = "Family Tree | Last Few Words";
        $user = User::query()->where('id', Auth::id())->first();
        $relationships = Relationship::query()->get();
         $family_users = Family::query()->where('user_id', Auth::user()->id)->with('relationships')->get();

        return view("family-tree", compact("title", 'data', 'user', 'relationships', 'family_users'));

    }

    public function getAllIds($nestedData, &$allIds = []) {
        foreach ($nestedData as $item) {
            if (is_object($item) && isset($item->id)) {
                // dd($item->getRelations());
                $relations = $item->getRelations();
                $userInformation = $item->getRelations('user_information');
                $deathInformation = $item->getRelations('deathConfirmation');
                $deathConfirmationCollection = $deathInformation['deathConfirmation'];
                $deathConfirmationModel = $deathConfirmationCollection->first();

                $tree = DB::table('user_tree')->where('user_id', $item->id)->first();

                $node = [
                    'id' => $item->id,
                    'name' => $item->first_name . ' ' . $item->last_name,
                    'date_of_birth' => $userInformation['user_information'] ? $userInformation['user_information']['date_of_birth'] : null,
                    'profile_picture' => $userInformation['user_information']? $userInformation['user_information'] ['profile_picture']:null,
                    'country' =>$userInformation['user_information']?$userInformation['user_information']['country']:null,
                    'is_alive' => $deathConfirmationModel? $deathConfirmationModel->is_alive : null,
                    'pids' => isset($tree->p_id) ? $tree->p_id : null,
                    'fid' => isset($tree->f_id) ?$tree->f_id : null,
                    'mid' => isset($tree->m_id) ? $tree->m_id : null,
                    // 'tree' => $tree, // Add the tree data to the node
                ];

                $allIds[] = $node;

            } elseif (is_array($item) || is_object($item)) {
                self::getAllIds($item, $allIds);
            }
        }
        return $allIds;
    }



    public static function getNestedData($userId, $depth = 0, $maxDepth = 5, &$processedUsers = [])
    {
        if (in_array($userId, $processedUsers)) {
            return [];
        }

        $processedUsers[] = $userId;

        $nestedData = [];
        $IdArray=[];

        $userData = User::with('user_information','deathConfirmation')->where('id', $userId)->first();
        $nestedUser = $userData;
        array_push($nestedData,$nestedUser);

        if ($depth < $maxDepth) {
            $treeData = DB::table('user_tree')->where('user_id', $userId)->first();

            if ($treeData) {
                if ($treeData->p_id) {
                    $pId = (int) preg_replace('/[^0-9]/', '', $treeData->p_id);

                    $nestedFetchData = self::getNestedData($pId, $depth + 1, $maxDepth, $processedUsers);
                    array_push($nestedData,$nestedFetchData);
                }

                if ($treeData->f_id) {
                    $nestedFetchData = self::getNestedData($treeData->f_id, $depth + 1, $maxDepth, $processedUsers);
                    array_push($nestedData,$nestedFetchData);
                }

                if ($treeData->m_id) {
                    $nestedFetchData = self::getNestedData($treeData->m_id, $depth + 1, $maxDepth, $processedUsers);
                    array_push($nestedData,$nestedFetchData);
                }


                $familyData = DB::table('user_tree')
                    ->where('f_id', $userId)
                    ->orWhere(function ($query) use ($treeData,$userId) {
                        $query->where('f_id', $treeData->f_id)
                            ->where('m_id', $treeData->m_id)
                            ->where('user_id', '!=', $userId);
                    })
                    ->get();

                $nestedData['children'] = [];
                $nestedData['siblings'] = [];

                foreach ($familyData as $familyMember) {
                    if ($familyMember->p_id == $userId) {
                        $nestedFetchData = self::getNestedData($familyMember->user_id, $depth + 1, $maxDepth, $processedUsers);
                        array_push($nestedData,$nestedFetchData);
                    } elseif ($familyMember->user_id != $userId) {

                        if (!isset($nestedData['siblings'][$familyMember->user_id])) {
                            $nestedFetchData  = self::getNestedData($familyMember->user_id, $depth + 1, $maxDepth, $processedUsers);
                            array_push($nestedData,$nestedFetchData);
                        }
                    }
                }
            }
        }

        return $nestedData;
    }



    public function familyNewTree()

    {
        $pid = [Auth::user()->id];
        $userPid = json_encode($pid);
        $nodes= $this->getNestedData(Auth::user()->id);
        $allIds = $this->getAllIds($nodes);

        $nodes = $allIds;

        $title = "Family Tree | Last Few Words";

        return view("tree", compact("title", 'nodes'));


    }



    /*    public function messages()

    {

        $title = "Messages | Last Few Words";

        $data = $this->get_data();



        return view("messages", compact("title", "data"));

        return view('Chatify::pages.app', compact('data', 'title', 'id', 'messengerColor', 'dark_mode'));



    } */

    public function messages($id = null)

    {

        $NavigationControllerInstance = new NavigationController();

        $data = $NavigationControllerInstance->get_data_internal_pages();

        $messenger_color = Auth::user()->messenger_color;

        $title = 'Messages';



        $id = $id ?? 0;

        $messengerColor = $messenger_color ? $messenger_color : ChatifyMessenger::getFallbackColor();

        $dark_mode = Auth::user()->dark_mode < 1 ? 'light' : 'dark';



        return view('Chatify::pages.app', compact('data', 'title', 'id', 'messengerColor', 'dark_mode'));

    }



    public  function checkNewMessages()

    {

        $userid  = \Illuminate\Support\Facades\Auth::id();

        $hasNewMessages = \App\Models\ChMessage::query()->where('to_id','=',$userid)->where('seen','=',0)

        ->exists();



        return response()->json(['hasNewMessages' => $hasNewMessages]);

    }

    public function requests()

    {

        $title = "Requests | Last Few Words";

        $data = $this->get_data();



        return view("requests", compact("title", "data"));

    }





    public function search(Request $request)
    {
        $query = $request->input('query');
        $loggedInUserId = Auth::id();

        // Find the extended relationships (friends of friends)
        $extendedRelationships = DB::table('user_relationships AS ur1')
            ->join('user_relationships AS ur2', 'ur1.relative_id', '=', 'ur2.user_id')
            ->where('ur1.user_id', $loggedInUserId)
            ->where('ur2.relative_id', '<>', $loggedInUserId)
            ->select('ur2.relative_id')
            ->distinct()
            ->pluck('relative_id');

        $exactEmailMatch = User::where('email', $query)->where('id', '<>', $loggedInUserId)->first();

        $users = User::where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('email', 'LIKE', "%{$query}%")->orWhere('first_name', 'LIKE', "%{$query}%")->orWhere('last_name', 'LIKE', "%{$query}%");
        })
            ->where('id', '<>', $loggedInUserId)
            ->whereIn('id', $extendedRelationships)
            ->when($exactEmailMatch, function ($queryBuilder, $exactEmailUser) {
                return $queryBuilder->orWhere('id', $exactEmailUser->id);
            })
            ->with('user_information') // Eager load user_information data
            ->get();

        $title = "Search Results | Last Few Words";
        $data = $this->get_data_internal_pages();

        $data['search_results'] = $users;

        // Check if no data is found and add an alert message
        if ($users->isEmpty()) {
            return view("search", compact("title", "data"))->with('alert', 'No results found.');
        }

        return view("search", compact("title", "data"))->with('success', 'Request sent successfully!');
    }




    public function privatePeopleSearch(Request $request)
    {
        $loggedInUserId = Auth::id();
        $query = $request->input('query');
        $users = User::query()->select('users.*')
            ->join('user_relationships', 'users.id', '=', 'user_relationships.relative_id')
            ->where('user_relationships.user_id', $loggedInUserId)
            ->where('user_relationships.status', 'approved')
            ->where(function ($queryBuilder) use ($query) {
                $queryBuilder
                    ->where('users.email', 'LIKE', "%{$query}%")
                    ->orWhere('users.first_name', 'LIKE', "%{$query}%")
                    ->orWhere('users.last_name', 'LIKE', "%{$query}%");
            })
            ->distinct()
            ->get();

        return response()->json($users);

    }




    public function searchFamily(Request $request)

    {

        $query = $request->input('query');

        $currentUser = auth()->user(); // get the currently authenticated user



        $users = User::where('first_name', 'LIKE', "%{$query}%")

            ->orWhere('last_name', 'LIKE', "%{$query}%")

            ->orWhere('email', 'LIKE', "%{$query}%")

            ->get()

            ->filter(function ($user) use ($currentUser) {

                // check if a relationship already exists between the current user and the user being searched

                return $currentUser->user_relationships()->where('relative_id', $user->id)->exists();

            });



        return response()->json($users); // return the users as JSON

    }



    public function profile()

    {

        $title = "Profile | Last Few Words";

        $data = $this->get_data();



        return view("profile", compact("title", "data"));

    }



    public function settings()

    {

        $title = "Settings | Last Few Words";

        $data = $this->get_data();

//        Get Current User

        $userid = Auth::user()->id;

        $totalTrustedContract = TrustedContact::query()->where('user_id', '=', $userid)->with('user')->take(5)->get();
        $totalTrustedToContract = TrustedContact::query()->where('trusted_contact_id', '=', $userid)->with('user')->take(5)->get();

        $totalDeathConfirmation = DeathConfirmation::query()->where('confirmations_from', '=', $userid)->with('user')->paginate(5);
        $deathConfirm = null;

        $privateTagViewPosts = PrivateTaggedPeople::query()->where('user_id', '=', Auth::id())->with(['post.user.userInformation', 'post.PostText', 'post.postImage','post.postVideo','post.postDocument'])->get();
         foreach ($privateTagViewPosts as $privateTagViewPost)
         {
             $deathUserId  = $privateTagViewPost->post->user_id;
             $deathConfirm  =  DeathConfirmation::query()->where('user_id','=',$deathUserId)->where('is_alive','=',0)->where('confirmation_status','=',1)->first();
         }

            return view("settings", compact("title", "data", 'totalDeathConfirmation', 'totalTrustedContract', 'totalTrustedToContract','privateTagViewPosts','deathConfirm'));

    }



    public function faq()

    {

        $title = "FAQ | Last Few Words";

        $data = $this->get_data();

        return view("faq", compact("title", "data"));

    }



    public function contact()

    {

        $title = "Contact | Last Few Words";

        $data = $this->get_data();

        return view("contact", compact("title", "data"));

    }



    public function editProfile()

    {

        $title = "Edit Profile | Last Few Words";

        $data = $this->get_data();



        return view("edit-profile", compact("title", "data"));

    }



    public function logout()

    {

        auth()->logout();

        return redirect()->route('login');

    }





    public function trustedContact(Request $request)

    {
        $storeContact = new TrustedContact();
        $storeContact->user_id = Auth::id();
        $trusted_contact_id = User::query()->where('email', $request->selected_user_email)->first();

        if ($trusted_contact_id) {
            // Check if the trusted contact already exists for the current user
            $existingContact = TrustedContact::query()->where('user_id', Auth::id())
                ->where('trusted_contact_id', $trusted_contact_id->id)
                ->first();
            if ($existingContact) {
           return redirect()->back()->with(['error' => 'This contact is already added.'], 400);

            }
      $numberOfContacts = TrustedContact::query()->where('user_id', Auth::id())->count();
        if ($numberOfContacts >= 5) {
             return redirect()->back()->with(['error' => 'You have reached the maximum limit of trusted contacts.'], 400);

            }
         $storeContact->trusted_contact_id = $trusted_contact_id->id;
            $storeContact->save();
               return redirect()->back()->with(['success' => 'Contact added successfully.'], 200);

        } else {

            // Trusted contact with the provided email does not exist

            return redirect()->back()->with(['error' => 'User with this email does not exist.'], 400);

        }



    }





    public function removeTrustedContact($id): RedirectResponse

    {

        try {

            $removeContact = TrustedContact::findOrFail($id);

            $removeContact->delete();



            return redirect()->back()->with(['success' => 'Contact Deleted successfully.'], 200);

        } catch (QueryException $e) {

            // Handle the exception (e.g., log the error or return an error message)

            return redirect()->back()->with(['error' => 'An error occurred while deleting the contact.'], 400);

        }

    }



    public function removeDeathConfirmation($id): RedirectResponse

    {

        try {

            $removeContact = DeathConfirmation::findOrFail($id);

            $removeContact->delete();



            return redirect()->back()->with(['success' => 'Contact Deleted successfully.'], 200);

        } catch (QueryException $e) {

            // Handle the exception (e.g., log the error or return an error message)

            return redirect()->back()->with(['error' => 'An error occurred while deleting the contact.'], 400);

        }

    }





    public function storeDeathConfirmation(Request $request): RedirectResponse
    {
        $request->validate([
            'certificate' => 'required'
        ]);

        $existingConfirmation = DeathConfirmation::where('user_id', $request->user_id)->first();

        Log::info("Storing death Confirmation for $request->user_id");

        if ($existingConfirmation) {
            $trustedUserCount = TrustedContact::where('user_id', $existingConfirmation->user_id)->count();

            if ($trustedUserCount === 1) {
                $existingConfirmation->user_id = $request->user_id;
                $existingConfirmation->confirmations_from = json_encode([Auth::id()]);
                $existingConfirmation->date_of_death = $request->date;
                $existingConfirmation->place_of_death = $request->place_of_death;
                $existingConfirmation->is_alive = 0;
                $existingConfirmation->confirmation_status = 1;

                $this->processDeathCertificate($existingConfirmation, $request);
                $existingConfirmation->save();
            } else {
                $existingConfirmation->user_id = $request->user_id;
                $existingConfirmation->confirmations_from = json_encode([Auth::id()]);
                $existingConfirmation->date_of_death = $request->date;
                $existingConfirmation->place_of_death = $request->place_of_death;
                $existingConfirmation->is_alive = 0;
                $existingConfirmation->confirmation_status = 0;

                $this->processDeathCertificate($existingConfirmation, $request);
                $existingConfirmation->save();
                $this->notifyTrustedContacts($request->user_id);

            }
        } else {
            $storeDeathConfirmation = new DeathConfirmation();

            $storeDeathConfirmation->user_id = $request->user_id;
            $storeDeathConfirmation->confirmations_from = json_encode([Auth::id()]);
            $storeDeathConfirmation->date_of_death = $request->date;
            $storeDeathConfirmation->place_of_death = $request->place_of_death;
            $storeDeathConfirmation->is_alive = 0;
            $storeDeathConfirmation->confirmation_status = 0;

            $this->processDeathCertificate($storeDeathConfirmation, $request);
            $storeDeathConfirmation->save();

            $this->notifyTrustedContacts($request->user_id);
        }

        return redirect()->route('settings')->with('success', 'We\'re sorry to hear about your loss, we\'ll let the trusted contact know about it for further confirmation.');
    }

    private function processDeathCertificate($confirmation, $request)
    {
        $file = $request->file('certificate');
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('death_certificate'), $filename);
        $confirmation->death_certificate = $filename;
    }

    private function notifyTrustedContacts($userId)
    {
        $notify = new DeathConfirmationController();
        $notify->notifyTrustedContacts($userId);
    }





    public function DeathConfirmationView($id)

    {

        $title = "All Notification Death";

        $data = $this->get_data();



        // Find the notification by ID

        $notification = \App\Models\Notification::find($id);



        if (!$notification) {

            abort(404);

        }



        $datas = json_decode($notification->data, true); // Decode the JSON string into an associative array

        $confirmationIds = $datas['confirmation_table_id'];



        $confirmation = DeathConfirmation::findOrFail($confirmationIds);



        $previousConfirmations = $confirmation->confirmations_from;



        if ($previousConfirmations === null) {

            $previousConfirmationsArray = [];

        } else {

            $previousConfirmationsArray = explode(',', $previousConfirmations);

        }



        $userId = auth()->id();



        try {

            if (!in_array($userId, $previousConfirmationsArray)) {

                // Add the user ID to the array if it doesn't already exist

                $previousConfirmationsArray[] = $userId;



                // Update the confirmation_from field

                $confirmation->update(['confirmations_from' => implode(',', $previousConfirmationsArray)]);

            }



            // Success message

            session()->flash('success', 'Confirmation successful.');

        } catch (\Exception $e) {

            // Error message

            session()->flash('error', 'An error occurred while confirming.');

        }



        return view('confirmation_view', compact('confirmation', 'title', 'data'));

    }



    public function markAsRead(Request $request): JsonResponse

    {

        $notificationId = $request->input('notification_id');

        $notification = Auth::user()->notifications()->find($notificationId);



        if ($notification) {

            $notification->markAsRead();

            return response()->json(['success' => true]);

        }



        return response()->json(['success' => false]);



    }



    public function rejectNotification(Request $request): RedirectResponse

    {

        // dd($request->all()); // Remove or comment out this line



        $notification = \App\Models\Notification::query()->where('id', '=', $request->notification_id)->first();

        $notificationReject = new NotificationStatus();

        $notificationReject->user_id = Auth::id();

        $notificationReject->notification_id = $notification->id;

        $notificationReject->status = 'rejected';

        $notificationReject->save();



        return redirect('/')->with('success', 'The Notification has been Rejected Successfully');

    }



    public function deceasedProfile($userId) {

        // Fetch the user based on the provided $userId

        $user = User::find($userId);

        if (!$user) {

            return redirect()->route('home');

        }else{

            // Check if the user has "death confirmation" status is_alive = 1

            $userNotAlive = DeathConfirmation::query()

                ->where('user_id', $userId)

                ->where('is_alive', 0)->where('confirmation_status','=',1)

                ->get();



            $userNotAlive = $userNotAlive->isNotEmpty();

            if ($userNotAlive) {

                // Check if the user is a relative of the logged-in user

                $isRelative = UserRelationship::query()

                    ->where('user_id', Auth::id())

                    ->where('relative_id', $userId)

                    ->where('status', 'approved')

                    ->exists();

                if($isRelative){

                    $title = "Deceased Profile | Last Few Words";

                    // Fetch the user's information

                    $userInformation = $user->userInformation;

                    $age = optional($userInformation)->date_of_birth ? Carbon::parse($userInformation->date_of_birth)->age : "";



                    // Fetch the user's posts

                    $posts = $user->posts()

                        ->with([

                            'postText',

                            'postImage',

                            'postAudio',

                            'postDocument',

                            'tags', // Loading directly without conditions

                            'tags.user' // Nested eager loading for the user relationship within tags

                        ])

                        ->where('post_scope', 'public')

                        ->orderByDesc('created_at')

                        ->get();



                    // Fetch all relatives for the user

                    $relationships = UserRelationship::where('user_id', $userId)

                        ->where('status', 'approved') // Filter by status

                        ->with('relationship', 'relative')

                        ->get();

                    // Prepare the data to be passed to the view

                    $data = [

                        'user' => $user,

                        'user_information' => $userInformation,

                        'age' => $age,

                        'posts' => $posts,

                        'tags' => Tag::where('user_id', $userId)->orWhereNull('user_id')->get(),

                        'lastTag' => Tag::where('user_id', $userId)->orWhereNull('user_id')->latest()->first(),

                    ];



                    // Pass the data to the view

                    $relative = [

                        'user' => $user,

                        'age' => $age,

                        'relationships' => $relationships

                    ];



                    return view("deceasedProfile", compact("title", "data", "relative"));

                }else{

                    $userInformation = $user->userInformation;

                    $age = optional($userInformation)->date_of_birth ? Carbon::parse($userInformation->date_of_birth)->age : "";



                    $data = [

                        'user' => $user,

                        'user_information' => $userInformation,

                        'tags' => Tag::where('user_id', $userId)->orWhereNull('user_id')->get(),

                        'lastTag' => Tag::where('user_id', $userId)->orWhereNull('user_id')->latest()->first(),

                    ];

                    // Pass the data to the view



                    $message = "The profile is only available to the user's relative.";

                    $heading =  "Page Unavailable!";

                    return view('error',compact('message','heading', 'data',));

                }

            } else {

                $userInformation = $user->userInformation;

                $age = optional($userInformation)->date_of_birth ? Carbon::parse($userInformation->date_of_birth)->age : "";



                $data = [

                    'user' => $user,

                    'user_information' => $userInformation,

                    'tags' => Tag::where('user_id', $userId)->orWhereNull('user_id')->get(),

                    'lastTag' => Tag::where('user_id', $userId)->orWhereNull('user_id')->latest()->first(),

                ];



                $message = "Profile is not available public since the person is alive.";

                $heading = "Page Unavailable!";

                return view('error',compact('message','heading','data'));

            }

        }

    }





    public function relativeProfileDetails($id)

    {

        $title = "Relative Profile Details";

        $data = $this->get_data();



        $relativeUsers = User::query()->where('id', $id)->with('userInformation')->first();

        return view('relative-profile-details', compact('title', 'relativeUsers', 'data'));

    }



    public function settingsUpdateEmail(Request $request)

    {

        try {

            $userid = Auth::id();

            $user = User::find($userid);

            $user->email = $request->email;

            $user->save();



            return redirect()->back()->with('success', 'Email Updated Successfully');

        } catch (QueryException $e) {

            // Handle database-related exceptions

            // You can log the exception for further investigation

            return redirect()->back()->with('error', 'An error occurred while updating the password: ' . $e->getMessage());

        } catch (\Exception $e) {

            // Handle other exceptions

            // You can log the exception for further investigation

            return redirect()->back()->with('error', 'An error occurred while updating the password: ' . $e->getMessage());

        }

    }



    public function settingsUpdatePassword(Request $request)

    {



        try {

            $user = Auth::user();



            // Validate the form inputs

            $request->validate([

                'old_password' => 'required',

                'new_password' => 'required|min:8|confirmed',

            ], [

                'new_password.confirmed' => 'The new password and confirmation do not match.',

            ]);



            // Check if the old password matches the user's current password

            if (!Hash::check($request->old_password, $user->password)) {

                return redirect()->back()->with('error', 'The old password is incorrect.');

            }
            // Update the password

            $user->password = Hash::make($request->new_password);

            $user->save();



            return redirect()->back()->with('success', 'Password updated successfully.');

        } catch (QueryException $e) {

            // Handle database-related exceptions

            // You can log the exception for further investigation

            return redirect()->back()->with('error', 'An error occurred while updating the password: ' . $e->getMessage());

        } catch (\Exception $e) {

            // Handle other exceptions

            // You can log the exception for further investigation

            return redirect()->back()->with('error', 'An error occurred while updating the password: ' . $e->getMessage());

        }

    }





    public function fetchData()

    {

        $userid = auth()->user()->id;

        $deathNotifications = \App\Models\DeathConfirmationNotification::query()->where('user_id','=',$userid)->where('notification_status','=','pending')->with('users')->get();

        foreach ($deathNotifications as $dNotification)

        $deathUsers = \App\Models\User::query()->where('id', $dNotification->deceased_id)->first();

        $deathConfirm = \App\Models\DeathConfirmation::query()->where('user_id', $dNotification->deceased_id)->first();

        $confirmationJson = "[]"; // Default value if no confirmation is found



        if ($deathConfirm) {

            $confirmationJson = $deathConfirm->confirmations_from;

        }



// Decode the JSON string into an array

        $confirmations = json_decode($confirmationJson);



// Access the first element of the array

        $firstConfirmation = isset($confirmations[0]) ? $confirmations[0] : null;



        if ($firstConfirmation !== null) {

            // $firstConfirmation now contains the value "52"



        } else {

            // Handle the case where there are no confirmations or the array is empty

        }

      return  $informUser = \App\Models\User::query()->where('id', '=', $firstConfirmation)->first();

    }


    public  function fetchChatRecords(): JsonResponse
    {
        $chatRecords = ChMessage::all();
        return response()->json($chatRecords);
    }




}

