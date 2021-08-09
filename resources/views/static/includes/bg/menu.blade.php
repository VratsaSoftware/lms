<nav id="main-nav" class="col-md-8">
    <ul class="list-inline main-nav-list">
        <li class="nav-item dropdown-about">
            <a href="{{route('home')}}">Начало</a>
        </li>
        <li class="nav-item dropdown-about">
            <a href="#">За нас</a>
            <div class="dropdown-content-about">
                <a href="{{route('mission')}}">Мисия</a>
                <a href="{{route('about')}}">Екип</a>
                <a href="{{route('year_reports')}}">Годишни Отчети</a>
                <a href="{{route('contacts')}}">Контакти</a>
            </div>
        </li>
        <li class="nav-item dropdown-el">
            <a href="#">Обучения</a>
            <div class="dropdown-content">
                <a href="{{route('programmingCourses')}}">Програмиране</a>
                <a href="{{route('digitalMarketing')}}">Дигитален Маркетинг</a>
            </div>
        </li>
        <li>
            <a href="http://gnezdoto.vratsasoftware.com/" target=" _blank">Гнездото</a>
        </li>
    </ul>
</nav>
