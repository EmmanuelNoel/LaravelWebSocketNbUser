<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //

    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function like(Request $request, Post $post)
    {
        $post->likes++;
        $post->save();

        event(new \App\Events\PostLiked($post));

        return redirect()->route('post.index');
    }
}
