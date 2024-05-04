<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerOrder;

class AdminController extends Controller
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
    
        // Check if the user exists and is a admin
        if ($user && $user->userType === 'admin') {
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

        
        // Fetch all data from the customerOrder table
       $customerOrder = CustomerOrder::all();

        // Pass the information to the view
        return view('admin.dashboard', ['customerOrder' => $customerOrder]);
    }

    public function history() 
    {
          $user = $this->getUserInfo();

        // Check if the user is found
        if (!$user) {
            return redirect()->route('welcome')->withErrors(['error' => 'User not found.']);
        } 

        // Pass the information to the view
        return view('admin.history');
    }

    public function users() 
    {
          $user = $this->getUserInfo();

        // Check if the user is found
        if (!$user) {
            return redirect()->route('welcome')->withErrors(['error' => 'User not found.']);
        }

        // Fetch all accounts where userType is 'Staff'
        $data = User::where('userType', 'staff')->get();

        // Pass the information to the view
        return view('admin.users', ['data' => $data]);
    }

    public function addStaff(Request $request) 
    {
        // Validate the request data with custom error messages
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|unique:users',
            'contact' => 'required|digits:11',
            'address' => 'required',
            'password' => 'required',
        ]);

        // Saving in the database
        $user = User::create([
            'firstName' => $request->input('firstName'),
            'lastName' => $request->input('lastName'),
            'email' => $request->input('email'),
            'contact' => $request->input('contact'),
            'address' => $request->input('address'),
            'password' => bcrypt($request->input('password')),
            'userType' => 'staff', 
        ]);

        if (!$user) {
            return redirect()->route('admin.users')->with('error', 'Failed to create user.');
        }
        
        // Display success message as alert
        echo "<script>alert('Staff is Added!'); window.location.href = '/admin/users';</script>";
    }

    public function invoice(Request $request, $id = null)
    {
        // Retrieve user info
        $user = $this->getUserInfo();
    
        // Check if the user is found
        if (!$user) {
            return redirect()->route('welcome')->withErrors(['error' => 'User not found.']);
        }
    
        // Retrieve customers based on search query
        $customers = $this->searchCustomers($request);
    
        // Retrieve customer details based on ID
        $customerDetails = null;
        if ($id) {
            // Fetch the customer based on the ID
            $customerDetails = User::find($id);
        }
    
        // Pass user, customers, and customerDetails variables to the view
        return view('admin.invoice', [
            'user' => $user,
            'customers' => $customers,
            'customerDetails' => $customerDetails
        ]);
    }
    
    
    public function searchCustomers(Request $request)
    {
        // Retrieve the search query from the request
        $searchQuery = $request->input('customerSearch');
    
        // If search query is provided, search for customers
        if ($searchQuery) {
            return User::where('lastName', 'like', '%' . $searchQuery . '%')
                       ->where('usertype', 'customer')
                       ->get();
        }
    
        // If no search query is provided, return null or an empty collection
        return null; // or return collect(); if you want an empty collection
    }
    

    public function invoicePost(Request $request)
    {
        // Validate the request data with custom error messages
        $request->validate([
            'user_id' => 'required',
            'serviceType' => 'required',
            'shippingOption' => 'required',
            'kilo' => 'required',
            'detergent' => 'required',
            'fabcon' => 'required',
            'bleach' => 'required',
            'plastic' => 'required',
        ]);

        // Saving in the database
        $customerOrder = CustomerOrder::create([
            'user_id' => $request->input('user_id'),
            'serviceType' => $request->input('serviceType'),
            'shippingOption' => $request->input('shippingOption'),
            'kilo' => $request->input('kilo'),
            'detergent' => $request->input('detergent'),
            'fabcon' => $request->input('fabcon'),
            'bleach' => $request->input('bleach'),
            'plastic' => $request->input('plastic'),
            'serviceStatus' => 'pending',
        ]);

        if (!$customerOrder) {
            return redirect()->route('admin.invoice')->with('error', 'Failed to customer order.');
        }

        // Display success message as alert
        echo "<script>alert('Customer Order Success!'); window.location.href = '/admin/invoice';</script>";
    }
}