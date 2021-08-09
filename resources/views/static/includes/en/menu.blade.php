<nav id="main-nav" class="col-md-8">
    <ul class="list-inline main-nav-list">
        <li class="nav-item dropdown-about">
            <a href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item dropdown-about">
            <a href="#">About</a>
            <div class="dropdown-content-about">
                <a href="{{route('mission')}}">Mission</a>
                <a href="{{route('about')}}">Team</a>
                <a href="{{route('year_reports')}}">Annual reports</a>
                <a href="{{route('contacts')}}">Contacts</a>
            </div>
        </li>
        <li class="nav-item dropdown-el">
            <a href="#">Courses</a>
            <div class="dropdown-content">
                <a href="{{route('programmingCourses')}}">Programming</a>
                <a href="{{route('digitalMarketing')}}">Digital Marketing</a>
            </div>
        </li>
        <li>
            <a href="http://gnezdoto.vratsasoftware.com/" target=" _blank">The Nest</a>
        </li>
    </ul>
</nav>
