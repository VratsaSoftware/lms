@extends('layouts.home')

@section('title', 'Създай Курс')

@push('head')
    <link href="{{ asset('css/course/create.css') }}" rel="stylesheet">
@endpush

@section('content')
    <!-- main content -->
    <div class="col ms-lg-5">
        <div class="row g-0 d-flex justify-content-center">
            <div class="mt-3 flash">
                @include('flash-message')
            </div>
            <div class="col-lg-6 col-auto mb-5">
                <div class="col">
                    <div class="text-xl text-uppercase mt-5 mb-md-3 text-posi">
                        <b>Създай Курс</b>
                    </div>
                </div>
                <form id="lecturer-form" action="{{ route('course.store') }}" method="post">
                    @csrf
                    <div class="row g-0 module-top">
                        <div class="col form-app-position">
                            <input type="text" name="name"
                                   class="form-module form-create-adm-input me-lg-5 mb-4-input me-3-input"
                                   placeholder="Име на курс"
                                   title="Име на курс"
                                   value="{{ old('name') }}" required>
                        </div>
                    </div>
                    <div class="row g-0 mt-lg-3">
                        <div class="col form-app-position">
                            <select name="training_type" required title="Тип курс" class="form-create-adm-input form-select-app me-lg-5 mb-4-input me-3-input">
                                <option selected disabled>Тип курс</option>
                                @foreach($trainingTypes as $trainingType)
                                    <option value="{{ $trainingType->id }}" {{ old('training_type') == $trainingType->id ? 'selected' : null }}>{{ $trainingType->type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row g-0 mt-lg-3">
                        <div class="col form-app-position">
                            <select name="visibility" required title="Видимост на курса" class="form-create-adm-input form-select-app me-lg-5 mb-4-input me-3-input">
                                <option selected disabled>Видимост на курса</option>
                                <option value="public" {{ old('visibility') == 'public' ? 'selected' : null }}>Публичен</option>
                                <option value="private" {{ old('visibility') == 'private' ? 'selected' : null }}>Скрит</option>
                            </select>
                        </div>
                    </div>
                    <div class="row g-0 mt-lg-3">
                        <div class="col-auto form-app-position">
                            <input name="starts" type="text" required
                                   class="form-module form-creat-input date-input me-lg-5 mb-4-input me-3-input me-2-input"
                                   readonly="true" onkeypress="return false"
                                   placeholder="Начало на курс"
                                   title="Начало на курс"
                                   value="{{ old('starts') }}">
                            <input name="ends" type="text" class="form-module form-creat-input date-input mb-4-input" required
                                   readonly="true" onkeypress="return false"
                                   placeholder="Край на курс"
                                   title="Край на курс"
                                   value="{{ old('ends') }}">
                        </div>
                    </div>
                    <div class="row g-0 mt-lg-3">
                        <div class="col-auto form-app-position">
                            <input name="applications_from" type="text" required
                                   class="form-module form-creat-input date-input me-lg-5 mb-4-input me-3-input me-2-input"
                                   readonly="true" onkeypress="return false"
                                   placeholder="Начало на кандидатстване"
                                   title="Начало на кандидатстване"
                                   value="{{ old('applications_from') }}">
                            <input name="applications_to" type="text" required
                                   class="form-module form-creat-input date-input mb-4-input" readonly="true"
                                   onkeypress="return false"
                                   placeholder="Край на кандидатстване"
                                   title="Край на кандидатстване"
                                   value="{{ old('applications_to') }}">
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col">
                            <div class="col form-app-position">
                                <textarea name="description" class="form-textarel form-create-adm-textarel mt-lg-3 me-lg-1 mb-4-input me-3-input"
                                          placeholder="Кратко описание"
                                          title="Кратко описание"
                                          required>{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-auto">
                    <div class="row g-0 d-flex justify-content-end">
                        <div class="col-auto mt-3 d-none d-lg-block me-5 mt-3">
                            <button class="nav btn  btn-green active py-0 pe-2 d-flex btn1-cs mt-5">
                                <div class="row g-0 align-self-center">
                                    <div class="col-auto text-start margin-create text-create">СЪЗДАЙ</div>
                                    <div class="col text-end align-items-center d-flex img-btn-ms">
                                        <img src="{{ asset('assets/img/action_icon.svg') }}" alt="">
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col module-top" id="elements-container">
                            @include('course.partials.course-lecturers')
                            <div class="row g-0 d-flex justify-content-center">
                                <div class="col-auto mt-3 d-lg-none">
                                    <button class="nav btn  btn-green active py-0 pe-2 d-flex btn1-form mt-5" id="lection-1-tab" data-bs-toggle="tab" href="#" role="tab" aria-controls="lection-1" aria-selected="true">
                                        <div class="row g-0 align-self-center">
                                            <div class="col-auto text-start margin-form-app text-create">СЪЗДАЙ</div>
                                            <div class="col text-end align-items-center d-flex img-btn-ms">
                                                <img src="{{ asset('assets/img/action_icon.svg') }}" alt="">
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
