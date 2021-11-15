@extends('layouts.profile')

@section('title', 'Редактирай профил')

@section('content')
    <div id="right-side" class="col-lg pt-md-5 mt-md-4 tab-content edit-content">
        <form action="{{ route('user.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data" files="true">
            @method('PUT')
            @csrf
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
                                <div class="col d-flex justify-content-end">
                                </div>
                            </div>
                        </div>
                        <div class="col-auto position-relative">
                            @include ('profile.partials.user-picture', [
                                'user' => Auth::user(),
                                'style' => 'border-radius: 5px; width: 70px',
                            ])
                        </div>
                    </div>
                </div>
                <div class="w-100"></div>
                <div class="col mt-5 pt-2 profile-details">
                    Форма
                </div>
                <div class="w-100"></div>
                <div class="col mt-5 pt-2 profile-details">

                </div>

                <div class="row g-0">
                    <div class="col-12">
                        <button class="btn edit-profile-btn-filled mt-3 d-flex align-items-center py-0 px-3" style="float: right; width: 150px;">
                            <div class="row w-100 g-0">
                                <div class="col text-center">
                                    <span class="fw-bold">Запази промени</span>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
        </form>
        <div class="w-100"></div>
        <div class="col mt-4 pt-3">
            <div class="row g-0">
                @include('profile.partials.profile-edit.work-experience')
                @include('profile.partials.profile-edit.education')
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- Mobile Profile Edit Menu -->
    @include('profile.partials.profile-edit.mobile')

    <!-- Modals Start -->
    <!-- Work Experience Modal -->
    @include('profile.partials.work-experience.create')
    @include('profile.partials.work-experience.edit')
    <!-- Work Experience Modal End -->
    <!-- Education Modal -->
    @include('profile.partials.education.create')
    @include('profile.partials.education.edit')
    <!-- Education Modal End -->
    <!-- Modals End -->
@endsection

@push('scripts')
    <script src="{{ asset('js/profile/edit.js') }}"></script>
@endpush
