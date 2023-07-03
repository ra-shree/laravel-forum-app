<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RegisterController
{
    public function create(): View
    {
        return view('register.create');
    }

    public function store(): RedirectResponse
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
