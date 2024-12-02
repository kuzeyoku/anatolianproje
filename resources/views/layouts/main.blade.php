<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {!! SEO::generate() !!}
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset("assets/images/favicons/apple-touch-icon.png")}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset("assets/images/favicons/favicon-32x32.png")}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset("assets/images/favicons/favicon-16x16.png")}}">
    <link rel="manifest" href="{{asset("assets/images/favicons/site.webmanifest")}}">
    <link rel="stylesheet" href="{{asset("assets/vendors/bootstrap/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendors/animate/animate.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendors/animate/custom-animate.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendors/fontawesome/css/all.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendors/jarallax/jarallax.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendors/odometer/odometer.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendors/swiper/swiper.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendors/bizgrow-icons/style.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendors/owl-carousel/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendors/owl-carousel/owl.theme.default.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendors/bootstrap-select/css/bootstrap-select.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendors/ion.rangeSlider/css/ion.rangeSlider.min.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendors/jquery-ui/jquery-ui.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendors/timepicker/timePicker.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/bizgrow.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/bizgrow-responsive.css")}}">
</head>

<body class="custom-cursor">
<div class="custom-cursor__cursor"></div>
<div class="custom-cursor__cursor-two"></div>
<div class="preloader">
    <div class="preloader__image"></div>
</div>
@include("layouts.sidebar")

<div class="page-wrapper">

    @include("layouts.header")

    @yield("content")

    @include("layouts.footer")

</div>

@include("layouts.mobile-nav")

{{--<div class="search-popup">
    <div class="search-popup__overlay search-toggler"></div>
    <div class="search-popup__content">
        <form action="#">
            <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
            <input type="text" id="search" placeholder="Search Here...">
            <button type="submit" aria-label="search submit" class="thm-btn">
                <i class="icon-search-interface-symbol"></i>
            </button>
        </form>
    </div>
</div>--}}

<a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="icon-right-arrow"></i></a>

<script src="{{asset("assets/vendors/jquery/jquery-3.6.0.min.js")}}"></script>
<script src="{{asset("assets/vendors/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("assets/vendors/jarallax/jarallax.min.js")}}"></script>
<script src="{{asset("assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js")}}"></script>
<script src="{{asset("assets/vendors/jquery-appear/jquery.appear.min.js")}}"></script>
<script src="{{asset("assets/vendors/jquery-circle-progress/jquery.circle-progress.min.js")}}"></script>
<script src="{{asset("assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js")}}"></script>
<script src="{{asset("assets/vendors/jquery-validate/jquery.validate.min.js")}}"></script>
<script src="{{asset("assets/vendors/odometer/odometer.min.js")}}"></script>
<script src="{{asset("assets/vendors/swiper/swiper.min.js")}}"></script>
<script src="{{asset("assets/vendors/wnumb/wNumb.min.js")}}"></script>
<script src="{{asset("assets/vendors/wow/wow.js")}}"></script>
<script src="{{asset("assets/vendors/isotope/isotope.js")}}"></script>
<script src="{{asset("assets/vendors/owl-carousel/owl.carousel.min.js")}}"></script>
<script src="{{asset("assets/vendors/bootstrap-select/js/bootstrap-select.min.js")}}"></script>
<script src="{{asset("assets/vendors/jquery-ui/jquery-ui.js")}}"></script>
<script src="{{asset("assets/vendors/timepicker/timePicker.js")}}"></script>
<script src="{{asset("assets/vendors/circleType/jquery.circleType.js")}}"></script>
<script src="{{asset("assets/vendors/circleType/jquery.lettering.min.js")}}"></script>
<script src="{{asset("assets/vendors/ion.rangeSlider/js/ion.rangeSlider.min.js")}}"></script>
<script src="{{asset("assets/vendors/sidebar-content/jquery-sidebar-content.js")}}"></script>
<script src="{{asset("assets/vendors/marquee/marquee.min.js")}}"></script>
<script src="{{asset("assets/js/bizgrow.js")}}"></script>
</body>

</html>
