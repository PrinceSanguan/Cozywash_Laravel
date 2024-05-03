<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Profile</title>
<link rel="stylesheet" href="{{asset('css/login_profile.css')}}">
<link rel="icon" href="{{asset('image/fabicon.png')}}" type="fabicon.png">

</head>
<body>
 
  @include('customer.navbar')
        
    <div class="container">
        <div class="column">
        <h1 style="color:#FFFFFF">User Profile</h1>

        <form id="profileForm" method="post" action="{{ route('customer.editProfile') }}">
          @csrf

          <label for="firstName">First Name</label><br>
          <input type="text" id="firstName" name="firstName" value="{{ $user->firstName }}" required><br>

          <label for="lastName">Last Name</label><br>
          <input type="text" id="lastName" name="lastName" value="{{ $user->lastName }}" required><br>

          <label for="email">Email</label><br>
          <input type="email" id="email" name="email" value="{{ $user->email }}" readonly><br>

          <label for="contact">Contact Number</label><br>
          <input type="text" id="contact" name="contact" value="{{ $user->contact }}" required><br>

          <label for="address">Address</label><br>
          <textarea class="form-control" id="address" name="address" rows="3" required>{{ $user->address }}</textarea><br>

          <button id="save" type="submit">Save</button>
      </form>

        </div>


        <div class="column1">
            <form id="changePasswordForm">
                <h2 style="color:#FFFFFF">Change Password</h2>
                <b><label for="currentPassword"></label></b><br>
                <input type="password" id="currentPassword" name="password" placeholder ="Current Password" required><br>
                <b><label for="newPassword"></label></b><br>
                <input type="password" id="newPassword" name="newPassword" placeholder ="New Password" required><br>
                <b><label for="confirmNewPassword"></label></b><br>
                <input type="password" id="confirmNewPassword" name="confirmnewPassword" placeholder ="Confirm New Password" required><br>
                <button id="change" type="submit">Change</button>
            </form>
        </div>
    </div>


<!--Footer-->
<footer>
    <p style="font-size: 10px;"> &copy; 2024 CozyWash. All rights reserved.</p>
</footer>

@if(session('success'))
    <script>
        alert('{{ session('success') }}');
    </script>
@endif
<script src="{{asset('js/login_profile.js')}}"></script>
</body>
</html>

