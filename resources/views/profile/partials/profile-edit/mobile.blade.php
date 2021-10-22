<div class="col-12 mobile-profile-edit">
    @include('flash-message')
    <form id="user-update-form" action="{{ route('user.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data" files="true">
        @method('PUT')
        @csrf
        <div class="row g-0 p-0 pb-5 m-0">
            <div class="col-auto">
                <div class="row g-0 p-0 m-0 d-flex align-items-center">
                    <div class="col">
                        <label for="edit-picture-mobile">
                            <div class="edit-avatar">
                                @include ('profile.profile-picture', [
                                    'user' => Auth::user(),
                                    'style' => 'border-radius: 5px; width: 70px',
                                ])
                            </div>
                            <img id="preview-img-avatar-mobile" style="border-radius: 5px; width: 70px; display: none" class="avatar">
                        </label>
                    </div>
                    <input type="file" name="picture" id="edit-picture-mobile" style="display: none"  accept="image/png, image/gif, image/jpeg">

                    <div class="col-auto ps-2 ms-1">
                        <div class="user_name fw-bold d-block">
                            {{ Auth::user()->name }}
                        </div>
                        <div class="role text-xs text-warm-grey d-block">
                            @if (Auth::user()->isAdmin())
                                Админ
                            @elseif (Auth::user()->isLecturer())
                                Лектор
                            @else
                                Ученик
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col d-flex align-items-center justify-content-end">
                <a href="{{ asset('myProfile') }}">
                    <span class="d-inline-block" id="close-edit-menu">&#10006;</span>
                </a>
            </div>
        </div>
        <div class="col profile-details">
            <div class="row g-0 d-flex align-items-center flex-column">
                <div class="col pb-2">
                    <label class="d-flex align-items-center input">
                        <img src="{{ asset('assets/icons/facebook.png') }}" width="30" alt="#">
                        <input type="url" name="facebook" placeholder="Facebook" value="{{ old('facebook', $facebookLink) }}">
                    </label>
                </div>
                <div class="col pb-2">
                    <label class="d-flex align-items-center input">
                        <img src="{{ asset('assets/img/linkdin-icon.svg') }}" width="20" alt="#" class="ms-2">
                        <input type="url" name="linkedin" placeholder="Linkedin" value="{{ old('linkedin', $linkedinLink) }}">
                    </label>
                </div>
                <div class="col pb-2">
                    <label class="d-flex align-items-center input">
                        <img src="{{ asset('assets/img/github-icon.svg') }}" width="20" alt="#" class="ms-2">
                        <input type="url" name="github" placeholder="Github" value="{{ old('github', $githubLink) }}">
                    </label>
                </div>
            </div>
            <div class="row g-0 pt-4 d-flex justify-content-end flex-column">
                <!-- edit name -->
                <div class="col pb-2">
                    <label class="d-flex align-items-center input">
                        <img src="{{ asset('assets/img/user.svg') }}" alt="#" width="32px">
                        <input type="text" name="name" placeholder="Име и Фамилия"
                               value="{{ Auth::user()->name }} {{ Auth::user()->last_name }}" required>
                    </label>
                </div>
                <div class="col pb-2">
                    <label class="d-flex align-items-center input">
                        <img src="{{ asset('assets/icons/location.svg') }}" width="24" alt="#">
                        <input type="text" name="location" placeholder="Град" value="{{ Auth::user()->location }}" @if(!Auth::user()->isAdmin()) required @endif>
                    </label>
                </div>
                <div class="col pb-2">
                    <label class="d-flex align-items-center input">
                        <img src="{{ asset('assets/icons/birthday.svg') }}" width="30" alt="#">
                        <input type="text" name="dob" class="date-input" readonly="true" onkeypress="return false" placeholder="Дата на раждане" value="{{ old('dob', Auth::user()->dob ? Auth::user()->dob->format('m/d/Y') : '') }}"  autocomplete="off">
                    </label>
                </div>
                <div class="col pb-2">
                    <label class="d-flex align-items-center input">
                        <img src="{{ asset('assets/icons/email.svg') }}" width="30" alt="#">
                        <input type="text" name="email" placeholder="Електронна поща"
                               value="{{ Auth::user()->email }}">
                    </label>
                </div>
            </div>
            <!-- edit password -->
            <div class="row g-0 pt-4 d-flex justify-content-end flex-column">
                <div class="col pb-2">
                    <label class="d-flex align-items-center input">
                        <i class="fas fa-lock" style="font-size: 29px"></i>
                        <input type="password" name="currentPassword" placeholder="Настояща парола">
                    </label>
                </div>
                <div class="col pb-2">
                    <label class="d-flex align-items-center input">
                        <i class="fas fa-lock" style="font-size: 29px"></i>
                        <input type="password" name="newPassword" placeholder="Нова парола">
                    </label>
                </div>
                <div class="col pb-2">
                    <label class="d-flex align-items-center input">
                        <i class="fas fa-lock" style="font-size: 29px"></i>
                        <input type="password" name="confirmPassword" placeholder="Повтори парола">
                    </label>
                </div>
            </div>
        </div>
    </form>
    <div class="row g-0 pt-4 flex-column">
        @include('profile.partials.profile-edit.work-experience')
        @include('profile.partials.profile-edit.education')
    </div>
</div>
<!-- Save Button -->
<div class="col mt-2">
    <button form="user-update-form" class="btn edit-profile-btn-filled d-flex align-items-center py-0 w-100">
        <div class="row w-100 g-0">
            <div class="col text-center">
                <span class="fw-bold">Запази промени</span>
            </div>
        </div>
    </button>
</div>
</div>
