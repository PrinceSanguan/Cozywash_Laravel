<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CozyWash</title>
<link rel="stylesheet" href="{{asset('css/about.css')}}">

<link rel="icon" href="{{asset('image/fabicon.png')}}" type="fabicon.png">

</head>
<body>

  @include('navbar')

<div class="container">
<!--Container 1 & 2 About Us-->
    <div class="container1">
            <h1 style="color:#DC5A8E; text-align:center; margin-left:300px;">About Us</h1>
            <img src="image/about.png" style="width:800px;" "height: 500px;">
            <h3 style="color:#815164; text-align:center; width: 760px; height: 200px; margin-left: 20px;"> At CozyWash, we've introduced an innovative laundry experience that brings a fresh, modern atmosphere to our customers. Our goal is to help you save on expenses, time, and resources, including water and electricity, through the use of our reliable and efficient commercial-grade washers and dryers.</h3>
    </div>

    <div class="container2">
            <div class="column1" style="background-color:#F599C4;">
            <h4 id="hc1" style="font-size: 30px; color:#FFE9F2">Mission</h4>
            <p id="p1" style="color:#FFE9F2; padding-bottom: 20px; font-size: 22px">"To give the customers the best service in terms of cleanliness and fragrance of their clothes."</p>
            </div>

            <div class="column1" style="background-color:#FAD6E5;">
            <h4 id="hc1" style="font-size: 30px; color:#E37DAD;">Vision</h4>
        <p id="p1" style="color:#E37DAD; padding-bottom: 20px; font-size: 22px;">"To be able to cope up the fastest service to the customers. To be able to come up with more machines with added features."</p>
            </div>
    </div>
    <!--End-->

    <!--Container 3 & 4 Contact Us-->
    <div class="container3">
          <div class="column2" style="background-color:#F599C4;">
            <h4 id="hc2" style="font-size: 30px; color:#FFE9F2">Contact Us</h4>
            <p id="p2" style="color:#FFE9F2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
          <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/></svg> Fresh N' Comfy Laundry Hub</p>

        <p id="p2" style="color:#FFE9F2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
        </svg> 0995 406 3044</p>
          </div>

          <div class="column2" style="background-color:#FAD6E5;">
                <h4 id="hc2" style="font-size: 30px; color:#E37DAD; margin-left: 50px;">Where are we located?</h4>
            <p id="p2" style="color:#E37DAD;"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
          <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
          <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
        </svg> 202 Pio Valenzuela St. in Marulas, Valenzuela, Philippines</p>
          </div>
    </div>

        <div class="container4">
    <!--Google Maps-->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3859.621178825916!2d120.98657997510777!3d14.677426985818126!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b6a737f54dab%3A0x4a22cf189c55e493!2s202%20Pio%20Valenzuela%2C%20Manila%2C%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1711551033830!5m2!1sen!2sph" width="800" height="520" style="border-radius:10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    <!--End-->

<!--Footer-->
<footer>
    <p style="font-size: 10px;"> &copy; 2024 CozyWash. All rights reserved.</p>
</footer>

<script src="{{asset('js/about.js')}}"></script>
</body>
</html>
