<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Validation\Rule;

class ReplyController extends Controller
{
    public function create()
    {
        $attributes = request()->validate([
            'comment_id' => ['required', Rule::exists('comments', 'id')],
            'content' => ['required', 'max:300']
        ]);

        if(auth()->check()) {
            $user_id = auth()->user()->id;
        } else {
            $user_id = null;
        }

        $attributes['user_id'] = $user_id;

        Reply::create($attributes);
        return back()->with('success', 'Reply added');
    }
}
