<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view ('auth.login');
    }

    public function loginForm(Request $request)
    {
        // validate
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        // Attempt to authenticate user
        if (Auth::attempt($request->only('email', 'password'))) 
        {
            // Authentication successful, redirect to customer page
            return redirect()->route('customer.home')->with(['success' => 'Login Successfully!']);

        } else {
            // Authentication failed, redirect back to login page with error message
            return redirect()->route('login')->with(['error' => 'Invalid email or password!']);
        }
    }
}
