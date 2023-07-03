<?php

namespace App\Models;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeFilter($query, array $filters): void// Post::newQuery()->filter
    {
        if ($filters['search'] ?? false) {
            $query
                ->where('title', 'ilike', '%'.request('search').'%')
                ->orWhere('body', 'ilike', '%'.request('search').'%');
        }
        $query->orderByDesc('created_at');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): hasMany
    {
        return $this->hasMany(Comment::class);
    }
}
