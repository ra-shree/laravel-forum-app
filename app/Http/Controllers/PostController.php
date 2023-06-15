<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('home.index', [
            'posts' => Post::with('user')->paginate(10)
        ]);
    }

    public function show($id)
    {
//        $post = Post::find($id);
        $post = Post::with('comments.replies', 'comments.user','comments.replies.user')->find($id);
        return view('post.post', [
            'post'=> $post
        ]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store()
    {
        $user = auth()->user();

        $attributes = request()->validate([
            'title' => ['required', 'max:255'],
            'excerpt' => ['required', 'max:255'],
            'body' => ['required', 'max:500']
        ]);

        $attributes['user_id'] = $user->id;
        $post = Post::create($attributes);

        return redirect("/post/$post->id");
    }
}
