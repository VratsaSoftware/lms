<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page Not Found</title>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="{{asset('/images/vso-png.png')}}" />
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('/css/404.css')}}">
    <!-- JQuery -->
    <script type="text/javascript" src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{asset('/js/404.js')}}"></script>
</head>
<body>
<div id="wrap">
    <div id="wordsearch">
        <ul>
            <li>k</li>

            <li>v</li>

            <li>n</li>

            <li>z</li>

            <li>i</li>

            <li>x</li>

            <li>m</li>

            <li>e</li>

            <li>t</li>

            <li>a</li>

            <li>x</li>

            <li>l</li>

            <li class="one">4</li>

            <li class="two">0</li>

            <li class="three">4</li>

            <li>y</li>

            <li>y</li>

            <li>w</li>

            <li>v</li>

            <li>b</li>

            <li>c</li>

            <li>v</li>

            <li>d</li>

            <li>y</li>

            <li>p</li>

            <li>a</li>

            <li class="four">p</li>

            <li class="five">a</li>

            <li class="six">g</li>

            <li class="seven">e</li>

            <li>v</li>

            <li>j</li>

            <li>a</li>

            <li class="eight">n</li>

            <li class="nine">o</li>

            <li class="ten">t</li>

            <li>s</li>

            <li>x</li>

            <li>a</li>

            <li>w</li>

            <li>v</li>

            <li>x</li>

            <li>e</li>

            <li>p</li>

            <li>c</li>

            <li>f</li>

            <li>h</li>

            <li>q</li>

            <li>e</li>

            <li class="eleven">f</li>

            <li class="twelve">o</li>

            <li class="thirteen">u</li>

            <li class="fourteen">n</li>

            <li class="fifteen">d</li>

            <li>s</li>

            <li>w</li>

            <li>q</li>

            <li>v</li>

            <li>o</li>

            <li>s</li>

            <li>m</li>

            <li>v</li>

            <li>f</li>

            <li>u</li>
        </ul>
    </div>

    <div id="main-content">
        @if(Cookie::get('locale') !== 'bg' || is_null(Cookie::get('locale')))
            <h1>We couldn't find what you were looking for.</h1>

            <p>Unfortunately the page you were looking for could not be found. It may be
                temporarily unavailable, moved or no longer exist.</p>

            <p>Check the URL you entered for any mistakes and try again. Alternatively, search
                for whatever is missing or take a look around the rest of our site.</p>

            <div id="navigation">
                    <a href="{{route('home')}}">Home</a>

                    <a href="{{route('mission')}}">Mission</a>
                    <a href="{{route('about')}}">Team</a>
                    <a href="{{route('year_reports')}}">Anual Reports</a>
                    <a href="{{route('contacts')}}">Contacts</a>

                    <a href="{{route('programmingCourses')}}">Programming</a>
                    <a href="{{route('digitalMarketing')}}">Digital Marketing</a>
                    <a href="http://gnezdoto.vratsasoftware.com/" target=" _blank">The Nest</a>
            </div>
        @else
            <h1>За съжаление не можем да намерим страницата</h1>

            <p>Може временно да я няма, или да е преместена на друг адрес</p>

            <p>Проверете отново адреса който се опитвате да достъпите, или посетете някоя от страниците ни по-долу:</p>

            <div id="navigation">
                <a href="{{route('home')}}">Начало</a>

                <a href="{{route('mission')}}">Мисия</a>
                <a href="{{route('about')}}">Екип</a>
                <a href="{{route('year_reports')}}">Годишни отчети</a>
                <a href="{{route('contacts')}}">Контакти</a>

                <a href="{{route('programmingCourses')}}">Програмиране</a>
                <a href="{{route('digitalMarketing')}}">Дигитален Маркетинг</a>
                <a href="http://gnezdoto.vratsasoftware.com/" target=" _blank">Гнездото</a>
            </div>
        @endif
    </div>
</div>

    <div id="footer">
        Vratsa Software &copy; {{\Carbon\Carbon::now()->format('Y')}}
    </div>
</body>
</html>