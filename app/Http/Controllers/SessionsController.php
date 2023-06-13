<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Nette\Schema\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('login.create');
    }

    public function store()
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

    public function destroy()
    {
        Auth::logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
