<link href="{{ asset('css/profile/mobile-profile.css') }}" rel="stylesheet" type="text/css">

<div class="col-12 mobile-profile">
    <div class="row g-0 p-0 pb-5 m-0">
        <div class="col-auto">
            <div class="row g-0 p-0 m-0 d-flex align-items-center">
                <div class="col">
                    @include ('profile.partials.user-picture', [
                        'user' => Auth::user(),
                        'style' => 'border-radius: 5px; width: 55px',
                    ])
                </div>
                <div class="col-auto ps-2 ms-1">
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
        <div class="col d-flex align-items-center justify-content-end">
            <button onclick="window.location.href='{{ asset('profile/edit') }}'" class="d-inline-block mobile-profile-btn me-4"><img src="{{ asset('assets/img/edit.svg') }}" alt="edit" width="20.3"></button>
            <button class="d-inline-block mobile-profile-btn" id="close-mobile-profile">&#10006;</button>
        </div>
    </div>
    <div class="row g-0 p-0 m-0">
    <p class="col details">
        <div class="d-block pb-4">
            <img src="{{ asset('assets/icons/location.svg') }}" width="21">
            <span class="ps-4 fw-bold">{{ Auth::user()->location }}</span>
        </div>
        @if (Auth::user()->dob)
            <div class="d-block pb-4">
                <img src="{{ asset('assets/icons/birthday.svg') }}" width="26.5" alt="#">
                <span class="ps-4 fw-bold">{{ Auth::user()->dob->format('d.m.Y') }}</span>
            </div>
        @endif
        <div class="d-block pb-3">
            <img src="{{ asset('assets/icons/email.svg') }}" width="26.9" alt="#">
            <span class="ps-4 fw-bold">{{ Auth::user()->email }}</span>
            <div class="mt-3"></div>
        </div>

        <!-- work experience -->
        @php
            $lastWorkExp = Auth::user()->lastWorkExp();
            $lastEducation = Auth::user()->lastEducation();
        @endphp
        <p class="fw-bold bio-title">Работен опит</p>
        <div class="row g-0">
            @if($lastWorkExp)
                <div class="col-auto pe-3 fw-bold item-number"><i class="fas fa-briefcase"></i></div>
                <div class="col mb-3 bio-description">{{ $lastWorkExp->position }}</div>
                <div class="w-100"></div>
                <div class="col-auto pe-3 mb-3 fw-bold item-number"><i class="fas fa-building"></i></div>
                <div class="col bio-description">
                    {{ $lastWorkExp->company }}
                </div>
                <div class="w-100"></div>
                <div class="col-auto pe-3 fw-bold item-number"><i class="far fa-calendar"></i></div>
                <div class="col mb-3 bio-description">
                    {{ $lastWorkExp->y_from }} - {{ $lastWorkExp->y_to ? $lastWorkExp->y_to : 'В ход' }}
                </div>
            @else
                Няма
            @endif
        </div>
        <hr>
        <p class="fw-bold bio-title">Образование</p>
        <div class="row g-0">
            @if($lastEducation)
                <div class="col-auto pe-3 fw-bold item-number"><i class="fas fa-school"></i></div>
                <div class="col mb-3 bio-description">
                    {{ $lastEducation->institution }}
                </div>
                <div class="w-100"></div>
                <div class="col-auto pe-3 mb-3 fw-bold item-number"><i class="fas fa-graduation-cap"></i></div>
                <div class="col bio-description">
                    {{ $lastEducation->specialty }}
                </div>
                <div class="w-100"></div>
                <div class="col-auto pe-3 fw-bold item-number"><i class="far fa-calendar"></i></div>
                <div class="col mb-3 bio-description">
                    {{ $lastEducation->y_from }} - {{ $lastEducation->y_to ? $lastEducation->y_to : 'В ход' }}
                </div>
            @else
                Няма
            @endif
        </div>
    </div>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <button class="btn mt-3 p-0 m-0 d-flex align-items-center">
            <img src="{{ asset('assets/img/Log_out.svg') }}" height="23" class="d-inline-block">
            <span class="fw-bold ps-4">Изход</span>
        </button>
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>

<script>
    $(document).ready(function(){
        $('#avatar-menu').on('click', function(){
            $('.mobile-profile').css('left', '0');
        });

        $('#close-mobile-profile').on('click', function(){
            $('.mobile-profile').css('left', '-100%');
        });
    });
</script>
