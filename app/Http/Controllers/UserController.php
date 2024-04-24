<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{


    // Store user into db
    public function signUp(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required| confirmed| min:6',
        ]);

        $formFields['password'] = bcrypt($formFields['password']);
        $user = User::create($formFields);

        // login
        auth()->login($user);
        return redirect('/')->with('welcomeMessage', 'User created and logged in!');
    }

    // sign out user
    public function signOut(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('welcomeMessage', 'You have been logout!');
    }

    //show login form
    public function showSignInPage()
    {
        return view('auth.sign-in', ['signin' => 'Sign In']);
    }

    // show Register/create Form
    public function showSignUpPage()
    {
        return view('auth.sign-up', ['signup' => 'Sign Up']);
    }

    // authenticate
    public function signIn(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required| min:6',
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('welcomeMessage', 'You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalue Credentials']);
    }
}
