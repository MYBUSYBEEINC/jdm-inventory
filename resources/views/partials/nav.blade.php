<div class="container-block fixed-top">
  <nav class="navbar navbar-expand-md navbar-expand-lg navbar-dark bg-info">
    <h1 class="logo logo-transition ml-5">
      <a href="{{route('shop')}}" title="JDM Techno Computer Center - " rel="home"> 
        <img class="navbar-brand img-responsive img-fluid w-50 h-75" src="//www.jdmcomputer.com/wp-content/uploads/2016/01/jlogo2.png" alt="JDM Techno Computer Center">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </h1>
      
  
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Processors
              </a>
              <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                @foreach($processors as $processor)
                 <a class="dropdown-item" href="">{{ $processor->subcategory_name }}</a>                    
                @endforeach
              </div>
          </li>
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Motherboards
              </a>
              <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                @foreach($processors as $processor)
                 <a class="dropdown-item" href="">{{ $processor->subcategory_name }}</a>                    
                @endforeach
              </div>
          </li>
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              RAM
              </a>
              <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                @foreach ($rams as $ram)
                  <a class="dropdown-item" href="">{{ $ram->subcategory_name }}</a>
                @endforeach
              </div>
          </li>
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Other Components
              </a>
              <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="">My orders</a>
              </div>
          </li>
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Peripherals
              </a>
              <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="">My orders</a>
              </div>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{route('cart')}}"> <i class="fas fa-shopping-cart fa-lg fa-fw"></i> My Cart 
              @if(Session::has('cart'))
              <span class="badge badge-light">
                {{count(Session::get('cart'))}}
              </span>              
              @endif
            </a> 
          </li>
          @guest
          <li class="nav-item active">
            <a class="nav-link" href="{{route('loginlog')}}">Login</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{route('register')}}">Register</a>
          </li>
          @endguest
          @auth
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user fa-lg fa-fw"></i> {{Auth::User()->name}}
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              @if(Auth::user()->is_admin == 0)
                <a class="dropdown-item" href="{{route('getOrders')}}">My orders</a>
                <a class="dropdown-item" href="{{route('getWishlists')}}">My Wishlists</a>
              @endif
              @if(Auth::user()->is_admin == 1)
                <a class="dropdown-item" href="{{route('admin.users')}}">Manage Users</a>
                <a class="dropdown-item" href="{{route('product')}}">Manage Products</a>
                <a class="dropdown-item" href="{{route('admin.orders')}}">Manage Orders</a>
              @endif
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
            </div>
          </li>
          @endauth
        </ul>
        
      </div>
    </nav>
</div>