<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Auth\User;

class UserController extends Controller
{

    public function show(User $user)
    {
        return view('profile.index', ['page' => 'Profile', 'user' => $user]);
    }

    public function editProfile()
    {

        $user = User::find(auth()->id());

        return view('profile.edit', ['page' => 'Edit', 'user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        // $user = User::find(auth()->id());

        if ($user->id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }

        $formFields = $request->validate([
            'name' => 'required|string',
            'occupation' => 'string',
            'phone' => 'string',
            'bio' => 'string'
        ]);
        // dd($request);
        // dd($formFields);
        if ($request->hasFile('profile_pic')) {
            $formFields['profile_pic'] = $request->file('profile_pic')->store('user', 'public');
        }

        $user->update($formFields);
        return redirect("/users/$user->id/detail")->with('message', 'Profile updated successfully!');
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
