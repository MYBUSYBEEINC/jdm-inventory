<!doctype html>
<html lang="en" style="scroll-behavior: smooth;">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="{{asset('css/lux.css')}}">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/toastr.css')}}">
    <link rel="stylesheet" href="{{asset('css/prettycheckbox.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.3.92/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="{{asset('css/jquerytiptop.css')}}">
    <link rel="stylesheet" href="{{asset('src/jquery.exzoom.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/css/style.css')}}">

    <script src="{{asset('js/jquery-1.12.4.min.js')}}" ></script>
    <script src="{{asset('js/imagesload.min.js')}}"></script>
    <script src="{{asset('src/jquery.exzoom.js')}}"></script>
    <script src="https://kit.fontawesome.com/451e0261bd.js" crossorigin="anonymous"></script>
    


    <title>@yield('title')</title>
    <link rel="icon" href="http://www.jdmcomputer.com/wp-content/uploads/2016/01/fav-icon.png" type="image/png">
</head>

<body>
    @include('partials.nav')
    @yield('banner')
    <div class="container">
        @yield('content')
    </div>
    @include('partials.footer')



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script src="{{asset('js/sweetalert.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    @yield('scripts')
    <script>
        toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    @if (Session:: has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif

    $(document).ready(function(){
        @if(Session::has('purchase'))
        swal("Great!", "You have successfully purchased products!", "success", {
            timer: 5000,
        });
        @elseif(Session::has('wishlist'))
        swal("Nice!", "Product added to wishlist!", "success", {
            timer: 3000,
        });
        @elseif(Session::has('deleteWishlist'))
        swal("Nice!", "Product removed from wishlist!", "success", {
            timer: 3000,
        });
        @endif
    });

    $(document).ready(function() {
        $("body").tooltip({ selector: '[data-toggle=tooltip]' });
    });
    </script>
</body>
</html>