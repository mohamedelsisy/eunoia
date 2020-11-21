<!doctype html>
<html lang="zxx">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap Min CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/bootstrap.min.css')  }}">
    <!-- Animate Min CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/animate.min.css')  }}">
    <!-- Font Awesome Min CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/fontawesome.min.css')  }}">
    <!-- Owl Carousel Min CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/owl.carousel.min.css')  }}">
    <!-- niceSelect CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/nice-select.css')  }}">
    <!-- Magnific Popup Min CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/magnific-popup.min.css')  }}">
    <!-- MeanMenu CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/meanmenu.css')  }}">
    <!-- ION rangeSlider Min CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/ion.rangeSlider.min.css')  }}">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/slick.css')  }}">
    <!-- Slick Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/slick-theme.css')  }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/style.css')  }}">
    <!-- RTL CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/rtl.css')  }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/responsive.css')  }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/cairo.css')  }}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/custom.css')  }}">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>@yield('title', 'Eunoia')</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/site/img/logo.png')  }}">

</head>

<body>

@include('sweetalert::alert')


@include('site.includes.navbar-area')

@yield('content')

@include('site.includes.footer-area')

<div class="go-top">
    <i class="fas fa-arrow-up"></i>
    <i class="fas fa-arrow-up"></i>
</div>

<!-- JQuery Min Js -->
<script src="{{ asset('assets/site/js/jquery.min.js')  }}"></script>
<!-- Popper Min JS -->
<script src="{{ asset('assets/site/js/popper.min.js')  }}"></script>
<!-- Bootstrap Min Js -->
<script src="{{ asset('assets/site/js/bootstrap.min.js')  }}"></script>

<!-- Parallax Min JS -->
<script src="{{ asset('assets/site/js/parallax.min.js')  }}"></script>
<!-- Slick Min JS -->
<script src="{{ asset('assets/site/js/slick.js')  }}"></script>
<!-- Owl Carousel Min JS -->
<script src="{{ asset('assets/site/js/owl.carousel.min.js')  }}"></script>
<!-- Magnific Popup Min JS -->
<script src="{{ asset('assets/site/js/jquery.magnific-popup.min.js')  }}"></script>
<!-- niceSelect Min JS -->
<script src="{{ asset('assets/site/js/jquery.nice-select.min.js')  }}"></script>
<!-- MeanMenu JS -->
<script src="{{ asset('assets/site/js/jquery.meanmenu.js')  }}"></script>
<!-- ION rangeSlider Min JS  -->
<script src="{{ asset('assets/site/js/ion.rangeSlider.min.js')  }}"></script>
<!-- Form Validator Min JS -->
<script src="{{ asset('assets/site/js/form-validator.min.js')  }}"></script>
<!-- Contact Form Min JS -->
<script src="{{ asset('assets/site/js/contact-form-script.js')  }}"></script>
<!-- ajaxChimp Min JS -->
<script src="{{ asset('assets/site/js/jquery.ajaxchimp.min.js')  }}"></script>
<!-- Comero Map JS FILE -->
<script src="{{ asset('assets/site/js/comero-map.js')  }}"></script>
<!-- Main JS -->
<script src="{{ asset('assets/site/js/main.js')  }}"></script>

@yield('scripts')

</body>
</html>
