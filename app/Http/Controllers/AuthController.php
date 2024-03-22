<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Redirect;

class AuthController extends Controller
{
    public function signupPage()
    {
        return Inertia::render('Signup');
    }

    public function signinPage()
    {
        return Inertia::render('Signin');
    }

    public function signupProcess(Request $request)
    {
        // validate the request
        $credentials = $request->validate([
            'full_name' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|max:16',
            'confirm_password' => 'required|same:password'
        ]);

        User::create([
            'name' => $request->full_name, // corrected here
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        //redirect to signin page
        return Inertia::render('Signin');
    }

    public function signinProcess(Request $request)
    {
        // validate the request
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8|max:16',
        ]);

        if (Auth::attempt($credentials)) {
            //Auth stores the user in session automatically
            //redirect to '/' with a page refresh
            return Redirect::to('/');
        } else {
            //redirect back with error message
            return back()->withErrors([
                'message' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function signoutProcess()
    {
        //logout the user
        Auth::logout();
        //redirect to signin page
        return redirect('/signin');
    }

}
