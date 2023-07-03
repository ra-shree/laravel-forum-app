<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Validation\Rule;

class CommentController extends Controller
{
    public function create()
    {
        $attributes = request()->validate([
            'post_id' => ['required', Rule::exists('posts', 'id')],
            'content' => ['required', 'max:300']
        ]);

        $userId = (auth()->check()) ? auth()->user()->id : null;
        $attributes['user_id'] = $userId;

        Comment::create($attributes);
        return back()->with('success', 'Comment Added');
    }
}
