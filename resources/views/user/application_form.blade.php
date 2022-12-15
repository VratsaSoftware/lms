@extends('layouts.template')

@section('title', 'Форма за кандидатстване')

@section('head')
    <link href="{{ asset('css/applications.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- Mobil -->
    @if(!env('HIDE_APPLICATION_FORM', false))
        <div class="col-auto d-lg-none">
            <div class="row card-mobil g-0 fw-normal mb-3">
                <form action="{{route('application.store')}}" method="POST" class="col-md-12" id="application" name="application" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if (collect(request()->segments())->last() !== 'create')
                        <input type="hidden" name="source_url" value="{{collect(request()->segments())->last()}}">
                    @endif
                    @include('user.application-left')
                    <!-- right side -->
                    <div id="right-side" class="col-xl pt-md-5 mt-md-4 tab-content edit-content">
                        <!-- flash message -->
                        @include('flash-message')
                        <!-- Single lection content -->
                        <div class="tab-pane module-right fade show active mt-xl-2 pt-xl-1" id="lection-1" role="tabpanel" aria-labelledby="lection-1-tab">
                            <div class="tab-body-electronic position-relative">
                                <span class="close d-lg-none position-absolute">&times;</span>
                                <div class="row g-0 d-lg-none">
                                    <div class="col">
                                        <div class="text-title-module">
                                            <b>Електронна форма</b>
                                            <br>
                                            <p class="text-title-module-sm d-lg-none">{{ $applicationCourse ? $applicationCourse->name : 'Кандидатстване' }}</p>
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
                                        <div class="col-auto text-info-elect mt-4 ms-4 d-none d-lg-block">
                                            Информация взета от профила
                                        </div>
                                    </div>
                                    <div class="row g-0 module-top">
                                        <div class="col form-app-position">
                                            <input type="text" name="names" class="form-module input-automatically-filled form-elec-input me-lg-5 mb-4-input me-3-input" placeholder="Име и фамилия" aria-describedby="addon-wrapping" value="{{ Auth::user()->name . ' ' . Auth::user()->last_name }}" disabled required>

                                            <input type="text" minlength="10" maxlength="10" name="phone" class="form-module form-elec-input mb-4-input mt-lg-0 mt-4" placeholder="Телефон" aria-describedby="addon-wrapping" required>
                                        </div>
                                    </div>
                                    <div class="row g-0 module-top">
                                        <div class="col form-app-position">
                                            <input type="email" name="email" class="form-module input-automatically-filled form-elec-input me-lg-5 mb-4-input me-3-input mt-lg-0 mt-4" placeholder="Имейл" aria-describedby="addon-wrapping" value="{{ Auth::user()->email }}" disabled required>

                                            <input type="number" name="userage" class="form-module {!! Auth::user()->dob ? 'input-automatically-filled' : '' !!} form-elec-input mb-4-input mt-lg-0 mt-4" placeholder="Възраст" aria-describedby="addon-wrapping" value="{{ Auth::user()->dob ? $userBirthDate : null }}" {!! Auth::user()->dob ? 'disabled' : '' !!} required>
                                        </div>
                                    </div>
                                    <div class="row g-0 module-top">
                                        <div class="col form-app-position">
                                            @if (is_null($applicationFor) || empty($applicationFor) || count($applicationFor) < 1)
                                                @if ($errors->has('course'))
                                                    <span class="invalid-feedback" role="alert" style="display: block !important;">
                                                        <strong>{{ $errors->first('course') }}</strong>
                                                    </span>
                                                @endif
                                                <select class="form-elec-input form-select-app me-lg-5 mb-4-input me-3-input mt-lg-0 mt-4" name="course" id="course-select" required>
                                                    <option value="" disabled selected="selected">Направление</option>
                                                    @foreach(Config::get('applicationForm.courses') as $key => $modules)
                                                        @if (is_array($modules))
                                                            @foreach ($modules as $sub)
                                                                @if ($module == $sub)
                                                                    <option class="no-show course-{{ str_replace(' ', '', $key) }}" value="{{ $sub }}" selected="selected">{{$sub}}</option>
                                                                @else
                                                                    <option class="no-show course-{{ str_replace(' ', '', $key) }}" value="{{ $sub }}">{{$sub}}</option>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                        @if (!is_null($course) && $course == $key)
                                                            <option value="{{ $key }}" {{ (old("course") == $key ? "selected":"") }} selected="selected" data-count="{{ count($modules) }}">{{ ucfirst($key) }}</option>
                                                        @else
                                                            <option value="{{ $key }}"
                                                                    {{ (old("course") == $key ? "selected":"") }} data-count="{{ count($modules) }}">{{ ucfirst($key) }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            @else
                                                <select class="form-elec-input form-select-app me-lg-5 mb-4-input me-3-input mt-lg-0 mt-4" name="course" id="course-select" required>
                                                    @foreach($applicationFor as $course)
                                                        <option value="{{ $course->id }}" {{ Request::segment(4) == $course->id ? 'selected' : '' }}>{{ $course->name }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                            <select id="occupation" name="occupation" class="form-elec-input form-select-app mb-4-input me-3-input mt-lg-0 mt-4" required>
                                                <option value="" selected>Занимание</option>
                                                @foreach ($occupations as $occupation)
                                                    <option value="{{$occupation->id}}" {{ (old("occupation") == $occupation->id ? "selected":"") }}>{{$occupation->occupation}}</option>
                                                @endforeach
                                            </select>

                                            <select name="test_datetime" class="form-elec-input form-select-app me-lg-5 mb-4-input me-3-input mt-lg-0 mt-4" required>
                                                <option value="" selected disabled>Дата и час за тест по Английски *</option>
                                                @foreach (explode(';', env('TEST_DATES')) as $date)
                                                    <option value="{{ $date }}" {{ (old("test_datetime") == $date ? "selected" : "") }}>{{ $date }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row g-0">
                                        <div class="col-lg-auto col me-lg-1 mt-4 me-3-input">
                                            <div class="form-info-titel">
                                                <b>Защо смятате, че тези обучения са подходящ за Вас?</b>
                                            </div>
                                            <div class="col-lg-auto col form-app-position mt-lg-5">
                                                <b><span class="counter counter-position" id="candidate-span"></span></b>
                                                <textarea name="suitable_candidate" class="form-textarel-elec mb-4-input me-3-input" placeholder="Между 100 и 500 символа" aria-label="With textarea" minlength="100" maxlength="500" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-auto col ms-elect mt-4">
                                            <div class="form-info-titel">
                                                <b>Защо смятате, че Вие сте подходящ за ИТ обучение? (Ако вече си минал такова, добави своя линк към GitHub)</b>
                                            </div>
                                            <div class="col-lg-auto col form-app-position mt-lg-5">
                                                <b><span class="counter counter-position" id="training-span"></span><b>
                                                        <textarea name="suitable_training" class="form-textarel-elec mb-4-input" placeholder="Между 100 и 500 символа" aria-label="With textarea" minlength="100" maxlength="500" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-0">
                                        <div class="col-lg-auto col mt-4 me-3-input">
                                            <div class="form-info-titel">
                                                <b>Опишете три(3) Ваши постижения</b>
                                            </div>
                                            <div class="col-lg-auto col form-app-position mt-lg-5">
                                                <b><span class="counter counter-position" id="accompliments-span"></span></b>
                                                <textarea name="accompliments" class="form-textarel-elec me-lg-1 mb-4-input me-3-input" placeholder="Между 100 и 500 символа" aria-label="With textarea" minlength="100" maxlength="500" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-auto col ms-elect mt-4">
                                            <div class="form-info-titel ">
                                                <b>Какви са очакванията Ви за това обучение?</b>
                                            </div>
                                            <div class="col-lg-auto col form-app-position mt-lg-5">
                                                <b><span class="counter counter-position" id="expecatitions-span"></span></b>
                                                <textarea name="expecatitions" class="form-textarel-elec mb-4-input" placeholder="Между 100 и 500 символа" aria-label="With textarea" minlength="100" maxlength="500" required></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-0 mt-3 mb-5">
                                        <div class="form-info-titel-2 my-3">
                                            <b>Добавете своето CV<span class="counter mt-lg-0 ms-lg-3" id="expecatitions-span"></span></b>
                                        </div>
                                        <input type="file" name="cv" id="file" style="border: 0px">
                                    </div>

                                    <input id="scholarship" type="checkbox" style="border: 0px; border-radius: 0px;">
                                    <label for="scholarship">Кандидатствам за стипендия</label>

                                    <div id="scholarshipMotivation" class="row g-0" style="display: none">
                                        <div class="col">
                                            <div class="row">
                                                <div class="form-info-titel-2 my-3">
                                                    <b>Защо смятате, че трябва да Ви отпуснем стипендия?  <span style="color: red">*</span><span class="counter mt-lg-0 ms-lg-3" id="scholarship-motivation-span"></span></b>
                                                </div>
                                            </div>
                                            <div class="col-lg-auto col form-app-position">
                                                <textarea name="scholarship_motivation" class="textarea-elec-2 required" placeholder="Между 300 и 1500 символа" aria-label="With textarea" minlength="300" maxlength="1500">{{ old('scholarship_motivation') }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-0 mt-3 mb-5">
                                        <div class="col-lg-auto col-1 me-lg-1 mt-4 me-3-input">
                                            <div class="form-info-titel"></div>
                                        </div>
                                        <div class="col-lg-auto col ms-elect mt-4">
                                            <button class="submit-form ms-xxl-2 mt-xxl-0 mt-3 btn-edit btn-green row g-0 align-items-center">
                                                <div class="col text-start fw-bold">Изпрати</div>
                                                <div class="col-auto">
                                                    <img src="{{ asset('assets/icons/action_icon.svg') }}">
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- right side END -->
                </form>
            </div>
        </div>
    @else
        <div style="font-family: 'Comfortaa', sans-serif; text-align: center; margin-top: 20%">
            <h2>
                Кандидатстването за този сезон на курсовете приключи!
                <br>
                Очаквайте да отворим кандидатстване за следващ сезон на курсове.
            </h2>
            <a href="{{ route('profile') }}">
                <button class="btn-green btn-edit mt-5" style="max-width: 270px">Моят профил</button>
            </a>
        </div>
    @endif
@endsection

@push('scripts')
    @if(env('HIDE_APPLICATION_FORM', false))
        <script>
            $('nav').css('display', 'none');
            $('.col-xl-auto').removeClass('col-xl-auto');
        </script>
    @endif
    <script src="{{ asset('js/application/application-form-text-counter.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/application/validation-form.js') }}" charset="utf-8"></script>
    <script>
        $(function () {
            $('#scholarship').click(function () {
                var scholarshipMotivation = $('#scholarshipMotivation')
                scholarshipMotivation.toggle().toggleClass('required')

                if (scholarshipMotivation.hasClass('required')) {
                    scholarshipMotivation.attr('required', true)
                    $("[name='scholarship_motivation']").prop('required', true).trigger('change');
                } else {
                    scholarshipMotivation.attr('required', false)
                    $("[name='scholarship_motivation']").prop('required', false).trigger('change');
                }
            })
        })
    </script>
@endpush
