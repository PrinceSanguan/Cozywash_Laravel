<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CozyPoints</title>
  <link rel="stylesheet" href="{{asset('css/login_loyalty.css')}}">

<link rel="icon" href="{{asset('image/fabicon.png')}}" type="image/fabicon.png">
  
@include('customer.navbar')

<div id="container">
    <div class="column">
        <div id="container1">
    <h2 style="color:#F6E4EC">Say hello to CozyPoints</h2>
    <h3 style="color:#7D1A40; font-size:16px;">Get a free laundry service with every 100 points you collect!</h3>
        </div>
      
    <p style="color:#7D1A40; font-size: 20px">Total Points: <span id="totalPoints" style="font-size:50px; margin-left:20px; background: #E879AE; border-radius: 20px; padding-right: 20px; padding-left: 20px; color: white;">0</span></p>
    <input type="text" id="redeemCodeInput" placeholder="Enter redeem code">
    <button id="redeemButton" onclick="redeemCode()">Redeem</button>
    </div>  

    <div id="history">
        <div class="history">
        <h3 style="color: #DD7FA5;">Redeem History:</h3>
        <ul id="historyList"></ul>
        </div>
    </div>
</div>

<script src="{{asset('js/login_loyalty.js')}}"></script>
</body>
</html>