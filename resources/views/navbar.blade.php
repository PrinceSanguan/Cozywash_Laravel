<!--Navigation Bar-->
<div class="navbar">
  <nav class="nav">
      
      <div class="nav-menu">
          <ul>
            <img src="{{asset('image/fabicon.png')}}" style="width: 30px; width: 30px; margin-top: 30px; 
            margin-bottom: 30px; margin-left: 5px; margin-right: 50px;">

      <div class="nav-link">
          <ul>
              <li><a href="{{route('welcome')}}" class="link">Home</a></li>
              <li><a href="{{route('services')}}" class="link">Services</a></li>
              <li><a href="{{route('about')}}" class="link">About Us</a></li>
          </ul>
      </div>

              <div class="nav-button">
                  <a href="{{route('login')}}" style="color:white"><button class="btn" id="loginBtn">Sign In</button></a></li>
                  <a href="{{route('register')}}" style="color:white"><button class="btn" id="registerBtn">Register</button></a></li>
              </div>
          </ul>
      </div>
  </nav>
</div>
<!--End-->