<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <link href="{{asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>
<body>

    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
    <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>
</html>


{{-- Hero
-title
-desc
-link

Service
-icon
-title
-desc
-border-color
-icon-color
-bg-color

WhyUs
-image
-video

WhyUsItems one to many
-icon
-title
-desc

Feature
-title
-desc

FeatureItem
-image
-title
-desc

FeatureItemList
-content

soicalAccountType
-name
-link

soicalAccount
-icon
-type
-link

<a href={{$soical->type->link}} {{$soical->link}}
$soical->type->link = tel:
$soical->link = 7777777
tel:7777777
--}}