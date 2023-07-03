<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticate;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticate
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password): void
    {
        $this->attributes['password'] = (!Hash::needsRehash($password)) ? $password : bcrypt($password);
//        $this->attributes['password'] = bcrypt($password);
    }

    public function posts(): hasMany
    {
        return $this->hasMany(Post::class);
    }

    public function comments(): hasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function replies(): hasMany
    {
        return $this->hasMany(Reply::class);
    }
}
