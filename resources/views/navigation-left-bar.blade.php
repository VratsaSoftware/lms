<link href="{{ asset('css/nav.css') }}" rel="stylesheet" type="text/css">

<div class="col-lg-auto position-relative">
    <nav class="slide navbar-expand-lg navbar-light bg-white fw-bold" id="mySidenav">
        <a class="navbar-brand d-lg-block d-none mx-auto" href="{{ asset('myProfile') }}">
            @if (config('consts.LOGO') == 'vsc')
                <img class="logo" src="{{ asset('assets/img/logo.png') }}">
            @elseif (config('consts.LOGO') == 'digitalmontana')
                <img class="logo" src="{{ asset('assets/img/digital-montana-transperant.png') }}" width="200px">
            @elseif (config('consts.LOGO') == 'digitalsmoliyan')
                <img class="logo" src="{{ asset('assets/img/digital-smoliyan-transparent.png') }}">
            @endif
        </a>
        <div class="row g-0 d-lg-none d-flex pb-4 align-items-center">
            <div class="col">
                <div class="row g-0 user-info justify-content-center">
                    <div class="col-auto"  id="avatar-menu">
                        @include ('profile.partials.user-picture', [
                            'user' => Auth::user(),
                            'style' => 'border-radius: 5px',
                        ])
                    </div>
                    <div class="col align-self-center ps-2 ms-1">
                        <div class="user_name fw-bold d-block">
                            {{ Auth::user()->name }}
                        </div>
                        <div class="role text-xs text-warm-grey d-block">
                            @if (Auth::user()->isAdmin())
                                Админ
                            @elseif (Auth::user()->isStudent())
                                Курсист
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
                    @if(Auth::user() && (Auth::user()->isLecturer() || Auth::user()->isAdmin()))
                        <li class="nav-item align-items-center mb-lg-5 @if (request()->routeIs('admin.applications')) active-link @endif">
                            <a href="{{ route('admin.applications') }}" class="d-flex align-items-center">
                                <span class="icon">
                                    <img src="{{ asset('assets/img/Application.svg') }}" alt="">
                                </span>
                                <span class="slide-item text-navy-blue" style="font-size:16px; margin-right:5px">Кандидатстване</span>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item align-items-center mb-lg-5 @if (request()->routeIs('module*') || request()->routeIs('user.module.lections') || request()->routeIs('all.courses') || (request()->routeIs('myProfile') && !Auth::user()->isAdmin())) active-link @endif">
                        <a href="{{ Auth::user() && Auth::user()->isAdmin() ? route('all.courses') : route('myProfile') }}" class="d-flex align-items-center">
                            <span class="icon">
                                <img src="{{ asset('assets/img/Courses.svg') }}" alt="">
                            </span>
                            <span class="slide-item text-navy-blue" style="font-size:16px;">Курсове</span>
                        </a>
                    </li>
{{--                    <li class="nav-item align-items-center mb-lg-5 @if (request()->routeIs('admin.events') || request()->routeIs('users.events')) active-link @endif">--}}
{{--                        <a href="@if(Auth::user() && Auth::user()->isAdmin()){{ route('admin.events') }}@else{{ route('users.events') }}@endif" class="d-flex align-items-center dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            <span class="icon">--}}
{{--                                <img src="{{ asset('assets/img/Events.svg') }}">--}}
{{--                            </span>--}}
{{--                            <span class="slide-item text-navy-blue" style="font-size:16px;">--}}
{{--                                Събития--}}
{{--                            </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    @if (Auth::user() && (Auth::user()->isLecturer() || Auth::user()->isAdmin()))--}}
{{--                        @if (Auth::user() && Auth::user()->isAdmin())--}}
{{--                            <li class="nav-item align-items-center mb-lg-5 @if (request()->routeIs('polls.index')) active-link @endif">--}}
{{--                                <a href="{{route('polls.index')}}" class="d-flex align-items-center">--}}
{{--                                    <span class="icon">--}}
{{--                                        <img src="{{ asset('assets/img/Surveys.svg') }}">--}}
{{--                                    </span>--}}
{{--                                    <span class="slide-item text-navy-blue" style="font-size:16px;">--}}
{{--                                        Анкети--}}
{{--                                    </span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                        <li class="nav-item align-items-center mb-lg-5 @if (request()->routeIs('test*')) active-link @endif">--}}
{{--                            <a href="{{ route('test.index') }}" class="d-flex align-items-center">--}}
{{--                                <span class="icon">--}}
{{--                                    <img src="{{ asset('assets/img/Tests.svg') }}" alt="">--}}
{{--                                </span>--}}
{{--                                <span class="slide-item text-navy-blue" style="font-size:16px;">--}}
{{--                                    Тестове--}}
{{--                                </span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
                </ul>
                <!-- Mobile -->
                <a href="{{ route('myProfile') }}">
                    <div class="row d-lg-flex d-none g-0 user-info py-lg-4 justify-content-center">
                        <div class="col-auto">
                            @include ('profile.partials.user-picture', [
                                'user' => Auth::user(),
                                'style' => 'border-radius: 5px',
                            ])
                        </div>
                        <div class="col align-self-center ps-4">
                            <div class="user_name fw-bold lh-xs d-block" style="font-size:16px;">
                                {{ Auth::user()->name }}
                                <br>
                                {{ Auth::user()->last_name }}
                            </div>
                            <div class="role fw-normal lh-xs d-block text-xs text-warm-grey">
                                @if (Auth::user()->isAdmin())
                                    Админ
                                @elseif (Auth::user()->isStudent())
                                    Курсист
                                @else
                                    Лектор
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
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
{{--                <div class="position-relative d-lg-block d-none">--}}
{{--                    <div class="notifications-bar text-center pt-lg-4 position-absolute">--}}
{{--                        <div class="notification-icon">--}}
{{--                            <img src="{{ asset('assets/img/bell.svg') }}" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="notification-text fw-bold pt-4 mt-2 mx-auto">--}}
{{--                            <div>Нещо</div>--}}
{{--                            <div>важно</div>--}}
{{--                        </div>--}}
{{--                        <div class="row g-0 py-3 mb-2">--}}
{{--                            <div class="col text-left ps-4 ms-2">--}}
{{--                                Виж--}}
{{--                            </div>--}}
{{--                            <div class="col text-right pe-4 me-2">--}}
{{--                                <i class="fas fa-arrow-right"></i>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </nav>
</div>

<!-- Mobile Profile Menu -->
@include('profile.partials.mobile-profile')
