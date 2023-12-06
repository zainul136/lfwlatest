<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostAudio;
use App\Models\PostDocument;
use App\Models\PostImage;
use App\Models\PostText;
use App\Models\PostVideo;
use App\Models\Tag;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;

class PostsController extends Controller
{
   
    public function publicPosts()
    {
         
        $posts = Post::query()
            ->where('post_scope','=','public')
            ->with(['user.userInformation','PostText'])
            ->get();
     
        return view('admin.zenix.usermodule.publicPosts', compact('posts'));
    }
    
 public function privatePosts()
    {
        $posts = Post::query()->where('post_scope','=','private')->with(['user.userInformation','PostText'])->get();
        return view('admin.zenix.usermodule.privatePosts', compact('posts'));

    }

    public function deletePosts(Post $post){


        $post = Post::with(['postAudio', 'postImage', 'postVideo', 'postDocument'])->findOrFail($post->id);
        $userId = $post->user_id;

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
        return redirect()->back()->with('success', 'Post deleted successfully.');

    }

    public function editPublicPost($id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $post = Post::query()->where('id','=',$id)->where('post_scope','=','public')
            ->with(['user.userInformation','PostText','postImage','postVideo','postDocument','tags','postAudio'])
            ->first();
        return view('admin.zenix.usermodule.editPublicPost',compact('post'));

    }

    public function publicPostUpdate($id, Request $request){
        try {

            $validatedData = $request->validate([
                'post_content' => 'required|string',
            ]);
            $postText = PostText::query()->where('post_id', $id)->first();

            if ($postText) {
                $postText->post_content = $validatedData['post_content'];
                $postText->save();

                return redirect()->back()->with('success', 'Post Content Has Been Updated');
            } else {
                return redirect()->back()->with('error', 'Post Text Not Found');
            }
        } catch (ValidationException $e) {

            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'An error occurred while updating the post content');
        }
    }

    public function publicPostDelete($id, $user_id)
    {
        try {
            $publicPostDelete = PostVideo::where('post_id', $id)->first();

            if ($publicPostDelete) {
                $videoPath = public_path($publicPostDelete->video_path);

                if (File::exists($videoPath)) {
                    File::delete($videoPath);
                }

                $publicPostDelete->delete();
                return redirect()->back()->with('success', 'Post Video Deleted');
            } else {
                return redirect()->back()->with('error', 'Post Video Not Found');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the post video');
        }
    }

    public function publicPostImageDelete($id, Request $request)
    {
        try {

            $publicPostDelete = PostImage::where('post_id', $id)->first();
            $imagesArray = explode(',', $publicPostDelete->image_path);
            $selectedImages = $request->input('selectedImages', []);

            if ($publicPostDelete) {
                foreach ($selectedImages as $selectedImage) {
                    $imagePath = public_path('user_media/' . $request->user_id . '/images/' . $selectedImage);
                    if (File::exists($imagePath)) {
                        File::delete($imagePath);
                    }

                    $imagesArray = array_diff($imagesArray, [$selectedImage]);
                }
                $publicPostDelete->image_path = implode(',', $imagesArray);
                $publicPostDelete->save();

                return redirect()->back()->with('success', 'Selected images have been deleted.');
            } else {
                return redirect()->back()->with('error', 'Post Image Not Found');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the images.');
        }
    }

    public function publicPostDocumentsDelete($id, Request $request)
    {
        try {
            $publicPostDelete = PostDocument::where('post_id', $id)->first();
            $documentsArray = explode(',', $publicPostDelete->document_path);
            $selectedDocuments = $request->input('selectedDocuments', []);
            if ($publicPostDelete) {
                foreach ($selectedDocuments as $selectedDocument) {
                    $imagePath = public_path('user_media/' . $request->user_id . '/documents/' . $selectedDocument);

                    if (File::exists($imagePath)) {
                        File::delete($imagePath);
                    }
                    $documentsArray = array_diff($documentsArray, [$selectedDocument]);
                }

                // Update the image_path in the database with the remaining images
                $publicPostDelete->document_path = implode(',', $documentsArray);
                $publicPostDelete->delete();

                return redirect()->back()->with('success', 'Selected images have been deleted.');
            } else {
                return redirect()->back()->with('error', 'Post Image Not Found');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the images.');
        }
    }
    public function publicAudioDelete($id, Request $request)
    {
        try {
            $publicPostDelete = PostAudio::where('post_id', $id)->first();
            $audioArray = explode(',', $publicPostDelete->audio_path);

            $selectedAudios = $request->input('selectedAudio', []);

            if ($publicPostDelete) {
                foreach ($selectedAudios as $selectedAudio) {
                    $audioPath = public_path('user_media/' . $request->user_id . '/audio/' . $selectedAudio);

                    if (File::exists($audioPath)) {
                        File::delete($audioPath);
                    }

                    $audioArray = array_diff($audioArray, [$selectedAudio]);
                }

                // Update the image_path in the database with the remaining images
                $publicPostDelete->audio_path = implode(',', $audioArray);
                $publicPostDelete->delete();

                return redirect()->back()->with('success', 'Selected images have been deleted.');
            } else {
                return redirect()->back()->with('error', 'Post Image Not Found');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the images.');
        }
    }
  public function publicPostTagDelete($id, Request $request)
  {
      try {
          $selectedTagIds = $request->input('tag_id', []);

          if (!empty($selectedTagIds)) {
              $post = Post::find($id);

              if (!$post) {
                  return redirect()->back()->with('error', 'Post not found.');
              }

              $post->tags()->detach($selectedTagIds);

              return redirect()->back()->with('success', 'Selected tags have been deleted.');
          } else {
              return redirect()->back()->with('error', 'No tags were selected for deletion.');
          }
      } catch (\Exception $e) {
          return redirect()->back()->with('error', 'An error occurred while deleting tags.');
      }

  }

}
