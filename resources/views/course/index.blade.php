@extends('layouts.template')

@section('title', 'Курсове')

@section('head')
    <link href="{{ asset('css/course/index.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!--Mobil-->
    <div class="d-lg-none row g-0">
        <div class="row ms-1 mb-3">
            <div class="col-2 mt-2 text-xxl text-uppercase fw-bold me-5">КУРСОВЕ</div>
            <div class="col-7 ms-4">
                <div class=" d-flex justify-content-center">
                    <button class="ms-xxl-2 mt-xxl-0 btn-edit btn-admin-2 btn-green row g-0 align-items-center" onclick="window.location.href='{{ route('course.create') }}'">
                        <div class="col text-start fw-bold">Създай</div>
                        <div class="col-3">
                            <img src="{{ asset('assets/img/action_icon.svg') }}" alt="">
                        </div>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-auto text-xxl ms-4 text-lg-uppercase text-uppercase fw-bold pe-lg-2 me-lg-1 text-navy-blue mt-3">
            АКТУАЛНИ
        </div>
        <div class="row g-0">
            <div class="col d-flex flex-nowrap mobile-courses">
                <!-- Courses -->
                @include('course.partials.course-card', [
                    'courses' => $courses,
                    'status' => 'Активен',
                    'resolution' => 'mobile',
                ])
                <!-- End courses -->
            </div>
        </div>
        <div class="col-lg-auto text-xxl ms-4 text-lg-uppercase text-uppercase fw-bold pe-lg-2 me-lg-1 text-warm-grey mt-1">
            ПРЕДСТОЯЩИ
        </div>
        <div class="row g-0">
            <div class="col d-flex flex-nowrap mobile-courses">
                <!-- Courses -->
                @include('course.partials.course-card', [
                    'courses' => $newCourses,
                    'status' => 'Предстоящ',
                    'resolution' => 'mobile',
                ])
                <!-- End courses -->
            </div>
        </div>
        <div class="col-lg-auto text-xxl ms-4 text-lg-uppercase text-uppercase fw-bold pe-lg-2 me-lg-1 text-warm-grey mt-1">
            ИЗМИНАЛИ
        </div>
        <div class="row g-0">
            <div class="col d-flex flex-nowrap mobile-courses">
                <!-- Courses -->
                @include('course.partials.course-card', [
                    'courses' => $pastCourses,
                    'status' => 'Отминал',
                    'resolution' => 'mobile',
                ])
                <!-- End courses -->
            </div>
        </div>
    </div>
    <!-- end mobil-->
    <!-- right side -->
    <div class="col-xl d-none d-lg-block pt-md-5 mt-md-4 tab-content edit-content-admin" style="width: 30%!important;" id="elements-container">
        <!-- Single lection content -->
        <div class="row g-0">
            <div class="col"><h1 class="admin-text-2 title-text text-uppercase mb-5">
                Курсове
            </h1>
            </div>
            <div class="col">
                <div class="d-flex justify-content-center px-5">
                    <div class="search">
                        <input type="text" id="search" onkeyup="search()" class="search-input text-warm-grey fw-bold" placeholder="Потърси курс" name="">
                        <span class="search-icon"><i class="fa fa-search" aria-hidden="true"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col btn-ceate-curse">
                <button class="btn-edit btn-green row g-0 align-items-center" onclick="window.location.href='{{ route('course.create') }}'">
                    <div class="col text-start fw-bold">СЪЗДАЙ КУРС</div>
                    <div class="col-auto">
                        <img  src="{{ asset('assets/img/action_icon.svg') }}" alt="">
                    </div>
                </button>
            </div>
        </div>
        <div>
            <h3 class="admin-text-2 title-text fw-bold text-uppercase">
                Актуални
            </h3>
        </div>
        <div class="row g-0">
            <div class="col d-flex flex-nowrap admin-course">
                <!-- Courses -->
                @include('course.partials.course-card', [
                    'courses' => $courses,
                    'status' => 'Активен',
                    'resolution' => 'desktop',
                ])
                <!-- End courses -->
            </div>
        </div>
        <div>
            <h3 class="admin-text-2 title-text text-uppercase fw-bold text-warm-grey">
                Предстоящи
            </h3>
        </div>
        <div class="row g-0">
            <div class="col d-flex flex-nowrap admin-course">
                <!-- Courses -->
                @include('course.partials.course-card', [
                    'courses' => $newCourses,
                    'status' => 'Предстоящ',
                    'resolution' => 'desktop',
                ])
                <!-- End courses -->
            </div>
        </div>
        <div>
            <h3 class="fw-bold title-text text-uppercase text-warm-grey mb-1">
                Изминали
            </h3>
        </div>
        <div class="row g-0">
            <div class="col d-flex flex-nowrap admin-course">
                <!-- Courses -->
                @include('course.partials.course-card', [
                    'courses' => $pastCourses,
                    'status' => 'Отминал',
                    'resolution' => 'desktop',
                ])
                <!-- End courses -->
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/course/filter.js') }}"></script>
@endpush
