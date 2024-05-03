<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <link rel="stylesheet" href="{{asset('css/login_receipt.css')}}">
    <link rel="icon" href="{{asset('image/fabicon.png')}}" type="image/png">
</head>
<body>

@include('customer.navbar')

<div class="receipt">
    <h1>Receipt</h1>
    <div class="customer-details">
        <p><strong>Customer Name:</strong></p>
        <p><strong>Address:</strong></p>
    </div>
    <div class="items">
        <h2>Items Purchased</h2>
        <table>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Price per Unit</th>
                <th>Total</th>
            </tr>
            <!-- Populate items dynamically -->
        </table>
    </div>
    <div class="expenses">
        <h2>Breakdown of Expenses</h2>
        <ul>

          <li><strong>Service Type:</strong></li>
          <li><strong>Shipping Option:</strong></li>
          <li><strong>Payment Status:</strong></li>
          <li><strong>Mode of Payment:</strong></li>

        </ul>
    </div>
    <div class="previous-transactions">
        <h2>Previous Transaction History</h2>
        <ul>
          <li>Date:, Service Type:, Shipping Option: , Payment Status: , Mode of Payment: , Total Amount: </li>
        </ul>
    </div>
    <div class="total">
        <p><strong>Total Amount:</strong></p>
    </div>
</div>

<!--Footer-->
<footer>
    <p style="font-size: 10px;"> &copy; 2024 CozyWash. All rights reserved.</p>
</footer>

</body>
</html>
