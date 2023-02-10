<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Show Register Create Form
    public function create()
    {
        return view('users.register');
    }

    //Create new User
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'

        ]);

        //Hash password with bcrypt
        $formFields['password'] = bcrypt($formFields['password']);

        //Create the user
        $user = User::create($formFields);

        //Log the user in
        auth()->login($user);

        //Redirect
        return redirect('/')->with('success', 'User created and logged in!');
    }

    //Logout User
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logged out!');
    }

    //Show Login Form
    public function login()
    {
        return view('users.login');
    }

    //Login User
    public function authenticate(Request $request)
    {

        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('success', 'You are logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
