<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Form</title>
<link rel="stylesheet" href="{{asset('css/login.css')}}">
<link rel="icon" href="{{asset('image/fabicon.png')}}" type="fabicon.png">
</head>
<body>

@include('navbar')

<form id="loginForm" method="post" action="{{route('login.form')}}">
    @csrf
    <h2 style="color: white;">Login to CozyWash!</h2>

    <input type="email" id="email" name="email" placeholder="Email"><br>

    <input type="password" id="password" name="password" placeholder="Password"><br>

    <label style="color:white; float: left;"><input type="checkbox" id="rememberMe" name="rememberMe">Remember Me</label><br><br>

    <button id="loginNow" value="submit" type="submit">Login</button><br><br>

    <div class="login-link">
        <a style="color:white;" href="forgot.php">Forgot Password?</a>
    </div><br>

    <div class="login-link">
        <a style="color:white;" href="{{route('register')}}">Not a member? Register Here</a>
    </div>
</form>

<!-- Footer -->
<footer>
    <p style="font-size: 10px;"> &copy; 2024 CozyWash. All rights reserved.</p>
</footer>
</body>
</html>

@if(session('error'))
    <script>
        alert('{{ session('error') }}');
    </script>
@endif
<script src="{{asset('js/login.js')}}"></script>
</body>
</html>