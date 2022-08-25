<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta name="description" content="">
<meta name="author" content="">
<title>@yield('title')</title>

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- favicon -->
@if (config('consts.LOGO') == 'vsc')
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicons/vsc.png') }}" />
@elseif (config('consts.LOGO') == 'digitalmontana')
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicons/digitalmontana.png') }}" />
@elseif (config('consts.LOGO') == 'digitalsmoliyan')
    <link rel="shortcut icon" type="image/png" href="{{ asset('favicons/digitalsmolyan.png') }}" />
@elseif (config('consts.LOGO') == 'digitalrazgrad')
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/digitalrazgrad-transparent.png') }}" />
@elseif (config('consts.LOGO') == 'digitaltargovishte')
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/digitaltargovishte-transparent.png') }}" />
@endif

@stack('head')
