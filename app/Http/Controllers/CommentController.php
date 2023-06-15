<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CommentController extends Controller
{
    public function create()
    {
        $attributes = request()->validate([
            'post_id' => ['required', Rule::exists('posts', 'id')],
            'content' => ['required', 'max:300']
        ]);

        if(auth()->check()) {
            $user_id = auth()->user()->id;
        } else {
            $user_id = null;
        }

        $attributes['user_id'] = $user_id;

        Comment::create($attributes);
        return back()->with('success', 'Comment Added');
    }
}
