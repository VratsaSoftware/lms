@extends('layouts.home')

@section('title', 'Редактирай Курс')

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
                        <b>Редактирай Курс</b>
                    </div>
                </div>
                <form id="lecturer-form" action="{{ route('course.update', $course->id) }}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="row g-0 module-top">
                        <div class="col form-app-position">
                            <input type="text" name="name"
                                   class="form-module form-create-adm-input me-lg-5 mb-4-input me-3-input"
                                   placeholder="Име на курс"
                                   title="Име на курс"
                                   value="{{ old('name', $course->name) }}" required>
                        </div>
                    </div>
                    <div class="row g-0 mt-lg-3">
                        <div class="col form-app-position">
                            <select name="training_type" required class="form-create-adm-input form-select-app me-lg-5 mb-4-input me-3-input">
                                <option selected disabled>Тип курс</option>
                                @foreach($trainingTypes as $trainingType)
                                    <option value="{{ $trainingType->id }}" {{ old('training_type', $course->training_type) == $trainingType->id ? 'selected' : null }}>{{ $trainingType->type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row g-0 mt-lg-3">
                        <div class="col form-app-position">
                            <select name="visibility" required class="form-create-adm-input form-select-app me-lg-5 mb-4-input me-3-input">
                                <option selected disabled>Видимост на курса</option>
                                <option value="public" {{ old('visibility', $course->visibility) == 'public' ? 'selected' : null }}>Публичен</option>
                                <option value="private" {{ old('visibility', $course->visibility) == 'private' ? 'selected' : null }}>Скрит</option>
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
                                   value="{{ old('starts', \Carbon\Carbon::parse($course->starts)->format('m/d/Y')) }}">
                            <input name="ends" type="text" class="form-module form-creat-input date-input mb-4-input" required
                                   readonly="true" onkeypress="return false"
                                   placeholder="Край на курс"
                                   title="Край на курс"
                                   value="{{ old('ends', \Carbon\Carbon::parse($course->ends)->format('m/d/Y')) }}">
                        </div>
                    </div>
                    <div class="row g-0 mt-lg-3">
                        <div class="col-auto form-app-position">
                            <input name="applications_from" type="text" required
                                   class="form-module form-creat-input date-input me-lg-5 mb-4-input me-3-input me-2-input"
                                   readonly="true" onkeypress="return false"
                                   placeholder="Начало на кандидатстване"
                                   title="Начало на кандидатстване"
                                   value="{{ old('applications_from', \Carbon\Carbon::parse($course->applications_from)->format('m/d/Y')) }}">
                            <input name="applications_to" type="text" required
                                   class="form-module form-creat-input date-input mb-4-input" readonly="true"
                                   onkeypress="return false" placeholder="Край на кандидатстване"
                                   title="Край на кандидатстване"
                                   value="{{ old('applications_to', \Carbon\Carbon::parse($course->applications_to)->format('m/d/Y')) }}">
                        </div>
                    </div>
                    <div class="row g-0">
                        <div class="col">
                            <div class="col form-app-position">
                                <textarea name="description" class="form-textarel form-create-adm-textarel mt-lg-3 me-lg-1 mb-4-input me-3-input"
                                          placeholder="Кратко описание"
                                          title="Кратко описание"
                                          required>{{ old('description', $course->description) }}</textarea>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-6 col-auto">
                <div class="row g-0 d-flex justify-content-end">
                    <div class="col-auto d-none d-lg-block me-5 mt-3">
                        <button form="delete-course" onclick="return confirm('Курсът ще бъде изтрит!')" class="btn-edit row g-0 mb-0" style="margin-top: 45px; min-width: 180px!important; height: 45px!important;">
                            <div class="col text-start">Изтрий курс</div>
                            <div class="col-auto ms-2">
                                <img src="{{ asset('assets/img/Delete.svg') }}">
                            </div>
                        </button>
                    </div>
                    <div class="col-auto mt-3 d-none d-lg-block me-5 mt-3">
                        <button form="lecturer-form" class="nav btn btn-green active py-0 pe-2 d-flex btn1-cs mt-5">
                            <div class="row g-0 align-self-center text-right">
                                <div class="col-auto text-start margin-create text-create">ЗАПАЗИ</div>
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
                                <button form="lecturer-form" class="nav btn  btn-green active py-0 pe-2 d-flex btn1-form mt-5" id="lection-1-tab" data-bs-toggle="tab" href="#" role="tab" aria-controls="lection-1" aria-selected="true">
                                    <div class="row g-0 align-self-center">
                                        <div class="col-auto text-start margin-form-app text-create">Запази</div>
                                        <div class="col text-end align-items-center d-flex img-btn-ms">
                                            <img src="{{ asset('assets/img/action_icon.svg') }}" alt="">
                                        </div>
                                    </div>
                                </button>
                            </div>
                            <div class="col-11 mt-3 d-lg-none">
                                <button onclick="return confirm('Курсът ще бъде изтрит!')" form="delete-course" class="btn-edit row g-0 mb-0">
                                    <div class="col text-start">Изтрий курс</div>
                                    <div class="col-auto ms-2">
                                        <img src="{{ asset('assets/img/Delete.svg') }}">
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="delete-course" action="{{ route('course.destroy', $course->id) }}" method="post">
        @method('delete')
        @csrf
    </form>
@endsection
