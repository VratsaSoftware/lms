@extends('layouts.home')

@section('title', 'Създай Курс')

@push('head')
    <link href="{{ asset('css/course/create.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <!-- main content -->
    <div class="col ms-lg-5">
        <div class="row g-0 d-flex justify-content-center">
            <div class="col-lg-6 col-auto mb-5">
                <div class="col">
                    <div class="text-xl text-uppercase mt-5 mb-md-3 text-posi">
                        <b>Създай Курс</b>
                    </div>
                </div>
                <div class="row g-0 module-top">
                    <div class="col form-app-position">
                        <input type="text" class="form-module form-create-adm-input me-lg-5 mb-4-input me-3-input" placeholder="Име на курс" aria-label="Име на курс" aria-describedby="addon-wrapping">
                    </div>
                </div>
                <div class="row g-0 mt-lg-3">
                    <div class="col form-app-position">
                        <select class="form-create-adm-input form-select-app me-lg-5 mb-4-input me-3-input" id="inputGroupSelect01">
                            <option selected>Тип курс</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="row g-0 mt-lg-3">
                    <div class="col form-app-position">
                        <select class="form-create-adm-input form-select-app me-lg-5 mb-4-input me-3-input" id="inputGroupSelect01">
                            <option selected disabled>Видимост на курса</option>
                            <option value="public">Публичен</option>
                            <option value="private">Скрит</option>
                        </select>
                    </div>
                </div>
                <div class="row g-0 mt-lg-3">
                    <div class="col-auto form-app-position">
                        <input type="text" class="form-module form-creat-input date-input me-lg-5 mb-4-input me-3-input me-2-input" readonly="true" onkeypress="return false" placeholder="Начало на кандидатстване (дата)">
                        <input type="text" class="form-module form-creat-input date-input mb-4-input" readonly="true" onkeypress="return false" placeholder="Край на кандидатстване (дата)">
                    </div>
                </div>
                <div class="row g-0 mt-lg-3">
                    <div class="col-auto form-app-position">
                        <input type="text" class="form-module form-creat-input date-input me-lg-5 mb-4-input me-3-input me-2-input" readonly="true" onkeypress="return false" placeholder="Начало на курс (дата)">
                        <input type="text" class="form-module form-creat-input date-input mb-4-input" readonly="true" onkeypress="return false" placeholder="Край на курс (дата)">
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col">
                        <div class="col form-app-position">
                            <textarea class="form-textarel form-create-adm-textarel mt-lg-3 me-lg-1 mb-4-input me-3-input" placeholder="Кратко описание"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-auto">
                <div class="row g-0 d-flex justify-content-end">
                    <div class="col-auto mt-3 d-none d-lg-block me-5 mt-3">
                        <button class="nav btn  btn-green active py-0 pe-2 d-flex btn1-cs mt-5" id="lection-1-tab" data-bs-toggle="tab" href="#" role="tab" aria-controls="lection-1" aria-selected="true">
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
                    <div class="col module-top">
                        <h1 class="text-uppercase create-lecturer">Добави Лектори</h1>
                        <input class="search-name-lectur mt-4 mb-3" type="search" placeholder="Име на лектор" aria-label="Search">
                        <div class="lectur-scrol">
                            <div class="d-flex flex-column bd-highlight mb-3">
                                <div class="p-2 bd-highlight">
                                    <div class="row g-0">
                                        <div class="col-auto me-5 mt-1">
                                            <input type="checkbox" class="checkbox" id="fruit1" name="fruit-1" value="Apple">
                                            <label for="fruit1"></label>
                                        </div>
                                        <div class="col me-5">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="student-name-modul mt-2">
                                                        <b>Ставри Георгиев</b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="p-2 bd-highlight">
                                    <div class="row g-0">
                                        <div class="col-auto me-5 mt-1">
                                            <input type="checkbox" class="checkbox" id="fruit2" name="fruit-2" value="Apple">
                                            <label for="fruit2"></label>
                                        </div>
                                        <div class="col me-5">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="student-name-modul mt-2">
                                                        <b>Ставри Георгиев</b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="p-2 bd-highlight">
                                    <div class="row g-0">
                                        <div class="col-auto me-5 mt-1">
                                            <input type="checkbox" class="checkbox" id="fruit3" name="fruit-3" value="Apple">
                                            <label for="fruit3"></label>
                                        </div>
                                        <div class="col me-5">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="student-name-modul mt-2">
                                                        <b>Ставри Георгиев</b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="p-2 bd-highlight">
                                    <div class="row g-0">
                                        <div class="col-auto me-5 mt-1">
                                            <input type="checkbox" class="checkbox" id="fruit4" name="fruit-4" value="Apple">
                                            <label for="fruit4"></label>
                                        </div>
                                        <div class="col me-5">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="student-name-modul mt-2">
                                                        <b>Ставри Георгиев</b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="p-2 bd-highlight">
                                    <div class="row g-0">
                                        <div class="col-auto me-5 mt-1">
                                            <input type="checkbox" class="checkbox" id="fruit5" name="fruit-5" value="Apple">
                                            <label for="fruit5"></label>
                                        </div>
                                        <div class="col me-5">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="student-name-modul mt-2">
                                                        <b>Ставри Георгиев</b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="p-2 bd-highlight">
                                    <div class="row g-0">
                                        <div class="col-auto me-5 mt-1">
                                            <input type="checkbox" class="checkbox" id="fruit6" name="fruit-6" value="Apple">
                                            <label for="fruit6"></label>
                                        </div>
                                        <div class="col me-5">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="student-name-modul mt-2">
                                                        <b>Ставри Георгиев</b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="p-2 bd-highlight">
                                    <div class="row g-0">
                                        <div class="col-auto me-5 mt-1">
                                            <input type="checkbox" class="checkbox" id="fruit7" name="fruit-7" value="Apple">
                                            <label for="fruit7"></label>
                                        </div>
                                        <div class="col me-5">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="student-name-modul mt-2">
                                                        <b>Ставри Георгиев</b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="p-2 bd-highlight">
                                    <div class="row g-0">
                                        <div class="col-auto me-5 mt-1">
                                            <input type="checkbox" class="checkbox" id="fruit8" name="fruit-8" value="Apple">
                                            <label for="fruit8"></label>
                                        </div>
                                        <div class="col me-5">
                                            <div class="row">
                                                <div class="col-auto">
                                                    <div class="student-name-modul mt-1">
                                                        <b>Ставри Георгиев</b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
@endsection
