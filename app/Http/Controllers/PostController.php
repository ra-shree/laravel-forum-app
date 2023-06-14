<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
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
