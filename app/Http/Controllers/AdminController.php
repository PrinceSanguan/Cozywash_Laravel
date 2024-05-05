<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\CustomerOrder;
use App\Models\Prices;

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

       // Fetch all data from the customerOrder table where serviceStatus is pending
        $ongoingServices= CustomerOrder::where('serviceStatus', 'pending')->count();

        // Fetch all data from the customerOrder table where serviceStatus is paid
        $completedServices= CustomerOrder::where('serviceStatus', 'paid')->count();

        // Total Sales Calculation
        $totalSales = CustomerOrder::sum('sales');


        // Pass the information to the view
        return view('admin.dashboard', ['customerOrder' => $customerOrder, 'ongoingServices' => $ongoingServices, 
                                        'completedServices' => $completedServices, 'totalSales' => $totalSales]);
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

    public function settings() 
    {
          $user = $this->getUserInfo();

        // Check if the user is found
        if (!$user) {
            return redirect()->route('welcome')->withErrors(['error' => 'User not found.']);
        }

        // Fetch all data from the Prices
        $prices = Prices::first();

        // Pass the information to the view
        return view('admin.settings', ['prices' => $prices]);
    }

    public function updatePrice(Request $request)
    {

        // Fetch the single record from the prices table
        $prices = Prices::first();

        // Prepare an array to hold the fields to update
        $updateData = [];

        
        if ($request->filled('kilo')) {
            $updateData['kilo'] = $request->input('kilo');
        }

        if ($request->filled('wash')) {
            $updateData['wash'] = $request->input('wash');
        }

        if ($request->filled('dry')) {
            $updateData['dry'] = $request->input('dry');
        }

        if ($request->filled('fold')) {
            $updateData['fold'] = $request->input('fold');
        }

        if ($request->filled('detergent')) {
            $updateData['detergent'] = $request->input('detergent');
        }

        if ($request->filled('fabcon')) {
            $updateData['fabcon'] = $request->input('fabcon');
        }

        if ($request->filled('bleach')) {
            $updateData['bleach'] = $request->input('bleach');
        }


        if ($request->filled('plastic')) {
            $updateData['plastic'] = $request->input('plastic');
        }

        $prices->update($updateData);


        // Display success message as alert
        echo "<script>alert('Price is Updated!'); window.location.href = '/admin/settings';</script>";

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
    
    // Fetch Latest Price
    $latestPrice = Prices::first();

    // Calculate the total balance
    $fabconPrice = $request->input('fabcon') * $latestPrice->fabcon;
    $detergentPrice = $request->input('detergent') * $latestPrice->detergent;
    $bleachPrice = $request->input('bleach') * $latestPrice->bleach;
    $plasticPrice = $request->input('plastic') * $latestPrice->plastic;
    
    $totalBalance = $fabconPrice + $detergentPrice + $bleachPrice + $plasticPrice +
                    $latestPrice->wash + $latestPrice->dry + $latestPrice->fold + 30;

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
        'sales' => $totalBalance,
    ]);

        if (!$customerOrder) {
            return redirect()->route('admin.invoice')->with('error', 'Failed to customer order.');
        }

    // Fetch only the last entry from customerOrder table
    $latestOrder = CustomerOrder::latest()->first();

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
                        <td>{$detergentPrice}.00</td>
                    </tr>
                    <tr>
                        <td>Fabcon</td>
                        <td>12.00</td>
                        <td>{$latestOrder->fabcon}</td>
                        <td>{$fabconPrice}.00</td>
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
            }, 10000); // Redirect after 10 seconds
        </script>";


        }
}