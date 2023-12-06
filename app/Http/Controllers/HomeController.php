<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use App\Models\User;
use App\Models\UserInformation;
use App\Models\UserRelationship;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    
     public function index()
    {
        $user = Auth::user();
        $user = User::query()->where('id', $user->id)->first();
        $user_information = UserInformation::where('user_id', $user->id)->first();
        $user = Auth::user();
        $posts = $user->posts()->with(['postText', 'postImage'])->orderByDesc('created_at')->get();

        $age = "";
        if(isset($user_information)){
            $dateOfBirth = $user_information->date_of_birth;
            $age = Carbon::parse($dateOfBirth)->age;
        }

        return view('home', [
            'user' => $user,
            'user_information' => $user_information,
            'age' => $age,
            'posts' => $posts
        ]);
    }

    public function privateHome(){
        $user = Auth::user();

        $loggedInUserId = Auth::id();

        // Fetch the logged-in user's relationships with others and their relationship types
        $relationships = UserRelationship::where('user_id', $loggedInUserId)
            ->where('status','=','approved')
            ->with('relationship', 'relative')->get();

        // Get the logged-in user's information
        $user = Auth::user();
        $userInformation = $user->userInformation;
        $age = null;

        if ($userInformation && $userInformation->date_of_birth) {
            $age = Carbon::parse($userInformation->date_of_birth)->age;
        }
        $data = $this->getPrivatePosts();
        // Pass the data to the view
        $relative = [
            'user' => $user,
            'age' => $age,
            'relationships' => $relationships,
        ];

        $title = "Home | Last Few Words";
        return view("home", compact("title", "data", "relative"));

    }

    public function getPrivatePosts(){
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
            ->where('post_scope', 'private')
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
}
