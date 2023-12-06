<?php

namespace App\Http\Controllers;

use App\Models\PostDocument;
use App\Models\PostImage;
use App\Models\PostVideo;
use App\Models\PostAudio;
use App\Models\PrivatePostView;
use App\Models\PrivateTaggedPeople;
use App\Models\Tag;
use App\Models\User;
use App\Models\UserInformation;
use App\Models\UserRelationship;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostText;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function store(Request $request)
    {
        // Create a new post
        $post = new Post();
        $post->post_type = "text";
        $post->user_id = auth()->user()->id;
        $post->save();

        // Check if the post type is 'text'
        if ($post->post_type == 'text') {
            // Create a new TextPost
            $this->storeTextPost($request->content, $post->id);
        }

        // Optionally, you can redirect the user or return a response
        return redirect()->back()->with('success', 'Post created successfully.');
    }

    // TEXT POSTS
    public function storeTextPost($post_content, $postId)
    {

        // Create a new TextPost
        $textPost = new PostText([
            'post_id' => $postId,
            'post_content' => $post_content,
            'posted_at' => now(),
        ]);

        $textPost->save();
        $navigationController = new NavigationController();
        $data = $navigationController->get_data();
        $title = "Last Few Words | Home";
        return view("home", compact("title", "data"));
    }

    public function updateTextPost(Request $request, $postId)
    {
        // Validate the request data
        $request->validate([
            'post_content' => 'required',
        ]);

        // Find the parent post
        $post = Post::findOrFail($postId);

        // Find the associated TextPost
        $textPost = $post->textPost;

        // Update the TextPost
        $textPost->update([
            'post_content' => $request->post_content,
            'posted_at' => now(),
        ]);

        // Optionally, you can redirect or return a response
        return redirect()->back()->with('success', 'Text post updated successfully.');
    }

    public function deleteTextPost($postId)
    {
        // Find the parent post
        $post = Post::findOrFail($postId);

        // Find the associated TextPost
        $textPost = $post->textPost;

        // Delete the TextPost
        $textPost->delete();

        // Optionally, you can redirect or return a response
        return redirect()->back()->with('success', 'Text post deleted successfully.');
    }

    //END TEXT POSTS
    public function post(Request $request)
    {


        $post = new Post;
        if ($request->has('privatePeopleSearch') && $request->filled('privatePeopleSearch')) {
            $post->post_scope = "private";
        } else {
            $post->post_scope = "public";
        }
        if ($request->hasFile('images') && $request->file('images')[0]->isValid()) {
            $post->user_id = $request->user()->id;
            if ($request->has('content') && $request->filled('content')) {
                $post->post_type = "text/images";
                $post->save();
                $postText = new PostText;
                $postText->post_id = $post->id;
                $postText->post_content = $request->input('content');
                $postText->save();
            } else {
                $post->post_type = "images";
                $post->save();
            }

            if ($post->post_scope == "private") {
                $tagged_user = explode(',', $request->input('privatePeopleSearch'));
                $post->viewers()->attach($tagged_user);
            }

            foreach ($request->file('images') as $image) {
                $name = time() . '_' . $image->getClientOriginalName();
                $storageDirectory = public_path('user_media/' . $request->user()->id . '/images/');
                if (!File::isDirectory($storageDirectory)) {
                    File::makeDirectory($storageDirectory, 0777, true, true);
                }
                $image->move($storageDirectory, $name);
                $data[] = $name;
            }
            if (isset($data)) {
                $postImage = new PostImage;
                $postImage->post_id = $post->id;
                $postImage->image_path = implode(',', $data);
                $postImage->save();
            }
        } else if ($request->has('video') && $request->filled('video')) {
            $post->user_id = $request->user()->id;

            if ($request->has('content') && $request->filled('content')) {
                $post->post_type = "text/video";

                $post->save();

                $postText = new PostText;
                $postText->post_id = $post->id;
                $postText->post_content = $request->input('content');
                $postText->save();
            } else {
                $post->post_type = "video";

                $post->save();
            }

            if ($post->post_scope == "private") {
                $tagged_user = explode(',', $request->input('privatePeopleSearch'));
                $post->viewers()->attach($tagged_user);
            }

            $base64_str = substr($request->video, strpos($request->video, ",") + 1);
            $decoded = base64_decode($base64_str);

            if ($request->has('video_filename') && $request->filled('video_filename')) {
                $filename = $request->input('video_filename');
            } else {
                $filename = 'video_' . time() . '.webm';
            }
            $storageDirectory = public_path('user_media/' . $request->user()->id . '/videos/');
            if (!File::isDirectory($storageDirectory)) {
                File::makeDirectory($storageDirectory, 0777, true, true);
            }
            file_put_contents($storageDirectory . $filename, $decoded);
            $postVideo = new PostVideo;
            $postVideo->post_id = $post->id;
            $postVideo->video_path = 'user_media/' . $request->user()->id . '/videos/' . $filename;
            $postVideo->save();
        } else if ($request->has('audio') && $request->filled('audio')) {

            $post->user_id = $request->user()->id;

            if ($request->has('content') && $request->filled('content')) {
                $post->post_type = "text/audio";

                $post->save();

                $postText = new PostText;
                $postText->post_id = $post->id;
                $postText->post_content = $request->input('content');
                $postText->save();
            } else {
                $post->post_type = "audio";

                $post->save();
            }

            if ($post->post_scope == "private") {
                $tagged_user = explode(',', $request->input('privatePeopleSearch'));
                $post->viewers()->attach($tagged_user);
            }

            $filename = $request->input('audio_filename');

            // Save the audio data
            $base64_str = $request->input('audio');
            $decoded = base64_decode($base64_str);

            $storageDirectory = public_path('user_media/' . $request->user()->id . '/audio/');

            if (!File::isDirectory($storageDirectory)) {
                File::makeDirectory($storageDirectory, 0777, true, true);
            }

            $filePath = $storageDirectory . $filename;
            file_put_contents($filePath, $decoded);

            $postAudio = new PostAudio;
            $postAudio->post_id = $post->id;
            $postAudio->audio_path = $filename;
            $postAudio->save();
        } else if ($request->hasFile('documents') && $request->file('documents')[0]->isValid()) {
            $post->user_id = $request->user()->id;
            if ($request->has('content') && $request->filled('content')) {
                $post->post_type = "text/documents";

                $post->save();

                $postText = new PostText;
                $postText->post_id = $post->id;
                $postText->post_content = $request->input('content');
                $postText->save();
            } else {
                $post->post_type = "documents";

                $post->save();
            }
            if ($post->post_scope == "private") {
                $tagged_user = explode(',', $request->input('privatePeopleSearch'));
                $post->viewers()->attach($tagged_user);
            }

            foreach ($request->file('documents') as $doc) {
                $name = time() . '_' . $doc->getClientOriginalName();
                $storageDirectory = public_path('user_media/' . $request->user()->id . '/documents/');
                if (!File::isDirectory($storageDirectory)) {
                    File::makeDirectory($storageDirectory, 0777, true, true);
                }
                $doc->move($storageDirectory, $name);
                $data[] = $name;
            }
            if (isset($data)) {
                $postDoc = new PostDocument;
                $postDoc->post_id = $post->id;
                $postDoc->document_path = implode(',', $data);
                $postDoc->save();
            }
        } else if ($request->has('content') && $request->filled('content') && !(
            ($request->has('video') && $request->filled('video'))
            && ($request->has('image') && $request->filled('image'))
            && ($request->has('document') && $request->filled('document'))
        )) {
            $post->post_type = "text";
            $post->user_id = $request->user()->id;
            $post->save();

            if ($post->post_scope == "private") {
                $tagged_user = explode(',', $request->input('privatePeopleSearch'));
                $post->viewers()->attach($tagged_user);
            }

            $postText = new PostText;
            $postText->post_id = $post->id;
            $postText->post_content = $request->input('content');
            $postText->save();
        } else {
            return redirect()->back()->with('error', 'Invalid post');
        }

        if ($request->input('tags')) {
            $tags = explode(',', $request->input('tags'));
            $post->tags()->sync($tags);
        }
        // Get the currently logged-in user
        $user = Auth::user();

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
        $data = [
            'user' => $user,
            'age' => $age,
            'relationships' => $relationships,
        ];
        $navigationController = new NavigationController();
        $data = $navigationController->get_data();
        $title = "Last Few Words | Home";

        return redirect('home')->with(compact('title', 'data'));
    }

    public function addTag(Request $request)
    {
        $tagName = $request->input('tagName');
        $tag = new Tag();
        $tag->name = $tagName;
        $tag->description = " ";
        $tag->user_id = Auth::user()->id;
        $tag->slug = Str::slug($tagName);
        $tag->save();

        return response()->json(['id' => $tag->id, 'message' => 'Tag added successfully'], Response::HTTP_OK);
    }

    public function fetchTagId($slug)
    {
        $slug = urldecode($slug);
        $tag = Tag::where('slug', $slug)->first();

        if ($tag) {
            return $tag->id;
        }
        return response()->json(['error' => "$slug not found"]);
    }

    public function destroy($id)
    {

        $post = Post::with(['postAudio', 'postImage', 'postVideo', 'postDocument'])->findOrFail($id);
        $userId = Auth::id();

        $mediaPath = public_path("user_media/{$userId}/");

        if ($post->postAudio) {
            $mediaPath .= 'audio/';
            $file = $post->postAudio;
        } elseif ($post->postDocument) {
            $mediaPath .= 'documents/';
            $file = $post->postDocument;
        } elseif ($post->postImage) {
            $mediaPath .= 'images/';
            $file = $post->postImage;

        } elseif ($post->postVideo) {
            $mediaPath .= 'videos/';
            $file = $post->postVideo;
        }

        if (isset($file)) {

            File::delete("{$mediaPath}{$file->audio_path}");
            File::delete("{$mediaPath}{$file->document_path}");

            $images  = $file->image_path;
            $imageArray = explode(',', $images);
            foreach ($imageArray as $image) {
              File::delete("{$mediaPath}{$image}");
          }

          $videoPath = $file->video_path;
            $videoFilename = basename($videoPath); // Extract the filename
            File::delete("{$mediaPath}{$videoFilename}");
        }
        $post->delete();

        return response()->json(['message' => 'Post and associated media deleted']);
    }

    public function showPostsByTag($slug)
    {
        $tag = Tag::where('slug', $slug)->first();

        if (!$tag) {
            abort(404);
        }

        // Get the currently logged-in user
        $user = Auth::user();

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
        $data = [
            'user' => $user,
            'age' => $age,
            'relationships' => $relationships,
        ];
        // Fetch tags that belong to the logged-in user and have the specified tag
        $loggedInUserId = $user->id;
        $posts = Post::whereHas('tags', function ($query) use ($loggedInUserId, $tag) {
            $query->where('tags.id', $tag->id)->where('user_id', $loggedInUserId);
        })
        ->with(['postText', 'postImage', 'postAudio', 'postDocument', 'tags'])
        ->orderByDesc('created_at')
        ->get();

        $relative = [
            'user' => $user,
            'age' => $age,
            'relationships' => $relationships,
        ];
        $navigation = new NavigationController(); // Replace with the appropriate navigation controller or logic
        $data = $navigation->get_data();
        $data['tag'] = $tag;
        $data['posts'] = $posts;
        $title = "$tag->name | Last Few Words";
        return view("home", compact("title", "data", "relative"));
    }

    public function getPostsByDate(Request $request)
    {
        // Retrieve the currently logged-in user
        $user = Auth::user();
        $loggedInUserId = Auth::id();
        $user_information = UserInformation::where('user_id', $user->id)->first();

        // Fetch the logged-in user's relationships with others and their relationship types
        $relationships = UserRelationship::where('user_id', $loggedInUserId)
        ->with('relationship', 'relative')
        ->get();

        // Get the logged-in user's information
        $userInformation = $user->userInformation;
        $age = null;

        if ($userInformation && $userInformation->date_of_birth) {
            $age = Carbon::parse($userInformation->date_of_birth)->age;
        }

        // Get the selected time range from the form submission
        $timeRange = $request->input('time_range');

        // Start with fetching all posts for the user
        $posts = $user->posts()
        ->with(['postText', 'postImage', 'postAudio', 'postDocument', 'tags' => function ($query) use ($loggedInUserId) {
            $query->where('user_id', $loggedInUserId);
        }])
        ->orderByDesc('created_at');

        // Apply filters based on the selected time range or custom date range
        if ($timeRange === 'last7days') {
            $startDate = Carbon::now()->subDays(7);
            $posts->where('created_at', '>=', $startDate);
        } elseif ($timeRange === 'last30days') {
            $startDate = Carbon::now()->subDays(30);
            $posts->where('created_at', '>=', $startDate);
        } elseif ($timeRange === 'last3months') {
            $startDate = Carbon::now()->subMonths(3);
            $posts->where('created_at', '>=', $startDate);
        } elseif ($timeRange === 'last12months') {
            $startDate = Carbon::now()->subMonths(12);
            $posts->where('created_at', '>=', $startDate);
        } elseif ($timeRange === 'custom') {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            if ($startDate && $endDate) {
                // Convert the date strings to Carbon objects using the correct format
                try {
                    $startDate = Carbon::createFromFormat('Y-m-d H:i:s', $startDate . ' 00:00:00');
                    $endDate = Carbon::createFromFormat('Y-m-d H:i:s', $endDate . ' 23:59:59');
                } catch (\Exception $e) {
                    // Handle parsing error if needed
                    // For debugging, you can use the following to see the error message
                    // dd($e->getMessage());
                }
                $posts->whereBetween('created_at', [$startDate, $endDate]);
            }
        }

        // Fetch the posts
        $filteredPosts = $posts->get();

        $tags = Tag::where('user_id', $loggedInUserId)->orWhereNull('user_id')->get();
        $lastTag = $tags->last();

        // Prepare the $data array with the same information as before, but with filtered posts
        $data['user'] = $user;
        $data['user_information'] = $user_information;
        $data['age'] = $age;
        $data['posts'] = $filteredPosts;
        $data['tags'] = $tags;
        $data['lastTag'] = $lastTag;

        // Pass the data to the view
        $relative = [
            'user' => $user,
            'age' => $age,
            'relationships' => $relationships,
        ];

        $title = "Home | Last Few Words";
        return view("home", compact("title", "data", "relative"));
    }

    public function deceasedProfileGetPostsByDate(Request $request, $id)
    {

        // Retrieve the currently logged-in user
        $user = User::query()->where('id', $id)->first();
        $loggedInUserId = $id;

        $user_information = UserInformation::query()->where('user_id', $user->id)->first();
        // Fetch the logged-in user's relationships with others and their relationship types
        $relationships = UserRelationship::where('user_id', $loggedInUserId)
        ->with('relationship', 'relative')
        ->get();

        // Get the logged-in user's information
        $userInformation = $user->userInformation;

        $age = null;

        if ($userInformation && $userInformation->date_of_birth) {
            $age = Carbon::parse($userInformation->date_of_birth)->age;
        }

        // Get the selected time range from the form submission
        $timeRange = $request->input('time_range');

        // Start with fetching all posts for the user
        $posts = $user->posts()
        ->with(['postText', 'postImage', 'postAudio', 'postDocument', 'tags' => function ($query) use ($loggedInUserId) {
            $query->where('user_id', $loggedInUserId);
        }])
        ->where('post_scope', 'public')
        ->orderByDesc('created_at');

        // Apply filters based on the selected time range or custom date range
        if ($timeRange === 'last7days') {
            $startDate = Carbon::now()->subDays(7);
            $posts->where('created_at', '>=', $startDate);
        } elseif ($timeRange === 'last30days') {
            $startDate = Carbon::now()->subDays(30);
            $posts->where('created_at', '>=', $startDate);
        } elseif ($timeRange === 'last3months') {
            $startDate = Carbon::now()->subMonths(3);
            $posts->where('created_at', '>=', $startDate);
        } elseif ($timeRange === 'last12months') {
            $startDate = Carbon::now()->subMonths(12);
            $posts->where('created_at', '>=', $startDate);
        } elseif ($timeRange === 'custom') {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            if ($startDate && $endDate) {
                // Convert the date strings to Carbon objects using the correct format
                try {
                    $startDate = Carbon::createFromFormat('Y-m-d H:i:s', $startDate . ' 00:00:00');
                    $endDate = Carbon::createFromFormat('Y-m-d H:i:s', $endDate . ' 23:59:59');
                } catch (\Exception $e) {
                    // Handle parsing error if needed
                    // For debugging, you can use the following to see the error message
                    // dd($e->getMessage());
                }
                $posts->whereBetween('created_at', [$startDate, $endDate]);
            }
        }

        // Fetch the posts
        $filteredPosts = $posts->get();

        $tags = Tag::where('user_id', $loggedInUserId)->orWhereNull('user_id')->get();
        $lastTag = $tags->last();
        // Prepare the $data array with the same information as before, but with filtered posts
        $data['user'] = $user;
        $data['user_information'] = $user_information;
        $data['age'] = $age;
        $data['posts'] = $filteredPosts;
        $data['tags'] = $tags;
        $data['lastTag'] = $lastTag;


        // Pass the data to the view
        $relative = [
            'user' => $user,
            'age' => $age,
            'relationships' => $relationships,
        ];

        $title = "Home | Last Few Words";
        return view("deceasedProfileGetPosts", compact("title", "data", "relative"));
    }


    public function viewRelativePost(Request $request, $id, $post_id)
    {

        // Retrieve the currently logged-in user
        $user = User::query()->where('id', $id)->first();
        $loggedInUserId = $id;

        $user_information = UserInformation::query()->where('user_id', $user->id)->first();
        // Fetch the logged-in user's relationships with others and their relationship types
        $relationships = UserRelationship::where('user_id', $loggedInUserId)
        ->with('relationship', 'relative')
        ->get();

        // Get the logged-in user's information
        $userInformation = $user->userInformation;

        $age = null;

        if ($userInformation && $userInformation->date_of_birth) {
            $age = Carbon::parse($userInformation->date_of_birth)->age;
        }

        // Get the selected time range from the form submission
        $timeRange = $request->input('time_range');

        // Start with fetching all posts for the user
        $post = Post::query()->where('id','=',$post_id)
        ->with(['postText', 'postImage', 'postAudio', 'postDocument', 'tags'])
        ->orderByDesc('created_at')->first();

        // TM Custom
        if($post->post_scope == 'private'){

            if(!$post->hasSubscription()){
                $message = 'This post is Locked!! in order to view this post, you need to pay for this by clicking on the Unlock button.';
                $heading =  "Permission Denied!";
                $url = route('subscribe.post', $post->id);
                $button_text = "Unlock Post";
                $deseaseUser = User::query()->where('id',$post->user_id)->with('userInformation')->first();

                return view('error',compact('message','heading', 'url', 'button_text','deseaseUser'));
            }
        }

        // Apply filters based on the selected time range or custom date range
        if ($timeRange === 'last7days') {
            $startDate = Carbon::now()->subDays(7);
            $post->where('created_at', '>=', $startDate);
        } elseif ($timeRange === 'last30days') {
            $startDate = Carbon::now()->subDays(30);
            $post->where('created_at', '>=', $startDate);
        } elseif ($timeRange === 'last3months') {
            $startDate = Carbon::now()->subMonths(3);
            $post->where('created_at', '>=', $startDate);
        } elseif ($timeRange === 'last12months') {
            $startDate = Carbon::now()->subMonths(12);
            $post->where('created_at', '>=', $startDate);
        } elseif ($timeRange === 'custom') {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            if ($startDate && $endDate) {
                // Convert the date strings to Carbon objects using the correct format
                try {
                    $startDate = Carbon::createFromFormat('Y-m-d H:i:s', $startDate . ' 00:00:00');
                    $endDate = Carbon::createFromFormat('Y-m-d H:i:s', $endDate . ' 23:59:59');
                } catch (\Exception $e) {
                    // Handle parsing error if needed
                    // For debugging, you can use the following to see the error message
                    // dd($e->getMessage());
                }
                $post->whereBetween('created_at', [$startDate, $endDate]);
            }
        }

        // Fetch the posts
        $filteredPosts = $post->get();


        $tags = Tag::where('user_id', $loggedInUserId)->orWhereNull('user_id')->get();
        $lastTag = $tags->last();
        // Prepare the $data array with the same information as before, but with filtered posts
        $data['user'] = $user;
        $data['user_information'] = $user_information;
        $data['age'] = $age;
        $data['posts'] = $post;
        $data['tags'] = $tags;
        $data['lastTag'] = $lastTag;


        // Pass the data to the view
        $relative = [
            'user' => $user,
            'age' => $age,
            'relationships' => $relationships,
        ];

        $title = "Home | Last Few Words";

        $private_tagged_people = PrivateTaggedPeople::query()->where('post_id','=', $post_id)->where('user_id','=',Auth::id())->first();
        $private_tagged_people->view_post = "1";
        $private_tagged_people->save();
        $private_tagged_people_view = new PrivatePostView();
        $private_tagged_people_view->private_tagged_people_id  = $private_tagged_people->id;
        $private_tagged_people_view->save();

        return view("RelativePostsFile", compact('post',"title", "data", "relative"));
    }

    public function deceasedProfileGetTag($id, $slug)
    {

        $tag = Tag::query()->where('slug', $slug)->first();

        if (!$tag) {
            abort(404);
        }


        $loggedInUserId = $id;

        // Fetch the logged-in user's relationships with others and their relationship types
        $relationships = UserRelationship::where('user_id', $loggedInUserId)
        ->with('relationship', 'relative')
        ->get();

        // Get the logged-in user's information
        $user = User::query()->findOrFail($id);


        $userInformation = $user->userInformation;

        $age = null;

        if ($userInformation && $userInformation->date_of_birth) {
            $age = Carbon::parse($userInformation->date_of_birth)->age;
        }

        // Fetch tags that belong to the logged-in user and have the specified tag
        $loggedInUserId = $user->id;

        $posts = Post::whereHas('tags', function ($query) use ($loggedInUserId, $tag) {
            $query->where('tags.id', $tag->id)->where('user_id', $loggedInUserId);
        })
        ->with(['postText', 'postImage', 'postAudio', 'postDocument', 'tags'])
        ->orderByDesc('created_at')
        ->where('post_scope', 'public')
        ->get();

        $relative = [
            'user' => $user,
            'age' => $age,
            'relationships' => $relationships,
        ];

        $navigation = new NavigationController(); // Replace with the appropriate navigation controller or logic
        $data = $navigation->get_data();
        $data['tag'] = $tag;
        $data['user'] = $user;
        $data['user_information'] = $userInformation;

        $data['posts'] = $posts;
        $title = "$tag->name | Last Few Words";
        return view("deceasedProfileGetTag", compact("title", "data", "relative"));
    }


}
