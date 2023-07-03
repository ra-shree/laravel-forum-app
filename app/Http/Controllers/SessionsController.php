<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class SessionsController extends Controller
{
    public function create(): View
    {
        return view('login.create');
    }

    public function store(): RedirectResponse
    {
        $attributes = request()->validate([
            'email'=> ['required', Rule::exists('users', 'email')],
            'password'=> ['required'],
        ]);

        if(! auth()->attempt($attributes)) {
            return back()->withInput()->withErrors(['email' => 'Your credentials could not be verified.']);
        }

        session()->regenerate();

        return redirect('/')->with('success', 'Welcome Back!');
//        throw ValidationException::withMessages([
//            'email' => 'Your credentials could not be verified.'
//        ]);
    }

    public function destroy(): RedirectResponse
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
