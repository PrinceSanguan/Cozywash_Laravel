<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function registerForm(Request $request)
    {
        // Validate the request data with custom error messages
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|unique:users',
            'contact' => 'required|digits:11',
            'password' => 'required|confirmed',
            'address' => 'required',
        ]);
    
        // Saving in the database
        $user = User::create([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
            'contact' => $request->input('contact'),
            'password' => bcrypt($request->input('password')),
            'address' => $request->input('address'),
        ]);
    
        if (!$user) {
            return redirect()->route('register')->with('error', 'Failed to create user.');
        }
    
        // Display success message as alert
    echo "<script>alert('Registration successful!'); window.location.href = '/auth/login';</script>";
    
    }
    
}
