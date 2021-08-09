@extends('layouts.home')
@section('title', 'Домашни - ' . $lection->title)
@section('content')
<!-- main content -->
<div class="col ps-lg-4">
    <div class="main pt-lg-5 px-xxl-5 px-lg-4">
        <!-- flash-message -->
		@include('flash-message')
        <!-- header section -->
        <div class="hw-section-header row align-items-center g-0">
            <div class="col-auto d-lg-none d-block me-4">
                <a href="{{ asset('module/' . $lection->course_modules_id . '/edit') }}">
                    <img src="{{ asset('assets/img/arrow.svg') }}" class="me-1">
                </a>
            </div>
            <div class="col">
                <div class="row g-0 align-items-center">
                    <div class="col-lg-auto text-xxl text-lg-uppercase fw-bold pe-lg-2 me-lg-1">
                        Домашни({{ $homeworks->count() }})
                    </div>
                    <div class="line-straight col-auto border d-lg-block d-none my-3 align-self-stretch mx-4"></div>
                    <div class="col-lg-auto text-large ps-lg-2">
                        {{ $lection->title }}
                    </div>
                </div>
            </div>
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
            <div class="col-lg-auto pb-lg-0 pb-4 mb-lg-0 mb-3 mt-lg-0 mt-2">
                <div class="row g-0">
                    <div class="col-lg-auto pe-lg-5">
                        <span class="text-small">Краен срок за домашно: </span>
                        <span class="text-normal text-orange">
                            {{ $lection->homework_end ? $lection->homework_end->format('d.m') : 'Няма' }}
                        </span>
                    </div>
                    <div class="col-lg-auto ps-lg-2">
                        <span class="text-small">Краен срок за проверка:</span>
                        <span class="text-normal text-orange">
                            {{ $lection->homework_check_end ? $lection->homework_check_end->format('d.m') : 'Няма' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- header section END-->
        <!-- table section -->
        <div class="table-grid text-normal" id="myUL">
            <!-- table header -->
            <div class="row d-lg-flex d-none g-0 text-blue-grey pt-lg-5">
                <div class="col-lg-auto number">
                    No
                </div>
                <div class="col student-name px-lg-5">
                    Име
                </div>
                <div class="col file">
                    Файл
                </div>
                <div class="col comments">
                    Коментари
                </div>
                <div class="col date">
                    Дата/Час
                </div>
                <div class="col-lg-auto settings">

                </div>
            </div>
            <!-- table header END-->
            <!-- table content-->
            @foreach($homeworks as $homework)
            <div class="filter row g-0 align-items-center">
                <div class="col-lg-auto d-lg-block d-none number text-center">
                    {{ $loop->iteration }}
                </div>
                <div class="col-lg col-6 student-name px-lg-5" title="{{ $homework->user->email }}">
                    <span class="d-lg-none">1.</span>
                    <span>
                        {{ $homework->user->name }} {{ $homework->user->last_name }}
                    </span>
                </div>
                <div class="col-lg col-auto mx-lg-0 ms-auto file fw-normal">
                    <label for="file-1">
                        <div class="row g-0 align-items-center">
                            <div class="col-auto text-small fw-normal pe-4">
                                <a href="{{ asset('/data/homeworks/'.$homework->file) }}">
                                    Файл
                                </a>
                            </div>
                            <div class="col-auto ps-1">
                                <a class="download-homeworks" data-name="{{$homework->user->name.'_'.$homework->user->last_name.'_['.$homework->created_at.']_'.$lection->title}}" href="{{ asset('/data/homeworks/'.$homework->file) }}" download style="color:#00F">
                                    <img src="{{ asset('assets/img/download.svg') }}">
                                </a>
                            </div>
                        </div>
                    </label>
                </div>
                <div class="col-lg col-6 comments pt-lg-0 pt-4 mt-lg-0 mt-2">
                    <button class="btn-comments">
                        <a href="{{ $homework->Comments->count() ? asset('lection/homework/' . $homework->id . '/coments') : '' }}">
                            <div class="row g-0" style="color: white;">
                                <div class="col text-start">
                                    {{ $homework->Comments->count() }}
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                        </a>
                    </button>
                </div>
                <div class="col-lg col-auto ms-lg-0 ms-auto date fw-normal pt-lg-0 pt-4 mt-lg-0 mt-2">
                    {{ $homework->created_at->format('d.m H:i') }}
                </div>
                @foreach ($homework->Comments as $comment)
                    @if ($comment->user_id == Auth::user()->id)
                        @php
                            $validComment = true;
                        @endphp
                        @break
                    @endif
                @endforeach

                @if (isset($validComment) && $validComment)
                    <div class="col-lg-auto col-sm-5 settings pt-lg-0 pt-4 mt-lg-0 mt-2">
                        <button class="btn-edit edit-comment" data-comment-id="{{ $homework->id }}">
                            <div class="row g-0 align-items-center">
                                <div class="col text-start text-small">
                                    Редактирай коментар
                                </div>
                                <div class="col-auto">
                                    <img src="{{ asset('assets/img/action_icon _black.svg') }}">
                                </div>
                            </div>
                        </button>
                    </div>
                @else
                    <div class="col-lg-auto col-sm-5 settings pt-lg-0 pt-4 mt-lg-0 mt-2">
                        <button class="btn-green btn-edit edit-comment" data-comment-id="{{ $homework->id }}">
                            <div class="row g-0 align-items-center">
                                <div class="col text-start text-small">
                                    Остави коментар
                                </div>
                                <div class="col-auto">
                                    <img src="{{ asset('assets/img/action_icon.svg') }}">
                                </div>
                            </div>
                        </button>
                    </div>
                @endif
                @php
                    $validComment = null;
                @endphp

                @include('course.module.lections.homework-comments.edit')
            </div>
            @endforeach
            <!-- table content END-->
        </div>
        <!-- table section END-->
    </div>
</div>
<!-- main content END-->

<script src="{{ asset('js/lection/homework.js') }}"></script>

<script>
$(document).ready(function() {
    $('.edit-comment').click(function() {
        var commentId = $(this).attr('data-comment-id');
        var commentTextarea = '#comment-edit-textarea-' + commentId;
        var btnSaveComment = '#btn-edit-comment-' + commentId;
        $(commentTextarea).toggle();
        $(btnSaveComment).toggle();
    });
});
</script>
@endsection
