@extends('layouts.template')
@section('title', 'Форма за кандидатстване')

@section('head')
	<link href="{{ asset('css/applications.css') }}" rel="stylesheet" />
@endsection

@section('content')
<!-- flash message -->
@include('flash-message')
    <!-- Single lection content -->
    <div class="row g-0 p-lg-0 mt-lg-0">
        @if(!env('HIDE_APPLICATION_FORM', false))
            <div class="ms-body-elect-none-menu">
                <div class="tab-body-electronic position-relative">
                    <div class="row g-0 d-lg-none">
                        <div class="col">
                            <div class="text-title-module">
                                <b>Електронна форма</b>
                                <br>
                                <p class="text-title-module-sm d-lg-none">за Кандидатстванне</p>
                            </div>
                        </div>
                    </div>
                    <div class="row g-0 d-flex justify-content-center">
                        <div class="col-auto d-lg-none mt-5 mb-5">
                            <img src="{{ asset('assets/img/Elektronna_forma.svg') }}">
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col-auto title-electonic mt-3 d-none d-lg-block">
                            1. ЕЛЕКТРОННА ФОРМА
                        </div>
                        <div class="row g-0">
                            <div class="col-auto text-info-elect star-elect mt-4 d-none d-lg-block">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="col-auto text-info-elect mt-4 ms-4 d-none d-lg-block"> След формата, ще бъдете регистрирани в платформата, и от профила си ще може да следите прогреса на кандидатстване
                                <br>
                                <small>
                                    На пощата ви ще получите писмо с линк към задаване на парола на акаунта си в платформата
                                </small>
                            </div>
                        </div>
                        <form action="{{route('application.store')}}" method="POST" class="col-md-12" id="application" name="application" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            @if(collect(request()->segments())->last() !== 'create')
                                <input type="hidden" name="source_url" value="{{collect(request()->segments())->last()}}">
                            @endif
                            <div class="row g-0 module-top">
                                <div class="col form-app-position">
                                    <input type="text" name="names" class="form-module form-elec-input me-lg-5 mb-4-input me-3-input" placeholder="Име и фамилия" aria-describedby="addon-wrapping" required>

                                    <input type="text" name="phone" minlength="10" maxlength="10" class="form-module form-elec-input mb-4-input mt-lg-0 mt-4" placeholder="Телефон" aria-describedby="addon-wrapping" required>
                                </div>
                            </div>
                            <div class="row g-0 module-top">
                                <div class="col form-app-position">
                                    <input type="email" name="email" class="form-module form-elec-input me-lg-5 mb-4-input me-3-input mt-lg-0 mt-4" placeholder="Имейл" aria-describedby="addon-wrapping" required>

                                    <input type="number" name="userage" class="form-module form-elec-input mb-4-input mt-lg-0 mt-4" placeholder="Възраст" aria-describedby="addon-wrapping" required>
                                </div>
                            </div>
                            <div class="row g-0 module-top">
                                <div class="col form-app-position">
                                    @if(is_null($applicationFor) || empty($applicationFor) || count($applicationFor) < 1)
                                        @if ($errors->has('course'))
                                            <span class="invalid-feedback" role="alert" style="display: block !important;">
                                                <strong>{{ $errors->first('course') }}</strong>
                                            </span>
                                        @endif
                                        <select class="form-elec-input form-select-app me-lg-5 mb-4-input me-3-input mt-lg-0 mt-4" name="course" id="course-select" required>
                                            <option value="" disabled selected="selected">Направление</option>
                                            @foreach(Config::get('applicationForm.courses') as $key => $modules)
                                                @if(is_array($modules))
                                                    @foreach($modules as $sub)
                                                        @if($module == $sub)
                                                            <option class="no-show course-{{ str_replace(' ', '', $key) }}" value="{{ $sub }}" selected="selected">{{ $sub }}</option>
                                                        @else
                                                            <option class="no-show course-{{ str_replace(' ', '', $key) }}" value="{{ $sub }}">{{ $sub }}</option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @if(!is_null($course) && $course == $key)
                                                    <option value="{{ $key }}" {{ (old("course") == $key ? "selected" : "") }} selected="selected" data-count="{{ count($modules) }}">{{ ucfirst($key) }}</option>
                                                @else
                                                    <option value="{{$key}}"
                                                        {{ (old("course") == $key ? "selected" : "") }} data-count="{{ count($modules) }}">{{ ucfirst($key) }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    @else
                                        <select class="form-elec-input form-select-app me-lg-5 mb-4-input me-3-input mt-lg-0 mt-4" name="course" id="course-select" required>
                                            <option value="" disabled selected="selected">Направление</option>
                                            @foreach($applicationFor as $course)
                                                <option value="{{ $course->id }}" {{ Request::segment(4) == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                    <select id="occupation" name="occupation" class="form-elec-input form-select-app me-lg-5 mb-4-input me-3-input mt-lg-0 mt-4" required>
                                        <option value="" selected>Занимание</option>
                                        @foreach ($occupations as $occupation)
                                            <option value="{{ $occupation->id }}" {{ (old("occupation") == $occupation->id ? "selected" : "") }}>{{ $occupation->occupation }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row g-0">
                                <div class="col">
                                    <div class="row">
                                        <div class="form-info-titel-2 my-3">
                                            <b>Защо смятате, че тези обучения са подходящ за Вас? <span class="counter mt-lg-0 ms-lg-3" id="candidate-span"></span></b>
                                        </div>
                                    </div>
                                    <div class="col-lg-auto col form-app-position">
                                        <textarea name="suitable_candidate" class="textarea-elec-2" placeholder="100-500" aria-label="With textarea" minlength="100" maxlength="500" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0">
                                <div class="col">
                                    <div class="row">
                                        <div class="form-info-titel-2 my-3">
                                            <b>Защо смятате, че Вие сте подходящ за ИТ обучение? <span class="counter mt-lg-0 ms-lg-3" id="training-span"></span></b>
                                        </div>
                                    </div>
                                    <div class="col-lg-auto col form-app-position">
                                        <textarea name="suitable_training" class="textarea-elec-2" placeholder="100-500" aria-label="With textarea" minlength="100" maxlength="500" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0">
                                <div class="col">
                                    <div class="row">
                                        <div class="form-info-titel-2 my-3">
                                            <b>Опишете три(3) Ваши постижения <span class="counter mt-lg-0 ms-lg-3" id="accompliments-span"></span></b>
                                        </div>
                                    </div>
                                    <div class="col-lg-auto col form-app-position">
                                        <textarea name="accompliments" class="textarea-elec-2" placeholder="100-500" aria-label="With textarea" minlength="100" maxlength="500" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-0">
                                <div class="col">
                                    <div class="row">
                                        <div class="form-info-titel-2 my-3">
                                            <b>Какви са очакванията Ви за това обучение? <span class="counter mt-lg-0 ms-lg-3" id="expecatitions-span"></span></b>
                                        </div>
                                    </div>
                                    <div class="col-lg-auto col form-app-position">
                                        <textarea name="expecatitions" class="textarea-elec-2" placeholder="100-500" aria-label="With textarea" minlength="100" maxlength="500" required></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="ms-4 g-0 mt-5">
                                <div class="form-info-titel-2 my-3">
                                    <b>Добавете своето CV<span class="counter mt-lg-0 ms-lg-3" id="expecatitions-span"></span></b>
                                </div>
                                <input type="file" name="cv" id="file" style="border: 0px; border-radius: 0px" required>
                            </div>

                            <div class="row g-0 mt-lg-5">
                                <div class="col-lg-7 d-none d-lg-block col-1 me-lg-1 mt-4 me-3-input">
                                    <div class="form-info-titel"></div>
                                </div>
                                <div class="col-lg-2 submit-btn-elect-form col ms-elect mt-4">
                                    <button class="submit-form ms-xxl-2 mt-xxl-0 mt-3 btn-edit btn-green row g-0 align-items-center">
                                        <div class="col text-start fw-bold">Изпрати</div>
                                        <div class="col-auto">
                                            <img src="{{ asset('assets/icons/action_icon.svg') }}">
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div style="font-family: 'Comfortaa', sans-serif; text-align: center; margin-top: 20%">
                <h2>
                    Кандидатстването за този сезон на курсовете приключи!
                    <br>
                    Очаквайте да отворим кандидатстване за следващ сезон на курсове.
                </h2>
                <a href="{{ config('consts.PUBLIC_PLATFORM_URL') }}">
                    <button class="btn-green btn-edit mt-5" style="max-width: 270px">Начало</button>
                </a>
            </div>
        @endif
    </div>
    <!-- Single lection content END-->

    <script src="{{ asset('js/application/application-form-text-counter.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/application/validation-form.js') }}" charset="utf-8"></script>
@endsection
