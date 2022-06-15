<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class PostController extends Controller
{
    //
    public function index()
    {
    $posts = Post::latest()->filter(request(['category', 'search']))->simplePaginate(4);

    $categories = Category::latest()->get();

        return view('posts.index', compact('posts', 'categories'));
    }

   

    public function show(Post $post)
    {
        return view('posts.single-post', compact('post'));
    }
    

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    
    }
// store post
    public function store(Request $request)
    {
        //dd($request->all());

       $formFields = $request->validate([
            'title' => 'required|min:4',
            'category' => 'required',
            'details' => 'required|min:10',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->hasFile('image')){
         
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $formFields['user_id'] = auth()->user()->id;
       Post::create($formFields);
    
        return redirect('/')->with('message', 'Post created successfully');
    }

    // show edit form
    public function edit(Post $post)
    {
        //dd($post->title);
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    // update post
    public function update(Request $request, Post $post)
    {
        //dd($request->all());

        // Make sure logged in user is the owner of the post
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/')->with('message', 'You are not authorized to edit this post');
        }
       $formFields = $request->validate([
            'title' => 'required|min:4',
            'category' => 'required',
            'details' => 'required|min:10',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->hasFile('image')){
            
           // $destinationPath = asset('storage/' . $post->image);
           $storagePath = storage_path('app/public/' . $post->image);

            if(File::exists($storagePath)){
                File::delete($storagePath);
            }
         
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

     

       $post->update($formFields);
    
        return back()->with('message', 'Post update successfully');
    }

    // delete post
    public function destroy(Post $post)
    {
           // Make sure logged in user is the owner of the post
           if (auth()->user()->id !== $post->user_id) {
            return redirect('/')->with('message', 'You are not authorized to delete this post');
        }
        $storagePath = storage_path('app/public/' . $post->image);
        if(File::exists($storagePath)){
            File::delete($storagePath);
        }
        $post->delete();
        return redirect('/')->with('message', 'Post deleted successfully');
    }

    // Manage post 

    public function manage()
    {
        return view('posts.manage', ['posts' => auth()->user()->posts()->get()]);
    }
  
}