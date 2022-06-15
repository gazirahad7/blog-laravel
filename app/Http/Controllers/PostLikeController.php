<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    // middleware for like
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Post $post, Request $request)
    {
        //
       // dd('store');
      //  dd($request);
     // dd($post->isLikedByUser($request->user()));
        //$post = Post::findOrFail($postId);
        if($post->isLikedByUser($request->user())) {
            return back()->with('message','You already liked this post');
        }
        $post->likes()->create([
            'user_id' => auth()->id(),
        ]);
        return back();
    }

    public function destroy(Post $post, Request $request)
    {
        //dd('destroy');
        //dd($request);
        //$post = Post::findOrFail($postId);
        $post->likes()->where('user_id', auth()->id())->delete();
        return back()->with('message', 'Post disliked successfully');
    }
 

}