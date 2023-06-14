<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CommentController extends Controller
{
    public function create()
    {
        $user = auth()->user();

        $attributes = request()->validate([
            'post_id' => ['required', Rule::exists('posts', 'id')],
            'content' => ['required', 'max:300']
        ]);

        $attributes['user_id'] = $user->id;
        Comment::create($attributes);

        return back()->with('success', 'Comment Added');
    }
}
