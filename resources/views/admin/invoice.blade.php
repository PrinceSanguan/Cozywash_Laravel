<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('css/invoice.css')}}">
    <link rel="icon" href="{{asset('image/fabicon.png')}}" type="fabicon.png">

</head>
<body>

<h1 style="color:white; padding-left: 100px; margin-top: 30px; font-size: 20px;"> DASHBOARD </h1>
 <div id="datetime"></div>

 <script>//Date & Time
function updateDateTime() {
    const dateTimeElement = document.getElementById('datetime');
    const now = new Date();
    const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const timeOptions = { hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true };
    const formattedDate = now.toLocaleDateString(undefined, dateOptions);
    const formattedTime = now.toLocaleTimeString(undefined, timeOptions);
    dateTimeElement.textContent = formattedDate + ' ' + formattedTime;
}

// Call the function to update date and time initially
updateDateTime();

// Update date and time every second
setInterval(updateDateTime, 1000);</script>

<div class="menu-toggle" onclick="toggleMenu()">
    <script> //Hamburger
function toggleMenu() {
  const menu = document.querySelector('.menu');
  if (menu.style.left === "-250px") {
    menu.style.left = "0";
  } else {
    menu.style.left = "-250px";
  }
}</script>
    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16" style="color: white;">
  <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
</svg>
</div>
<div class="menu">
    <ul>
        <li><a href="{{route('admin.dashboard')}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z"/>
  </svg> Dashboard</a></li>
        <li><a href="{{route('admin.invoice')}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16">
    <path d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27m.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0z"/>
    <path d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5"/>
  </svg> Invoice</a></li>
        <li><a href="{{route('admin.history')}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
    <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.91zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z"/>
    <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z"/>
    <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5"/>
  </svg> History</a></li>
        <li><a href="{{route('admin.users')}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
  </svg> Users</a></li>
        <li><a href="settings.html"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
    <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
  </svg> Settings</a></li>
      <li><a href="{{route('logout')}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
  </svg> Logout</a></li>
      </ul>
  </div>
</div>


<form id="invoiceForm">
<div class="invoice">
    <div class="form">
        <p><b>Cashier: <span id="loggedInUser"> {{$user->lastName}} </span></p></b>

        <p><b>Receipt No:</b> <span id="receiptNumber"></span></p>

        <form action="{{route('admin.invoice')}}" method="get">
            @csrf
            <input type="text" name="customerSearch" id="customerSearch" placeholder="Search Customer Name">
            @if ($customers !== null)
                    @if ($customers->count() > 0)
                        <ul id="customerList">
                            @foreach ($customers as $customer)
                            <li><a href="{{ route('admin.invoice', ['id' => $customer->id]) }}">{{ $customer->lastName }}</a></li>
                            @endforeach
                        </ul>
                    @else
                <p>No records found!</p>
            @endif
            @else
                <p></p>
            @endif
            <button type="submit" value="search">Search</button><br><br>
        </form>
        

        <form action="{{route('admin.invoice.post')}}" method="post" id="myForm">
            @csrf
            <input class="customer-link" type="text" id="id" placeholder="id" value="{{ $customerDetails ? $customerDetails->id : '' }}" name="user_id" readonly style="display: none;">
            <input class="customer-link" type="text" id="address" placeholder="Address" value="{{ $customerDetails ? $customerDetails->address : '' }}" readonly>
        
            {{-- <input type="text" id="voucherCode" placeholder="Enter Voucher Code" readonly>
            <button type="button" id="redeemButton">Redeem</button><br><br>
            --}}
        
            <label>Kilo/s:</label>
            <input type="number" id="kilos" min="0" name="kilo" step="0.1" required>
            <br>
        
            <label></label>
            <select id="serviceType" name="serviceType" required>
                <option value="" disabled selected>- Select -</option>
                <option value="fullService">Full-Service</option>
                <option value="selfService">Self-Service</option>
            </select>
        
            <label>Shipping Option:</label>
            <select id="shippingOption" name="shippingOption" required>
                <option value="" disabled selected>- Select -</option>
                <option value="selfPickup">Self-Pick-Up</option>
                <option value="delivery">Delivery</option>
            </select><br>
        </div>
        
            <div class="quantityForm">
                <h3>Qty</h3>
                <label>Detergent: </label>
                <input type="number" id="detergent" min="0" name="detergent" required>
                <br>
        
                <label>Fabcon: </label>
                <input type="number" id="fabcon" min="0" name="fabcon" required>
                <br>
        
                <label>Bleach: </label>
                <input type="number" id="bleach" min="0" name="bleach" required>
                <br>
        
                <label>Plastic: </label>
                <input type="number" id="plastic" min="0" name="plastic" required>
            </div>
        
            <button type="button" id="clearButton">Clear</button>
            <button type="submit" id="proceedButton">Proceed</button>
        </form>
        


<footer>
    <p style="font-size: 13px;"> &copy; 2024 CozyWash. All rights reserved.</p>
</footer>

<!--ClearButton-->
<script>
    function clearInvoice() {
    document.getElementById('customerSearch').value = '';
    document.getElementById('address').value = '';
    document.getElementById('voucherCode').value = '';
    document.getElementById('kilos').value = '';
    document.getElementById('serviceType').value = 'full'; // Reset service type to default
    document.getElementById('shippingOption').value = 'selfPickup'; // Reset shipping option to default
    document.getElementById('detergent').value = '';
    document.getElementById('fabcon').value = '';
    document.getElementById('bleach').value = '';
    document.getElementById('plastic').value = '';
    document.getElementById('price').value = '';
}
</script>

<script>
    document.getElementById("clearButton").addEventListener("click", function() {
        // Get all input fields within the form
        var inputs = document.querySelectorAll("#myForm input[type='text'], #myForm input[type='number'], #myForm select");

        // Loop through each input field and clear its value
        inputs.forEach(function(input) {
            input.value = '';
        });
    });
</script>



<script src="{{asset('js/invoice.js')}}"></script>
</div>
</body>
</html>
