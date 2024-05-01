<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration Form</title>
<link rel="stylesheet" href="{{asset('css/register.css')}}">

<link rel="icon" href="{{asset('image/fabicon.png')}}" type="fabicon.png">

</head>
<body>
  
@include('navbar')

<form id="registrationForm" method="post" action="{{route('register.form')}}">
    @csrf
    <h2 style="color: white;">Register to CozyWash!</h2>

    @if ($errors->any())
        <div class="text-danger">{{ $errors->first() }}</div>
    @endif
  
    <input class="form-control" type="text" name="firstName" placeholder="First Name" required>
    <input class="form-control" type="text" name="lastName" placeholder="Last Name" required>
    <input class="form-control" type="text" name="email" placeholder="Email Address" required>
    <input type="text" class="form-control" name="contact" placeholder="Contact Number" required>
    <input type="password" class="form-control" name="password" placeholder="Password">
    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
    <textarea class="form-control" id="exampleTextarea" name="address" rows="3" placeholder="Address"></textarea><br>

    <input type="checkbox" required>
    <label style="color:white;" for="termsCheckbox">I agree with the <span style="color:#ECB5CB" class="terms-link" id="termsLink">Terms of Services</span></label><br><br>
    <p class="terms-error" id="termsError" style="display: none;">Please accept the terms of services</p>

    <button id="registerNow" type="submit" value="Register" class="btn theme-btn">Register</button><br><br>
    <div class="login-link">
        <a style="color:white;" href="{{route('login')}}">Already have an account?</a>
    </div>
</form>


<!-- Terms and Conditions-->
<div id="termsModal" style="display: none;">
    <div style="background: linear-gradient(rgba(214, 104, 148, 0.9), rgba(144, 111, 162, 0.9));  position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); max-width: 80%; max-height: 80%; overflow: auto;">
        <h2 style="margin-left: 20px; text-align:center;">Terms of Services</h2>
        <p style="text-align: center; margin-top: 50px; margin-left: 80px; margin-right: 80px;"> <b>Welcome to Fresh N' Comfy Laundry Hub!<br> 
            Before using our services, please read these terms carefully.</b><br><br>
        </p>
        <p style="text-align: justify; margin-top: 20px; margin-left: 30px; margin-right: 30px;"><b>Acceptance of Terms</b><br>
        By accessing or using any service provided by Fresh N' Comfy Laundry Hub, you agree to be bound by these Terms of Service. If you do not agree to these terms, please refrain from using our services.<br><br>

        <b>Fresh N' Comfy Laundry Hub offers the following services:</b><br><br>

           <b>◦  Self-Service Laundry:</b> Customers can use our self-service laundry facilities to wash, dry, and fold their own laundry.<br><br>
           <b>◦  Full-Service Laundry:</b> Our team will handle the entire laundry process for customers, including washing, drying, folding, and packaging.<br><br>
           <b>◦  Self Pick-Up or Delivery Service:</b> Customers have the option to drop off their laundry for cleaning and pick it up at a later time, or they can opt for our convenient delivery service where we drop off their laundry at their specified location.<br><br>

        <b>Service Fees</b><br>
        Fees for Fresh N' Comfy Laundry Hub services are outlined on our website and may vary based on the type and quantity of laundry, as well as any additional requested services. Payment is due at the time services are rendered, unless otherwise agreed upon.<br><br>

        <b>Customer Responsibilities</b><br>
        Customers using our self-service facilities are responsible for properly operating the equipment and adhering to posted guidelines. For full-service and self-pick-up/delivery services, customers are responsible for providing accurate information regarding their laundry preferences and ensuring that their laundry is ready for pick-up at the agreed-upon time.<br><br>

        <b>Liability</b><br>
        While Fresh N' Comfy Laundry Hub takes every precaution to handle laundry with care, we are not liable for any damage or loss of items during the laundering process. Customers are encouraged to check their laundry before leaving the premises or upon delivery and report any issues promptly.<br><br>

        <b>Use of Personal Information</b><br>
        We may collect personal information from customers to provide our services. This information will be handled following our Privacy Policy.<br><br>

        <b>Modifications to Services or Terms</b><br>
        Fresh N' Comfy Laundry Hub reserves the right to modify or discontinue any service, temporarily or permanently, with or without notice. We also reserve the right to update these Terms of Service at any time. Continued use of our services after any such changes constitutes acceptance of the updated terms.<br><br>
        </p>
        <button style="margin-left: 50px;" id="closeTermsModal">Close</button>
    </div>
</div>

<!--Footer-->
<footer>
    <p style="font-size: 10px;"> &copy; 2024 CozyWash. All rights reserved.</p>
</footer>


<script>
    document.getElementById("termsLink").addEventListener("click", function() {
        document.getElementById("termsModal").style.display = "block";
    });

    document.getElementById("closeTermsModal").addEventListener("click", function() {
        document.getElementById("termsModal").style.display = "none";
    });</script>

</body>
</html>
