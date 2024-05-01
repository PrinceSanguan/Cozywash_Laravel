<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CozyWash</title>
<link rel="stylesheet" href="{{asset('css/services.css')}}">
<link rel="icon" href="{{asset('image/fabicon.png')}}" type="fabicon.png">
</head>
<body>
 
  @include('navbar')

    <!--Cotainer1-->
    <div class="container1">
        <div class="row1">
        <h1 style="color:#DC5A8E">Why Choose CozyWash?</h1>
        <h3 style="color:#954B69">At Cozy Wash, we pride ourselves on being seasoned experts in the laundry industry, offering top-notch service to our customers. In today's fast-paced world, finding time to juggle daily tasks and family commitments can be a struggle. That's why we established our business in October 2023 with a clear mission: change </h3>
        </div>
    </div>
    <!--End-->

    <!--Cotainer2-->
    <div class="container2">
      <h1 style="color:#DC5A8E;">OUR SERVICES</h1>
      <div class="column" style="background-color:#F599C4">
        <img src="image/full.png">
        <h4 style="color:white">Full Service</h4>
        <p style="color:white">Our staff will handle the washing, drying, and folding of your laundry according to your preferences.</p>
      </div>
    </div>

      <div class="column" style="background-color:#F599C4">
        <img src="{{asset('image/self.png')}}">
        <h4 style="color:white">Self-Service</h4>
        <p style="color:white">Customers can utilize our self-service laundry facilities, including washing machines and dryers, to launder their own clothes.</p>
      </div>

      <div class="column" style="background-color:#F599C4">
        <img src="{{asset('image/pickupdel.png')}}">
        <h4 style="color:white">Self-Pick-Up/Delivery<br><p>(Full Service Only)</p></h2>
        <p style="color:white">We offer pickup and delivery services for your laundry, providing convenience and flexibility to our customers.</p>
      </div>
</div>
    <!--End-->

<!--Footer-->
<footer>
    <p style="font-size: 10px;"> &copy; 2024 CozyWash. All rights reserved.</p>
</footer>

<script src="{{asset('js/services.js')}}"></script>
</body>
</html>
