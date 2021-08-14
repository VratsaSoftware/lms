@extends('layouts.home')
@section('title', 'Домашно Коментари')
@section('content')
<!-- main content -->
<div class="col-lg col-12 ps-lg-4 overflow-hidden">
    <div class="pt-lg-5 px-xxl-5 px-lg-4">
        <!-- header section -->
        <div class="hw-section-header row align-items-center g-0">
            <div class="col-auto d-lg-none d-block me-4">
                <a href="@if (Auth::user()->isLecturer() || Auth::user()->isAdmin()){{ url($studentComments->count() ? '/lection/' . $studentComments[0]->Homework->lection_id . '/homeworks' : '/lection/' . $lecturerComments[0]->Homework->lection_id . '/homeworks') }} @else {{ asset('myProfile') }} @endif">
                    <img src="{{ asset('assets/img/arrow.svg') }}" class="me-1">
                </a>
            </div>
            <div class="col">
                <div class="row g-0 align-items-center">
                    <div class="col-lg-auto text-xxl text-lg-uppercase fw-bold pe-lg-2 me-lg-1">
                        Коментари({{ $studentComments->count() + $lecturerComments->count() }})
                    </div>
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
                            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Търси по име" style="width: 270px; height: 50px">
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="text-normal comments-table pt-lg-5 mt-4"></div>
        <!-- header section END -->
        <!-- table section -->
        @include('course.module.lections.homework-comments.comments', [
            'comments' => $lecturerComments,
        ])

        @include('course.module.lections.homework-comments.comments', [
            'comments' => $studentComments,
        ])
        <!-- table section END -->
    </div>
</div>

<script src="{{ asset('js/lection/homework.js') }}"></script>
<!-- main content END-->
@endsection
