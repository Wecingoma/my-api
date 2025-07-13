<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Ssr\Response as SsrResponse;

class PostController extends Controller
{
    
    public function create(): Response
    {
        // dd(Auth::user());
        // return inertia('Posts/Create');
        if(Auth::check()) {
            // return inertia('Posts/Create');
            return Inertia::render('Posts/Create', [
                'user' => Auth::user(),
            ]);
        } else {
            return abort(403, 'Unauthorized action.');
            // return redirect()->route('login')->with('error', 'You must be logged in to create a post.');
            // Alternatively, you can use Inertia to redirect:
            // return inertia('Auth/Login', [
            //     'error' => 'You must be logged in to create a post.',
            // ]);
            // redirect()->route('login')->with('error', 'You must be logged in to create a post.');
        }
    }

    public function store(Request $request)
    {

        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to create a post.');
        }

        /*
        if(Auth::check()) {
            // return inertia('Posts/Create');
            return Inertia::render('Posts/Create', [
                'user' => Auth::user(),
            ]);
        } else {
            return abort(403, 'Unauthorized action.');
            // return redirect()->route('login')->with('error', 'You must be logged in to create a post.');
            // Alternatively, you can use Inertia to redirect:
            // return inertia('Auth/Login', [
            //     'error' => 'You must be logged in to create a post.',
            // ]);
            // redirect()->route('login')->with('error', 'You must be logged in to create a post.');
        }
            */

        // Validate the request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Create a new post
        $post = Auth::user()->posts()->create($request->only('title', 'description'));

        // $post1 = new Post();
        // $post1->title = $validated['title'];
        // $post1->description = $validated['description'];
        // $post1->user_id = Auth::id();

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $post->image = $path;
            $post->save();
        }


        return redirect()->route('dashboard')->with('success', 'Poste a ete creer');
        // Redirect to the post's page or wherever you want
        // return redirect()->route('posts.show', $post->id)->with('success', 'Post created successfully.');
    }

    public function show(Post $post): Response
    {
        return Inertia::render('Posts/Show', [
            'post' => $post->load('author')
        ]

    );
    }

    public function edit(Post $post): Response
    {
        return Inertia::render('Posts/Edit', [
            'post' => $post
        ]

    );
    }



    public function update(Request $request, Post $post)
    {


        // Check if the user is authenticated
        // if (!Auth::check()) {
        //     return redirect()->route('login')->with('error', 'You must be logged in to create a post.');
        // }

        /*
        if(Auth::check()) {
            // return inertia('Posts/Create');
            return Inertia::render('Posts/Create', [
                'user' => Auth::user(),
            ]);
        } else {
            return abort(403, 'Unauthorized action.');
            // return redirect()->route('login')->with('error', 'You must be logged in to create a post.');
            // Alternatively, you can use Inertia to redirect:
            // return inertia('Auth/Login', [
            //     'error' => 'You must be logged in to create a post.',
            // ]);
            // redirect()->route('login')->with('error', 'You must be logged in to create a post.');
        }
            */

        // Validate the request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Create a new post
        // $post = Auth::user()->posts()->create($request->only('title', 'description'));

        // $post1 = new Post();
        $post1->title = $validated['title'];
        $post1->description = $validated['description'];
        // $post1->user_id = Auth::id();

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            if($post->image){
                Storage::disk('public')->delete($post->image);
            }
            $path = $request->file('image')->store('images', 'public');
            $post->image = $path;
            $post->save();
        }


        return redirect()->route('dashboard')->with('success', 'Poste modifier avec success');
        // Redirect to the post's page or wherever you want
        // return redirect()->route('posts.show', $post->id)->with('success', 'Post created successfully.');
    }

    public function destroy(Post $post){
        if($post->image){
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->back()->with('success', 'Poste supprimer avec succes');

    }

    public function like(Post $post){
        $user = Auth::user();
        if($post->likeBy()->where('user_id', $user->id)->exists()){
            $post->likeBy()->detach($user->id);
            $message = 'Like Retire';
        }else{
            $post->likeBy()->attach('user->id');
            $message = ' liked';
        }

        return redirect()->back()->with('success', $message);
    }
}
