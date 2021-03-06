@extends('layouts.profile')

@section('title', 'Моят Профил')

@section('content')
<div id="right-side" class="col-lg pt-md-5 mt-md-4 tab-content edit-content">
    <div class="row g-0 m-0 p-0">
        @include('flash-message')
        <div class="col-7">
            <p class="m-0 p-0 text-uppercase student-name">{{ Auth::user()->name }} {{ Auth::user()->last_name }}</p>
            <p class="m-0 p-0 text-uppercase role-name">
                @if (Auth::user()->isAdmin())
                    Админ
                @elseif (Auth::user()->isLecturer())
                    Лектор
                @else
                    Курсист
                @endif
                <a href="{{ asset('profile/edit') }}" class="ms-3">
                    <img src="{{ asset('assets/icons/edit.svg') }}" width="20" alt="#">
                </a>
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
                                        <a href="{{ $facebookLink }}" target="_blank">
                                            <img src="{{ asset('assets/img/facebook-icon.svg') }}" alt="#" style="width: 20px">
                                        </a>
                                    </li>
                                @endif
                                @if ($linkedinLink)
                                    <li class="list-inline-item me-3">
                                        <a href="{{ $linkedinLink }}" target="_blank">
                                            <img src="{{ asset('assets/img/linkdin-icon.svg') }}" style="width: 20px">
                                        </a>
                                    </li>
                                @endif
                                @if ($githubLink)
                                    <li class="list-inline-item me-3">
                                        <a href="{{ $githubLink }}" target="_blank">
                                            <img src="{{ asset('assets/img/github-icon.svg') }}" alt="#" style="width: 20px">
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="w-100"></div>
                    </div>
                </div>
                <div class="col-auto">
                    @include ('profile.partials.user-picture', [
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
                            <div class="col mb-3 bio-description">{{ $workExperience->position }}</div>
                            <div class="w-100"></div>
                            <div class="col-auto pe-3 mb-3 fw-bold item-number"><i class="fas fa-building"></i></div>
                            <div class="col bio-description">
                                {{ mb_strlen($workExperience->company, 'UTF-8') > 19 ? mb_substr($workExperience->company, 0, 19) . "..." : $workExperience->company }}</div>
                            <div class="w-100"></div>
                            <div class="col-auto pe-3 fw-bold item-number"><i class="far fa-calendar"></i></div>
                            <div class="col mb-3 bio-description">
                                {{ $workExperience->y_from }} - {{ $workExperience->y_to ? $workExperience->y_to : 'В ход' }}
                            </div>
                        </div>
                        @if (!$loop->last)
                            <hr>
                        @endif
                    @endforeach
                    <button data-bs-toggle="modal" data-bs-target="#createWorkExperienceModal" style="width: 28px">+</button>
                </div>
                <div class="col">
                    <p class="fw-bold bio-title">Образование</p>
                        @foreach ($allEducation as $education)
                            <div class="row g-0">
                                <div class="col-auto pe-3 fw-bold item-number"><i class="fas fa-school"></i></div>
                                <div class="col mb-3 bio-description">
                                    {{ $education->institution }}
                                </div>
                                <div class="w-100"></div>
                                <div class="col-auto pe-3 mb-3 fw-bold item-number"><i class="fas fa-graduation-cap"></i></div>
                                <div class="col bio-description">
                                    {{ $education->specialty }}
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
                    <button data-bs-toggle="modal" data-bs-target="#educationModal-create" style="width: 28px">+</button>
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
    </div>
</div>

@include('profile.partials.event.event')

<!-- Modals Start -->
@include('profile.partials.work-experience.create')

@include('profile.partials.education.create')
<!-- Modals End -->
@endsection
