<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PrivatePostController extends Controller
{
    public function editPrivatePost($id)
    {
        $post = Post::query()->findOrFail($id);
        return view('admin.zenix.usermodule.editPrivatePost',compact('post'));

    }
}
