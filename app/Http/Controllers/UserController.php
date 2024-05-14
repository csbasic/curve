<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function list()
    {
        $users = User::latest()->simplePaginate(10);
        return view('users.list', ['users' => $users, 'page' => 'Users']);
    }

    public function show(User $user)
    {
        return view('users.profile', ['page' => 'Profile', 'user' => $user]);
    }

    //
    public function editProfile($user)
    {

        $user = User::find($user);

        return view('users.edit', ['page' => 'Edit', 'user' => $user]);
    }

    // update user
    public function update(Request $request, User $user)
    {

        if (!Auth::check()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'name' => 'required|string',
            'occupation' => 'string',
            'phone' => 'string',
            'bio' => 'string'
        ]);

        if ($request->hasFile('profile_pic')) {
            $formFields['profile_pic'] = $request->file('profile_pic')->store('user', 'public');
        }

        $user->update($formFields);
        return redirect("/users/$user->id/detail/?from")->with('message', 'Profile updated successfully!');
    }

    // Store user into db
    public function signUp(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required| confirmed| min:6',
        ]);

        if ($request->hasFile('profile_pic')) {
            $formFields['profile_pic'] = $request->file('profile_pic')->store('user', 'public');
        } else {
            $formFields['profile_pic'] = 'user/profile-pic.jpg';
        }

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
