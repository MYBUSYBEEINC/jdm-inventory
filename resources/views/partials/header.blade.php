<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 text-center text-lg-left">
                <!-- logo -->
                <a href="./index.html" class="site-logo">
                    <img src="img/logo.png" alt="">
                </a>
            </div>
            <div class="col-xl-6 col-lg-5">
                <form class="header-search-form">
                    <input type="text" placeholder="Search">
                    <button><i class="flaticon-search"></i></button>
                </form>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="user-panel">
                    <div class="up-item">
                        <i class="flaticon-profile"></i>
                        <a href="#">Sign</a> In or <a href="#">Create Account</a>
                    </div>
                    <div class="up-item">
                        <div class="shopping-card">
                            <i class="flaticon-bag"></i>
                            <span>0</span>
                        </div>
                        <a href="#">Shopping Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="main-navbar">
    <div class="container">
        <!-- menu -->
        <ul class="main-menu">
            <li><a href="$">Home</a></li>
            <li><a href="#">Processors</a>
                <ul class="sub-menu">
                    @foreach ($processors as $processor)
                        <li><a href="#">{{ $processor->subcategory_name }}</a></li>
                    @endforeach
                </ul>
            </li>
            <li><a href="#">Motherboards
                <span class="new">New</span>
            </a>
                <ul class="sub-menu">
                    <li><a href="#">Sneakers</a></li>
                </ul>
            </li>
            <li><a href="#">Graphics Card</a>
                <ul class="sub-menu">
                    <li><a href="#">Sneakers</a></li>
                </ul>
            </li>
            <li><a href="#">Casing & PSU</a>
                <ul class="sub-menu">
                    <li><a href="#">Product Page</a></li>
                </ul>
            </li>
            <li><a href="#">Monitors</a></li>
            <li><a href="#">Other Components</a></li>
            <li><a href="#">Peripherals</a></li>
        </ul>
    </div>
</nav>