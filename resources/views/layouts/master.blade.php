<!DOCTYPE html>
<html>

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>JDM - Techno Computer Center</title>

    <!-- Favicons -->

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
    <link href={{asset("css/margin.css")}} rel="stylesheet">
    <!--external css-->

    <link rel="stylesheet" type="text/css" href={{asset("dash/zabuto_calendar.css")}}>
    <link rel="stylesheet" type="text/css" href={{asset("dash/jquery.gritter.css")}} />
    <!-- Custom styles for this template -->
    <link href={{asset("dash/style.css")}} rel="stylesheet">
    <link href={{asset("dash/style-responsive.css")}} rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src={{asset("dash/Chart.js")}}></script>
    <script src={{asset("js/popper.min.js")}}></script>

</head>

<body>
    <section id="container">
      <!-- **********************************************************************************************************************************************************
          TOP BAR CONTENT & NOTIFICATIONS
          *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
        <div class="sidebar-toggle-box">
          <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
        </div>
        <!--logo start-->
        <a href="" class="logo"><b>JDM<span> INVENTORY</span></b></a>
        <!--logo end-->
        <div class="nav notify-row" id="top_menu">
          <!--  notification start -->
          <ul class="nav top-menu">
            <!-- settings start -->
            <li class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                <i class="fa fa-tasks"></i>
                <span class="badge bg-theme">4</span>
                </a>
              <ul class="dropdown-menu extended tasks-bar">
                <div class="notify-arrow notify-arrow-green"></div>
                <li>
                  <p class="green">You have 4 pending tasks</p>
                </li>
                <li>
                  <a href="index.html#">
                    <div class="task-info">
                      <div class="desc">Dashio Admin Panel</div>
                      <div class="percent">40%</div>
                    </div>
                    <div class="progress progress-striped">
                      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                        <span class="sr-only">40% Complete (success)</span>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="index.html#">
                    <div class="task-info">
                      <div class="desc">Database Update</div>
                      <div class="percent">60%</div>
                    </div>
                    <div class="progress progress-striped">
                      <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                        <span class="sr-only">60% Complete (warning)</span>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="index.html#">
                    <div class="task-info">
                      <div class="desc">Product Development</div>
                      <div class="percent">80%</div>
                    </div>
                    <div class="progress progress-striped">
                      <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                        <span class="sr-only">80% Complete</span>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="index.html#">
                    <div class="task-info">
                      <div class="desc">Payments Sent</div>
                      <div class="percent">70%</div>
                    </div>
                    <div class="progress progress-striped">
                      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                        <span class="sr-only">70% Complete (Important)</span>
                      </div>
                    </div>
                  </a>
                </li>
                <li class="external">
                  <a href="#">See All Tasks</a>
                </li>
              </ul>
            </li>
            <!-- settings end -->
            <!-- inbox dropdown start-->
            <li id="header_inbox_bar" class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                <i class="fa fa-envelope-o"></i>
                <span class="badge bg-theme">5</span>
                </a>
              <ul class="dropdown-menu extended inbox">
                <div class="notify-arrow notify-arrow-green"></div>
                <li>
                  <p class="green">You have 5 new messages</p>
                </li>
                <li>
                  <a href="index.html#">
                    <span class="photo"><img alt="avatar" src="img/ui-zac.jpg"></span>
                    <span class="subject">
                    <span class="from">Zac Snider</span>
                    <span class="time">Just now</span>
                    </span>
                    <span class="message">
                    Hi mate, how is everything?
                    </span>
                    </a>
                </li>
                <li>
                  <a href="index.html#">
                    <span class="photo"><img alt="avatar" src="img/ui-divya.jpg"></span>
                    <span class="subject">
                    <span class="from">Divya Manian</span>
                    <span class="time">40 mins.</span>
                    </span>
                    <span class="message">
                    Hi, I need your help with this.
                    </span>
                    </a>
                </li>
                <li>
                  <a href="index.html#">
                    <span class="photo"><img alt="avatar" src="img/ui-danro.jpg"></span>
                    <span class="subject">
                    <span class="from">Dan Rogers</span>
                    <span class="time">2 hrs.</span>
                    </span>
                    <span class="message">
                    Love your new Dashboard.
                    </span>
                    </a>
                </li>
                <li>
                  <a href="index.html#">
                    <span class="photo"><img alt="avatar" src="img/ui-sherman.jpg"></span>
                    <span class="subject">
                    <span class="from">Dj Sherman</span>
                    <span class="time">4 hrs.</span>
                    </span>
                    <span class="message">
                    Please, answer asap.
                    </span>
                    </a>
                </li>
                <li>
                  <a href="index.html#">See all messages</a>
                </li>
              </ul>
            </li>
            <!-- inbox dropdown end -->
            <!-- notification dropdown start-->
            <li id="header_notification_bar" class="dropdown">
              <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                <i class="fa fa-bell-o"></i>
                <span class="badge bg-warning">7</span>
                </a>
              <ul class="dropdown-menu extended notification">
                <div class="notify-arrow notify-arrow-yellow"></div>
                <li>
                  <p class="yellow">You have 7 new notifications</p>
                </li>
                <li>
                  <a href="index.html#">
                    <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                    Server Overloaded.
                    <span class="small italic">4 mins.</span>
                    </a>
                </li>
                <li>
                  <a href="index.html#">
                    <span class="label label-warning"><i class="fa fa-bell"></i></span>
                    Memory #2 Not Responding.
                    <span class="small italic">30 mins.</span>
                    </a>
                </li>
                <li>
                  <a href="index.html#">
                    <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                    Disk Space Reached 85%.
                    <span class="small italic">2 hrs.</span>
                    </a>
                </li>
                <li>
                  <a href="index.html#">
                    <span class="label label-success"><i class="fa fa-plus"></i></span>
                    New User Registered.
                    <span class="small italic">3 hrs.</span>
                    </a>
                </li>
                <li>
                  <a href="index.html#">See all notifications</a>
                </li>
              </ul>
            </li>
            <!-- notification dropdown end -->
          </ul>
          <!--  notification end -->
        </div>
          <ul class="nav pull-right top-menu">
            <li><a class="logout" href="{{ url('logout') }}">Logout</a></li>
          </ul>
      </header>
      <!--header end-->
      <!-- **********************************************************************************************************************************************************
          MAIN SIDEBAR MENU
          *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
        <div id="sidebar" class="nav-collapse ">
          <!-- sidebar menu start-->
          <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="{{route('home')}}"><img src="" class="img-circle" width="80"></a></p>
            <h5 class="centered">{{Auth::user()->name}}</h5>
            <li class="mt">
              <a class="nav-item {{ request()->is('/') ? 'active' : '' }}" href="{{route('home')}}">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
                </a>
            </li>
            <li>
              <a class="nav-item {{ request()->is('product') ? 'active' : '' }}" href="{{route('product')}}">
                <i class="fa fa-truck"></i>
                <span>Product Masterfile</span>
                </a>
            </li>
            <li>
              <a class="nav-item {{ request()->is('pricelist') ? 'active' : '' }}" href="{{route('pricelist')}}">
                <i class="fa fa-tags"></i>
                <span>Master Pricelist</span>
                </a>
            </li>
            <li class="sub-menu">
              <a class="{{ request()->is('product/*') ? 'active' : '' }}" href="javascript:;">
                <i class="fa fa-desktop"></i>
                <span>Masterfiles</span>
                </a>
              <ul class="sub">
                <li class="{{ request()->is('product/category') ? 'active' : '' }}"><a href="{{route('category')}}">Category Masterfile</a></li>
                <li class="{{ request()->is('product/brand') ? 'active' : '' }}"><a href="{{route('brand')}}">Brand Masterfile</a></li>
                <li class="{{ request()->is('product/unit') ? 'active' : '' }}"><a href="{{route('unit')}}">Unit Masterfile</a></li>
                <li class="{{ request()->is('product/color') ? 'active' : '' }}"><a href="{{route('color')}}">Color Masterfile</a></li>
                <li class="{{ request()->is('product/classification') ? 'active' : '' }}"><a href="{{route('classification')}}">Class Masterfile</a></li>
                <li class="{{ request()->is('product/subcategory') ? 'active' : '' }}"><a href="{{route('subcategory')}}">Sub Category Masterfile</a></li>
                <li class="{{ request()->is('product/subsubcategory') ? 'active' : '' }}"><a href="{{route('subsubcategory')}}">Sub Sub Category Masterfile</a></li>
                <li class="{{ request()->is('product/branch') ? 'active' : '' }}"><a href="{{route('branch')}}">Branch Masterfile</a></li>
                <li class="{{ request()->is('product/supplier') ? 'active' : '' }}"><a href="{{route('supplier')}}">Supplier Masterfile</a></li>
                <li class="{{ request()->is('product/term') ? 'active' : '' }}"><a href="{{route('term')}}">Term Masterfile</a></li>
                <li class="{{ request()->is('product/customer') ? 'active' : '' }}"><a href="{{route('customer')}}">Customer Masterfile</a></li>
                <li class="{{ request()->is('product/employee') ? 'active' : '' }}"><a href="#">Employee Masterfile</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a class="{{ request()->is('purchase/*', 'admin/*') ? 'active' : '' }}" href="javascript:;">
                <i class="fa fa-money"></i>
                <span>Transaction</span>
                </a>
              <ul class="sub">
                <li class="{{ request()->is('purchase') ? 'active' : '' }}"><a href="{{route('purchase')}}">Purchase Order</a></li>
                <li class="{{ request()->is('admin/orders') ? 'active' : '' }}"><a href="{{route('admin.orders')}}">Orders</a></li>
              </ul>
            </li>
          </ul>
          <!-- sidebar menu end-->
        </div>
      </aside>
      <!--sidebar end-->
      <!-- **********************************************************************************************************************************************************
          MAIN CONTENT
          *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
            @yield('content')
          </section>
      </section>
      <!--main content end-->
      <!--footer start-->
      <!--footer end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->

    <script src="{{asset('dash/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script class="include" type="text/javascript" src="{{asset('dash/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{asset('dash/jquery.scrollTo.min.js')}}"></script>
    <script src="{{asset('js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/jquery.sparkline.js')}}"></script>
    <!--common script for all pages-->
    <script src="{{asset('js/common-scripts.js')}}"></script>
    <script type="text/javascript" src="{{asset('dash/jquery.gritter.js')}}"></script>
    <script type="text/javascript" src="{{asset('dash/gritter-conf.js')}}"></script>
    <!--script for this page-->
    <script src="{{asset('dash/sparkline-chart.js')}}"></script>
    <script src="{{asset('dash/zabuto_calendar.js')}}"></script>
    
  </body>

</html>