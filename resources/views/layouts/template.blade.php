<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Fonts and Icons -->
    <link href="{{ asset('assets/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    @yield('head')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/tooltip.css') }}"/>

    @include('layouts.partials.head')

    @stack('head')
</head>
<body>
    @if (Auth::user())
        <div class="row g-0 p-lg-0 px-4 py-4 mt-lg-0 mt-2">
            <div class="col-xl-auto pe-xl-0 pe-lg-5">
                <div class="row g-0">
                    <!-- nav menu -->
                    @include('navigation-left-bar')
                    <!-- nav menu END -->

                    <!-- Content START -->
                    @yield('content')
                    <!-- Content END -->
                </div>
            </div>
        </div>
    @else
        @yield('content')
    @endif
    <!-- Bootstrap core JS Files -->
    @stack('scripts')
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/main.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
</body>
</html>
