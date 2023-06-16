<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeFilter($query, array $filters) // Post::newQuery()->filter
    {
        if ($filters['search'] ?? false) {
            $query
                ->where('title', 'ilike', '%'.request('search').'%')
                ->orWhere('body', 'ilike', '%'.request('search').'%');
        }
        $query->orderByDesc('created_at');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
