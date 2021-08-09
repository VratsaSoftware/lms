<div class="col-lg-auto position-relative">
    <nav class="slide navbar-expand-lg navbar-light bg-white fw-bold" id="mySidenav">
        <a class="navbar-brand d-lg-block d-none mx-auto" href="{{ asset('myProfile') }}">
            <img src="{{ asset('assets/img/logo.png') }}" alt="" class="logo">
        </a>
        <div class="row g-0 d-lg-none d-flex pb-4 align-items-center">
            <div class="col">
                <div class="row g-0 user-info justify-content-center">
                    <div class="col-auto">
                        @if(!isset(Auth::user()->picture) && Auth::user()->sex != 'male')
                            <img src="{{ asset('images/women-no-avatar.png') }}" alt="profile-pic" class="avatar">
                        @elseif(!isset(Auth::user()->picture) && Auth::user()->sex != 'female')
                            <img src="{{ asset('images/men-no-avatar.png') }}" alt="profile-pic" class="avatar">
                        @else
                            <img src="{{ asset('images/user-pics/'.Auth::user()->picture) }}" alt="profile-pic" class="avatar">
                        @endif
                    </div>
                    <div class="col align-self-center ps-2 ms-1">
                        <div class="user_name fw-bold d-block">
                            {{ Auth::user()->name }}
                        </div>
                        <div class="role text-xs text-warm-grey d-block">
                            @if (Auth::user()->cl_role_id == 1)
                                Админ
                            @elseif (Auth::user()->cl_role_id == 2)
                                Ученик
                            @else
                                Лектор
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-auto ms-auto">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <div class="pt-lg-5">
                <ul class="nav d-block col-12 pb-2">
                    <li class="nav-item align-items-center mb-lg-5">
                        <a href="{{ route('admin.applications') }}" class="d-flex align-items-center">
                            <span class="icon">
                                <img src="{{ asset('assets/img/Application.svg') }}" alt="">
                            </span>
                            <span class="slide-item text-navy-blue" style="font-size:16px;">Кандидатстване</span>
                        </a>
                    </li>
                    <li class="nav-item align-items-center mb-lg-5">
                        <!-- <div class="dropdown">
                            <a href="{{ route('course.create') }}" class="d-flex align-items-center dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="icon">
                                    <img src="{{ asset('assets/img/Courses.svg') }}" alt="">
                                </span>
                                <span class="slide-item text-navy-blue">
                                    Курсове
                                    <span>
                                        <img src="{{ asset('assets/img/arrow.svg') }}" alt="" class="ms-4">
                                    </span>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('course.create') }}">Добави</a>
                                <a class="dropdown-item" href="{{ route('all.courses') }}">Виж всички</a>
                            </div>
                        </div> -->
                        <a href="{{ route('all.courses') }}" class="d-flex align-items-center">
                            <span class="icon">
                                <img src="{{ asset('assets/img/Courses.svg') }}" alt="">
                            </span>
                            <span class="slide-item text-navy-blue" style="font-size:16px;">Курсове</span>
                        </a>
                    </li>
                    <li class="nav-item align-items-center mb-lg-5">
                        <div class="dropdown">
                            <a href="{{ route('admin.events') }}" class="d-flex align-items-center dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="icon">
                                    <img src="{{ asset('assets/img/Events.svg') }}">
                                </span>
                                <span class="slide-item text-navy-blue" style="font-size:16px;">
                                    Събития
                                    <img src="{{ asset('assets/img/arrow.svg') }}" class="ms-4">
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item align-items-center mb-lg-5">
                        <a href="{{route('polls.index')}}" class="d-flex align-items-center">
                            <span class="icon">
                                <img src="{{ asset('assets/img/Surveys.svg') }}">
                            </span>
                            <span class="slide-item text-navy-blue" style="font-size:16px;">
                                Анкети
                            </span>
                        </a>
                    </li>
                    <li class="nav-item align-items-center mb-lg-5">
                        <a href="{{ route('test.index') }}" class="d-flex align-items-center">
                            <span class="icon">
                                <img src="{{ asset('assets/img/Tests.svg') }}" alt="">
                            </span>
                            <span class="slide-item text-navy-blue" style="font-size:16px;">
                                Тестове
                            </span>
                        </a>
                    </li>
                </ul>
                <div class="row d-lg-flex d-none g-0 user-info py-lg-4 justify-content-center">
                    <div class="col-auto">
                        @if(!isset(Auth::user()->picture) && Auth::user()->sex != 'male')
                            <img src="{{ asset('images/women-no-avatar.png') }}" alt="profile-pic" class="avatar">
                        @elseif(!isset(Auth::user()->picture) && Auth::user()->sex != 'female')
                            <img src="{{ asset('images/men-no-avatar.png') }}" alt="profile-pic" class="avatar">
                        @else
                            <img src="{{ asset('images/user-pics/' . Auth::user()->picture) }}" alt="profile-pic" class="avatar">
                        @endif
                    </div>
                    <div class="col align-self-center ps-4">
                        <div class="user_name fw-bold lh-xs d-block" style="font-size:16px;">
                            {{ Auth::user()->name }}
                            <br>
                            {{ Auth::user()->last_name }}
                        </div>
                        <div class="role fw-normal lh-xs d-block text-xs text-warm-grey">
                            @if (Auth::user()->cl_role_id == 1)
                                Админ
                            @elseif (Auth::user()->cl_role_id == 2)
                                Ученик
                            @else
                                Лектор
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row g-0 pt-lg-2">
                    <ul class="nav">
                        <li id="logout-btn" class="nav-item w-100">
                            <a href="{{ route('logout') }}" class="d-flex fw-bold" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <div class="ml-3">
                                    <img src="{{ asset('assets/img/Log_out.svg') }}">
                                </div>
                                <div class="slide-item d-lg-flex d-none text-navy-blue" style="font-size:16px;">
                                    Изход
                                </div>
                                <div class="d-lg-none text-navy-blue" style="font-size:16px;">
                                    Изход
                                </div>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="toogler d-flex justify-content-end mb-lg-4 d-lg-block d-none">
                    <div class="pill d-lg-flex d-none align-items-center float-right rounded-circle overflow-hidden">
                        <a class="d-lg-inline btn px-2 col p-0 text-center" id="toggleNav">
                            <img src="{{ asset('assets/img/arrow.svg') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="position-relative d-lg-block d-none">
                    <div class="notifications-bar text-center pt-lg-4 position-absolute">
                        <div class="notification-icon">
                            <img src="{{ asset('assets/img/bell.svg') }}" alt="">
                        </div>
                        <div class="notification-text fw-bold pt-4 mt-2 mx-auto">
                            <div>Нещо</div>
                            <div>важно</div>
                        </div>
                        <div class="row g-0 py-3 mb-2">
                            <div class="col text-left ps-4 ms-2">
                                Виж
                            </div>
                            <div class="col text-right pe-4 me-2">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
