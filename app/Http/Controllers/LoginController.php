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
        // If not authenticated, proceed with login attempt
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Attempt to authenticate user
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
    
            // Redirect user to respective dashboard based on user type
            switch ($user->userType) {
                case 'customer':
                    return redirect()->route('customer.home');
                    break;
                case 'staff':
                    return redirect()->route('staff.dashboard');
                    break;
                case 'admin':
                    return redirect()->route('admin.dashboard');
                    break;
                default:
                    // Handle unrecognized user types here
                    return redirect()->route('welcome');
                    break;
            }
        } else {
            // Authentication failed, redirect back to login page with error message
            return redirect()->route('login')->with(['error' => 'Invalid email or password']);
        }
    }
    
}
