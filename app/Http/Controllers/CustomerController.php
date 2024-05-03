<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    private function getUserInfo()
    {
        // Get the currently authenticated user
        $authenticatedUser = Auth::user();
    
        // Check if the authenticated user exists
        if (!$authenticatedUser) {
            return null;
        }
    
        // Fetch user information based on the authenticated user's email
        $user = User::where('email', $authenticatedUser->email)->first();
    
        // Check if the user exists and is a customer
        if ($user && $user->userType === 'customer') {
            return $user;
        }
    
        return null;
    }
    public function index() 
    {
         $user = $this->getUserInfo();

        // Check if the user is found
        if (!$user) {
            return redirect()->route('welcome')->withErrors(['error' => 'User not found.']);
        } 

        // Pass the information to the view
        return view('customer.home');
    }

    public function services() 
    {
         $user = $this->getUserInfo();

        // Check if the user is found
        if (!$user) {
            return redirect()->route('welcome')->withErrors(['error' => 'User not found.']);
        } 

        // Pass the information to the view
        return view('customer.services');
    }

    public function about() 
    {
         $user = $this->getUserInfo();

        // Check if the user is found
        if (!$user) {
            return redirect()->route('welcome')->withErrors(['error' => 'User not found.']);
        } 

        // Pass the information to the view
        return view('customer.about');
    }

    public function receipt() 
    {
         $user = $this->getUserInfo();

        // Check if the user is found
        if (!$user) {
            return redirect()->route('welcome')->withErrors(['error' => 'User not found.']);
        } 

        // Pass the information to the view
        return view('customer.receipt');
    }

    public function loyalty() 
    {
         $user = $this->getUserInfo();

        // Check if the user is found
        if (!$user) {
            return redirect()->route('welcome')->withErrors(['error' => 'User not found.']);
        } 

        // Pass the information to the view
        return view('customer.loyalty');
    }

    public function profile() 
    {
         $user = $this->getUserInfo();

        // Check if the user is found
        if (!$user) {
            return redirect()->route('welcome')->withErrors(['error' => 'User not found.']);
        } 

        // Pass the information to the view
        return view('customer.profile', ['user' => $user]);
    }

    public function editProfile(Request $request)
    {
        // Validate the request data with custom error messages
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|unique:users,email,' . auth()->user()->id,
            'contact' => 'required|digits:11',
            'address' => 'required',
        ]);
        
        // Update the user's profile in the database
        $user = auth()->user();
        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->email = $request->input('email');
        $user->contact = $request->input('contact');
        $user->address = $request->input('address');
        $user->save();
        
        // Check if user profile was successfully updated
        if (!$user) {
            return redirect()->back()->with('error', 'Failed to update profile.');
        }
        
        // Redirect to profile page with success message
        return redirect()->route('customer.profile')->with('success', 'Profile updated successfully.');
    }

}
