<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">

    <title>@yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="{{asset('/images/vso-png.png')}}" />

    <!-- facebook -->
    <meta property="og:url" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Враца Софтуер Общество" />
    <meta property="og:description" content="Развиваме дигитална индустрия във Враца" />
    <meta property="og:image" content="{{asset('/images/vso-logo-bg-original.png')}}" />
    <meta name="Description" content="Author: VSC 2018">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body style="opacity:0">
<!-- JQuery -->
<script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>

<div class="navbar col-md-12 d-flex flex-row flex-wrap text-right">
    <div class="col-md-3"></div>
    <div class="col-md-3 text-left menu-title">@yield('title')</div>
    <div class="col-md-6 text-right top-icons">
        @if(Auth::user())
            <a href="{{ url('profile') }}">Начало</a>
            <span class="badge-notify"></span>
        @endif
    </div>
</div>

@yield('content')
<script>
    $.ajaxPrefilter(function(options, originalOptions, jqXHR) {
        options.async = true;
    });
</script>
<script src="{{asset('/js/fixed-left-top-menu.js')}}"></script>
<script src="{{asset('/js/edit-showing-pencil.js')}}"></script>
<script src="{{asset('/js/slide-alerts.js')}}"></script>
<!-- //preview picture before saving -->
<script src="{{asset('/js/profile-picture-preview.js')}}" charset="utf-8" async></script>
</body>
<script type="text/javascript">
    $(function() {
        $('head').append('<link rel="stylesheet" href="{{asset('/css/bootstrap-grid.min.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/bootstrap.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/public_profile.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/personal_profile.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/personal_application_results.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/personal_events.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/lecturer_profile.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/create_course.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/create_level.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/lecturer_course_options.css')}}" />');
        $('head').append('<link rel="stylesheet" href="{{asset('/css/lecturer_courses.css')}}" />');
    });
</script>

<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/main.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
</html>
