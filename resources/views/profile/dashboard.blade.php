@extends('layouts.profile')
@section('title', 'Моят Профил')

@section('content')
<div id="right-side" class="col-lg pt-md-5 mt-md-4 tab-content edit-content">
    <div class="row g-0 m-0 p-0">
        @include('flash-message')
        <div class="col-auto">
            <p class="m-0 p-0 text-uppercase student-name">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</p>
            <p class="m-0 p-0 text-uppercase role-name">
                @if (Auth::user()->isAdmin())
                    Админ
                @elseif (Auth::user()->isLecturer())
                    Лектор
                @else
                    Ученик
                @endif
            </p>
        </div>
        <div class="col">
            <div class="row g-0">
                <div class="col d-flex flex-column">
                    <div class="row g-0">
                        <div class="col">
                            <ul class="list-inline text-end social-links">
                                @if ($facebookLink)
                                    <li class="list-inline-item me-3">
                                        <a href="{{ $facebookLink }}">
                                            <img src="{{ asset('images/profile/facebook-icon.svg') }}" alt="#" style="width: 20px">
                                        </a>
                                    </li>
                                @endif
                                @if ($linkedinLink)
                                    <li class="list-inline-item me-3">
                                        <a href="{{ $linkedinLink }}">
                                            <img src="{{ asset('images/profile/linkdin-icon.svg') }}" style="width: 20px">
                                        </a>
                                    </li>
                                @endif
                                @if ($githubLink)
                                    <li class="list-inline-item me-3">
                                        <a href="{{ $githubLink }}">
                                            <img src="{{ asset('images/profile/github-icon.svg') }}" alt="#" style="width: 20px">
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="w-100"></div>
                        <div class="col d-flex justify-content-end">
                            <button onclick="window.location.href='{{ asset('myProfile/edit') }}'" class="btn edit-profile-btn d-flex align-items-center py-0 px-3 me-4">
                                <div class="row w-100 g-0">
                                    <div class="col text-start">
                                        <span class="fw-bold">Редактирай</span>
                                    </div>
                                    <div class="col-auto d-flex align-items-center">
                                        <img src="{{ asset('assets/icons/edit.svg') }}" width="20" alt="#">
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    @include ('profile.profile-picture', [
                        'user' => Auth::user(),
                        'style' => 'border-radius: 5px; width: 60px',
                    ])
                </div>
            </div>
        </div>
        <div class="w-100"></div>
        <div class="col mt-5 pt-2 profile-details">
            <div class="row g-0 d-flex align-items-center">
                <div class="col">
                    <img src="{{ asset('assets/icons/location.svg') }}" width="24" alt="#">
                    <span class="ps-3">{{ Auth::user()->location }}</span>
                </div>
                @if (Auth::user()->dob)
                    <div class="col">
                        <img src="{{ asset('assets/icons/birthday.svg') }}" width="30" alt="#">
                        <span class="ps-3">{{ Auth::user()->dob ? Auth::user()->dob->format('d.m.Y') : '' }}</span>
                    </div>
                    <div class="w-100 separator mt-5 pt-2"></div>
                @endif
                <div class="col">
                    <img src="{{ asset('assets/icons/email.svg') }}" width="30" alt="#">
                    <span class="ps-3">{{ Auth::user()->email }}</span>
                </div>
            </div>
        </div>
        <div class="w-100"></div>
        <div class="col mt-4 pt-3">
            <div class="row g-0">
                <div class="col pe-2 me-5">
                    <p class="fw-bold bio-title">Работен опит</p>
                    @foreach($allWorkExperience as $workExperience)
                        <div class="row g-0">
                            <div class="col-auto pe-3 fw-bold item-number"><i class="fas fa-briefcase"></i></div>
                            <div class="col mb-3 bio-description">{{ $workExperience->Position->position }}</div>
                            <div class="w-100"></div>
                            <div class="col-auto pe-3 mb-3 fw-bold item-number"><i class="fas fa-building"></i></div>
                            <div class="col bio-description">
                                {{ strlen($workExperience->Company->name) > 19 ? mb_substr($workExperience->Company->name, 0, 19) . "..." : $workExperience->Company->name }}</div>
                            <div class="w-100"></div>
                            <div class="col-auto pe-3 fw-bold item-number"><i class="far fa-calendar"></i></div>
                            <div class="col mb-3 bio-description">
                                {{ $workExperience->y_from->format('Y') }} - {{ $workExperience->y_to ? $workExperience->y_to->format('Y') : 'В ход' }}
                            </div>
                        </div>
                        @if (!$loop->last)
                            <hr>
                        @endif
                    @endforeach
                </div>
                <div class="col">
                    <p class="fw-bold bio-title">Образование</p>
                        @foreach ($allEducation as $education)
                            <div class="row g-0">
                                <div class="col-auto pe-3 fw-bold item-number"><i class="fas fa-school"></i></div>
                                <div class="col mb-3 bio-description">
                                    {{ $education->EduInstitution->name }}
                                </div>
                                <div class="w-100"></div>
                                <div class="col-auto pe-3 mb-3 fw-bold item-number"><i class="fas fa-graduation-cap"></i></div>
                                <div class="col bio-description">
                                    {{ $education->EduSpeciality->name }}
                                </div>
                                <div class="w-100"></div>
                                <div class="col-auto pe-3 fw-bold item-number"><i class="far fa-calendar"></i></div>
                                <div class="col mb-3 bio-description">
                                    {{ $education->y_from }} - {{ $education->y_to ? $education->y_to : 'В ход' }}
                                </div>
                            </div>
                        @if (!$loop->last)
                            <hr>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="w-100"></div>
        <!-- <div class="col-auto notebook">
            <div class="row g-0 d-flex align-items-center">
                <div class="col">
                    Бележник
                </div>
                <div class="col-auto">
                    <img src="{{ asset('assets/icons/notebook.svg') }}" width="48" alt="#">
                </div>
            </div>
        </div> -->
        @include('profile.event.event')
    </div>
</div>
@endsection
