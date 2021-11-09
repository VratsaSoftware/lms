@extends('layouts.profile')

@section('title', 'Редактирай профил')

@section('content')
    <div id="right-side" class="col-lg pt-md-5 mt-md-4 tab-content edit-content">
        <form action="{{ route('user.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data" files="true">
            @method('PUT')
            @csrf
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
                        <label for="edit-picture">
                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="flip-card-front">
                                        <div class="edit-avatar">
                                            @include ('profile.partials.user-picture', [
                                                'user' => Auth::user(),
                                                'style' => 'border-radius: 5px; width: 70px',
                                            ])
                                        </div>
                                        <img id="preview-img-avatar" style="border-radius: 5px; width: 70px; display: none" class="avatar">
                                    </div>
                                    <div class="flip-card-back position-relative">
                                        <img src="{{ asset('assets/icons/edit-profile-icon.png') }}" style="width: 70px" class="position-absolute top-50 start-50 translate-middle">
                                    </div>
                                </div>
                            </div>
                        </label>
                    </div>
                    <input type="file" name="picture" id="edit-picture" style="display: none" accept="image/png, image/gif, image/jpeg">
                </div>
            </div>
            <div class="w-100"></div>
            <div class="col mt-5 pt-2 profile-details">
                <div class="row g-0 d-flex align-items-center">
                    <div class="col">
                        <label class="d-flex align-items-center input">
                            <img src="{{ asset('assets/icons/facebook.png') }}" width="30" alt="#">
                            <input type="url" name="facebook" placeholder="Facebook" value="{{ old('facebook', $facebookLink) }}">
                        </label>
                    </div>
                    <div class="col">
                        <label class="d-flex align-items-center input mx-3">
                            <img src="{{ asset('assets/img/linkdin-icon.svg') }}" width="20" alt="#" class="ms-2">
                            <input type="url" name="linkedin" placeholder="Linkedin" value="{{ old('linkedin', $linkedinLink) }}">
                        </label>
                    </div>
                    <div class="col">
                        <label class="d-flex align-items-center input">
                            <img src="{{ asset('assets/img/github-icon.svg') }}" width="20" alt="#" class="ms-2">
                            <input type="url" name="github" placeholder="Github" value="{{ old('github', $githubLink) }}">
                        </label>
                    </div>
                </div>
                <div class="row g-0 mt-5 d-flex align-items-center">
                    <div class="col">
                        <label class="d-flex align-items-center input">
                            <img src="{{ asset('assets/icons/location.svg') }}" width="24" alt="#">
                            <input type="text" name="location" placeholder="Град" value="{{ old('location', Auth::user()->location) }}"
                                   @if(!Auth::user()->isAdmin()) required @endif>
                        </label>
                    </div>
                    <div class="col">
                        <label class="d-flex align-items-center input mx-3">
                            <img src="{{ asset('assets/icons/birthday.svg') }}" width="30" alt="#">
                            <input type="text" name="dob" class="date-input" placeholder="Дата на раждане" readonly="true" onkeypress="return false"
                                value="{{ old('dob', Auth::user()->dob ? Auth::user()->dob->format('m/d/Y') : '') }}" autocomplete="off">
                        </label>
                    </div>
                    <div class="col">
                        <label class="d-flex align-items-center input">
                            <img src="{{ asset('assets/icons/email.svg') }}" alt="#">
                            <input type="email" name="email" placeholder="Email"
                                value="{{ old('email', Auth::user()->email) }}">
                        </label>
                    </div>
                </div>
            </div>
            <div class="w-100"></div>
            <div class="col mt-5 pt-2 profile-details">
                <div class="col">
                    <label class="d-flex align-items-center input">
                        <img src="{{ asset('assets/img/user.svg') }}" alt="#" width="32px">
                        <input type="text" name="name" placeholder="Име и фамилия"
                               value="{{ old('name', Auth::user()->name . ' ' . Auth::user()->last_name) }}" required>
                    </label>
                </div>
                <div class="col mt-2">
                    <label class="d-flex align-items-center input">
                        <img src="{{ asset('assets/img/icons8-lock-30.png') }}"/>
                        <input type="password" name="currentPassword" placeholder="Настояща парола">
                    </label>
                </div>
                <div class="col mt-2">
                    <label class="d-flex align-items-center input">
                        <img src="{{ asset('assets/img/icons8-lock-30.png') }}"/>
                        <input type="password" name="newPassword" placeholder="Нова парола">
                    </label>
                </div>
                <div class="col mt-2">
                    <label class="d-flex align-items-center input">
                        <img src="{{ asset('assets/img/icons8-lock-30.png') }}"/>
                        <input type="password" name="confirmPassword" placeholder="Повтори парола">
                    </label>
                </div>
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
    <script src="{{ asset('js/profile/image-preview.js') }}"></script>
@endpush
