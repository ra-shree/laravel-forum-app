<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attribute = request()->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
//            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:255', 'confirmed'],
        ]);

        $user = User::create($attribute);
//        session()->flash('success', 'Your account has been created.');
        auth()->login($user);

        return redirect('/login')->with('success', 'Your account has been created.');
    }
}
