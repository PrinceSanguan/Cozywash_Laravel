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

        // Fetch only the last entry from customerOrder table
        $latestOrder = CustomerOrder::latest()->first();

        // fabcon price
        $fabconPrice = $latestOrder->fabcon * 12;

        // detergent price
        $detergentPrice = $latestOrder->detergent * 18;

        // Bleach price
        $bleachPrice = $latestOrder->bleach * 12;

        // platic
        $plasticPrice = $latestOrder->plastic * 3;

        $totalBalance = $fabconPrice + $detergentPrice + $bleachPrice + $plasticPrice +
                        65 + 75 + 30 + 30;

        // Display success message as modal along with the last entry
        return "
        <div id='myModal' class='modal' style='display: block;'>
            <div class='modal-content'>
                <span class='close'>&times;</span>
                <p id='successMessage'>Customer Order Success!</p>
                <table border='1'>
                    <tr><th>Expenses</th><th>amount</th><th>qty</th><th>Total Amount</th></tr>
                    <tr>
                        <td>Wash</td>
                        <td>65.00</td>
                        <td>-</td>
                        <td>65.00</td>
                    </tr>
                    <tr>
                        <td>Dry</td>
                        <td>75.00</td>
                        <td>-</td>
                        <td>75.00</td>
                    </tr>
                    <tr>
                        <td>Fold</td>
                        <td>30.00</td>
                        <td>-</td>
                        <td>30.00</td>
                    </tr>
                    <tr>
                        <td>Detergent</td>
                        <td>18.00</td>
                        <td>{$latestOrder->detergent}</td>
                        <td>{$detergentPrice}</td>
                    </tr>
                    <tr>
                        <td>Fabcon</td>
                        <td>12.00</td>
                        <td>{$latestOrder->fabcon}</td>
                        <td>{$fabconPrice}</td>
                    </tr>
                    <tr>
                        <td>Bleach (Color Safe)</td>
                        <td>12.00</td>
                        <td>{$latestOrder->bleach}</td>
                        <td>{$bleachPrice}.00</td>
                    </tr>
                    <tr>
                        <td>Plastik</td>
                        <td>3.00</td>
                        <td>{$latestOrder->plastic}</td>
                        <td>{$plasticPrice}.00</td>
                    </tr>
                    <tr>
                        <td>Addt'l Charges</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Delivery</td>
                        <td>30.00</td>
                        <td>-</td>
                        <td>30.00</td>
                    </tr>
                    <tr>
                        <td>Total Balance</td>
                        <td></td>
                        <td></td>
                        <td>{$totalBalance}.00</td>
                    </tr>
                </table>
            </div>
        </div>
        <script>
            setTimeout(function() {
                window.location.href = '/admin/invoice';
            }, 25000); // Redirect after 10 seconds
        </script>";


        }
}