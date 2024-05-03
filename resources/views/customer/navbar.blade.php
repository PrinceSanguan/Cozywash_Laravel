<!--Navigation Bar-->
<div class="navbar">
  <nav class="nav">
      
      <div class="nav-menu">
          <ul>
            <img src="{{asset('image/fabicon.png')}}" style="width: 30px; width: 30px; margin-top: 30px; 
            margin-bottom: 30px; margin-left: 5px; margin-right: 50px;">

          <div class="nav-link">
              <ul>
              <li><a href="{{route('customer.home')}}" class="link">Home</a></li>
              <li><a href="{{route('customer.services')}}" class="link">Services</a></li>
              <li><a href="{{route('customer.about')}}" class="link">About Us</a></li>
              <li><a href="{{route('customer.receipt')}}" class="link">Receipts</a></li>
              <li><a href="{{route('customer.loyalty')}}" class="link">CozyPoints</a></li>

                  <li id="logout"><a href="{{route('logout')}}" class="link">Logout</a></li> 
                  <li id="prof"><a href="{{route('customer.profile')}}" class="link"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/></svg></a></li>   
              </ul>
          </div>
      </div>
  </nav>
</div>
<!--End-->