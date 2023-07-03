<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->filter(request(['search']))->paginate(10);

        return view('home.index', [
            'posts' => $posts
        ]);
    }

    private function orderByDesc($query)
    {
        return $query->orderByDesc('created_at');
    }

    public function show($id)
    {
        $post = Post::with(['comments'=> fn($query) => self::orderByDesc($query),
            'comments.replies' => fn($query) => self::orderByDesc($query),
            'comments.user',
            'comments.replies.user'])
            ->find($id);
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

        return redirect()->route('post.show', ['id' => $post->id]);
    }
}
