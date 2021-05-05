<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }

    public function index()
    {
        $posts = Post::latest()->with(['user', 'likes'])->paginate(20);

        // dd($posts);

        return view('post.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return view('post.show', [
            'post' => $post
        ]);
    }

    public function store(Request $Request)
    {
        $this->validate($Request, [ 
            'body' => 'required'
        ]);

        // Post::created([
        //     'user_id' => auth()->id(),
        //     'body' => $Request->body
        // ]);

        $Request->user()->posts()->create($Request->only('body'));

        return back();
    }


    public function destroy(Post $post)
    {
        // if( !$post->ownBy(auth()->user()) ) {
        //     dd('no');
        // }

        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }
}
