@extends('layouts.home')

@section('title', 'Домашно Коментари')

@push('head')
    <link href="{{ asset('css/lection/homework.css') }}" rel="stylesheet" />
@endpush

@section('content')
<!-- main content -->
<div class="col-lg col-12 ps-lg-4 overflow-hidden">
    <div class="pt-lg-5 px-xxl-5 px-lg-4">
        <!-- header section -->
        @php
            if (Auth::user()->isStudent()) {
                Request::session()->flash('lectionId', $lection->id);
            }
        @endphp
        <div class="hw-section-header row align-items-center g-0">
            <div class="col-auto me-4 nav-dot">
                <a href="{{ Auth::user()->isLecturer() || Auth::user()->isAdmin() ? route('homeworks.show', $lection->id) : route('user.module.lections', $lection->course_modules_id) }}">
                    <img src="{{ asset('assets/img/arrow.svg') }}" class="me-1" style="margin-left: 12px!important; margin-top: 10px!important;">
                </a>
            </div>
            <div class="col">
                <div class="row g-0 align-items-center">
                    <div class="col-lg-auto text-xxl text-lg-uppercase fw-bold pe-lg-2 me-lg-1">
                        Коментари ({{ $studentComments->count() + $lecturerComments->count() }})
                    </div>
                    @if(!is_null($homework->evaluation_points))
                        <div class="col-6" style="text-align: right!important;">
                            <b>Точки от домашното: {{ $homework->evaluation_points }}/10</b>
                        </div>
                    @endif
                </div>
            </div>
            @if (Auth::user()->isLecturer() || Auth::user()->isAdmin())
                <div class="col-auto d-lg-none">
                    <span id="search-homework-user-btn">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
                <div class="tab-body position-relative d-lg-none mt-4" id="search-homework-user-input" style="display: none">
                    <div class="col-md-auto pe-md-3 me-xl-1">
                        <div class="position-relative calendar d-flex justify-content-center">
                            <input type="text" id="myInput" onkeyup="search()" placeholder="Търси по име" style="width: 270px; height: 50px">
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="text-normal comments-table pt-lg-5 mt-4"></div>
            <!-- header section END -->
            @if ($studentComments->count() || $lecturerComments->count())
                <!-- table section -->
                @include('course.module.lections.homework-comments.comments', [
                    'comments' => $lecturerComments,
                ])

                @include('course.module.lections.homework-comments.comments', [
                    'comments' => $studentComments,
                ])
                <!-- table section END -->
            @else
                <h5>Това домашно все още няма коментари!</h5>
            @endif
        </div>
    </div>

    <script src="{{ asset('js/lection/homework.js') }}"></script>
    <!-- main content END-->
@endsection
