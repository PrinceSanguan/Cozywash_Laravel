<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CozyWash</title>
<link rel="stylesheet" href="{{asset('css/login_home.css')}}">
<link rel="icon" href="{{asset('image/fabicon.png')}}" type="fabicon.png">
</head>
<body>
   
@include('customer.navbar')

    <script>
        @if(session('success'))
            alert("{{ session('success') }}");
        @endif
    </script>

        <h3 id="welcome">Welcome to Cozy!Wash, your one-step<br>solution for all your laundry needs!</h3>
        
<!--Footer-->
<footer>
    <p style="font-size: 10px;"> &copy; 2024 CozyWash. All rights reserved.</p>
</footer>

<script src="{{asset('js/login_home.js')}}"></script>
</body>
</html>
