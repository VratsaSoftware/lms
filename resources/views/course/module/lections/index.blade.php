@extends('layouts.template')

@section('title', 'Курс „' . $module->Course->name . '“ Лекции')

@section('head')
    <link href="{{ asset('css/lection/lection.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- left side -->
    <div class="col-xl-auto col ps-xxl-0 ps-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="row g-0 pb-lg-4 mb-lg-3">
                    <div class="col pt-lg-0 pt-2 mt-lg-0 mt-1">
                        <h2 class="card-title m-0">
                            {{ $module->Course->name }}
                        </h2>
                    </div>
                    @include('course.module.partials.course-edit-modal')
                </div>
                <!-- Nav tabs -->
                <nav>
                    <div class="nav nav-tabs row align-items-center g-0 mb-4 p-sm-0 pt-3 pb-4">
                        @foreach ($allModules as $moduleNav)
                            @if (!Auth::user()->isStudent())
                                <a class="tooltip-popup nav-link col-auto ps-0 @if ($module->id == $moduleNav->id) active @endif d-sm-block d-none" href="{{ asset('module/' . $moduleNav->id) }}" aria-controls="module-1" aria-selected="true">
                                    М{{ $loop->iteration }}
                                    <span class="tooltiptext">
                                        {{ $moduleNav->name }}
                                    </span>
                                </a>
                            @else
                                <a class="tooltip-popup nav-link col-auto ps-0 @if ($module->id == $moduleNav->id) active @endif d-sm-block d-none" href="{{ route('user.module.lections', $moduleNav->id) }}" aria-controls="module-1" aria-selected="true" style="padding: .2rem 1rem;">
                                    Модул {{ $loop->iteration }}
                                    <span class="tooltiptext">
                                        {{ $moduleNav->name }}
                                    </span>
                                </a>
                            @endif
                        @endforeach

                        <div class="col d-sm-none">
                            <div class="position-relative d-inline-block">
                                <select class="border-0 form-control text-small text-green position-relative ps-0 py-0" id="tab_selector" style="width: 130px;">
                                    @foreach ($allModules as $moduleNav)
                                        @if (!Auth::user()->isStudent())
                                            <option value="{{ asset('module/' . $moduleNav->id) }}" @if ($module->id == $moduleNav->id) selected @endif>{{ $moduleNav->name }}</option>
                                        @else
                                            <option value="{{ route('user.module.lections', $moduleNav->id) }}" @if ($module->id == $moduleNav->id) selected @endif>{{ $moduleNav->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <img src="{{ asset('assets/img/arrow.svg') }}" class="position-absolute">
                            </div>
                        </div>
                        @if (!Auth::user()->isStudent())
                            <button class="col border-0 active add text-end align-self-end pb-lg-2 text-small module-create-btn" data-bs-toggle="tab" href="#lection-module" role="tab" aria-controls="lection-1" aria-selected="true">
                                <span class="me-2"><img src="{{ asset('assets/img/plus.svg') }}"></span>
                                Добави модул
                            </button>
                        @endif
                    </div>
                </nav>
                <div class="tab-content pt-lg-2">
                    <!--First tab-->
                    <div class="tab-pane fade show active" id="module-1" role="tabpanel" aria-labelledby="module-1-tab">
                        @if (Auth::user()->isLecturer() || Auth::user()->isAdmin())
                            <div class="row g-0 pb-4 mb-2">
                                <div class="col-xxl col-xl-12 col-sm d-flex justify-content-start">
                                    <button form="delete-module-form" id="delete-module-btn" class="btn-edit row g-0 align-items-center mb-0">
                                        <div class="col text-start">Изтрий модул</div>
                                        <div class="col-auto">
                                            <img src="{{ asset('assets/img/Delete.svg') }}">
                                        </div>
                                    </button>
                                </div>
                                <div class="nav active col-xxl col-xl-12 col-sm ms-xxl-3 ms-xl-0 ms-sm-3 d-flex justify-content-end">
                                    <button class="ms-xxl-2 mt-xxl-0 mt-xl-4 mt-sm-0 mt-4 mb-0 btn-edit row g-0 align-items-center module-edit-btn" data-bs-toggle="tab" href="#lection-module" role="tab" aria-selected="true">
                                        <div class="col text-start">Редактирай модул</div>
                                        <div class="col-auto">
                                            <img src="{{ asset('assets/img/edit.svg') }}">
                                        </div>
                                    </button>
                                </div>
                            </div>
                        @endif
                        <div class="row g-0 pb-4 mb-lg-0 mb-1 pt-lg-0 pt-1">
                            <div class="col pe-lg-0 pe-4 me-xxl-3">
                                <span class="text-normal">
                                    Начало:
                                </span>
                                <span class="text-small pt-lg-0 pt-2 mt-lg-0 mt-1 d-inline-block">{{ $module->starts->format('d.m.Y') }}</span>
                            </div>
                            <div class="col-xxl-auto col">
                                <span class="text-normal" style="margin-left: 150px;">
                                    Край:
                                </span>
                                <span class="text-small pt-lg-0 pt-2 mt-lg-0 mt-1 d-inline-block">{{ $module->ends->format('d.m.Y') }}</span>
                            </div>
                        </div>
                        <!-- <div class="row g-0 pb-3">
                            <div class="col pb-lg-0 pb-2">
                                <span class="text-normal">
                                    Оценка:
                                </span>
                            </div>
                        </div> -->
                        <!-- Scroll section-->
                        <div class="lectures">
                            <div class="fw-bold text-warm-grey text-small text-uppercase py-lg-4 pb-3 pt-4 my-lg-0 my-1">
                                Учебна програма
                                @if (Auth::user()->isLecturer() || Auth::user()->isAdmin())
                                    <button class="nav active py-0 pe-2 d-flex add-lection-button" data-bs-toggle="tab" href="#lection-create" role="tab" aria-controls="lection-1" aria-selected="true" style="float: right; color: #000; border: 0px;">
                                        <span class="me-2"><img src="{{ asset('assets/img/plus.svg') }}"></span>
                                        Добави лекция
                                    </button>
                                @endif
                            </div>
                            <!-- Accordion sections  -->
                            @include('course.module.lections.lection-box')
                        </div>
                        <!-- Scroll section END-->
                    </div>
                    <!--First tab END-->
                    <!--Second tab -->
                    <div class="tab-pane fade" id="module-2" role="tabpanel" aria-labelledby="module-2-tab"></div>
                    <!--Second tab END-->
                    <div class="tab-pane fade" id="module-3" role="tabpanel" aria-labelledby="module-3-tab"></div>
                </div>
                <!-- Nav tabs END-->
            </div>
        </div>
    </div>
    <!-- left side END -->
    </div>
    </div>
    <!-- right side -->
    <div id="right-side" data-countLections="{{ count($lections) }}" class="col-xl pt-md-5 mt-md-4 tab-content edit-content">
        @include('flash-message')
        @if (Auth::user()->isLecturer() || Auth::user()->isAdmin())
            @if ($lections->count() == 0)
                <div class="tab-pane fade show active mt-xl-2 pt-xl-1 right-part" id="lection-1" role="tabpanel" aria-labelledby="lection-2-tab">
                    <!-- create lection -->
                    <span class="add-lection">
                        @include('course.module.lections.create')
                    </span>
                    <!-- edit module -->
                    <span class="module-edit" style="display: none">
                        @include('course.module.partials.edit')
                    </span>
                    <!-- create module -->
                    <span class="module-create" style="display: none">
                        @include('course.module.partials.create')
                    </span>
                </div>
            @else
                @foreach ($lections as $lection)
                    <div class="tab-pane fade {{ Session::get('lectionId') == $lection->id ? 'show active' : (!Session::get('lectionId') && $loop->first ? 'show active' : null) }} mt-xl-2 pt-xl-1 right-part" id="lection-{{ $loop->iteration }}" role="tabpanel" aria-labelledby="lection-2-tab">
                        <!-- show lection -->
                        <span class="show-lection" style="display: none">
                            @include('course.module.lections.show')
                        </span>
                        <!-- edit lection -->
                        <span class="edit-lection" style="display: none">
                            @include('course.module.lections.edit')
                        </span>
                    </div>

                    <form method="post" id="delete-lection-form-{{ $loop->iteration }}" action="{{ route('lection.destroy', $lection->id) }}">
                        @csrf
                        @method('DELETE')
                    </form>
                @endforeach
                <div class="tab-pane fade show active mt-xl-2 pt-xl-1 right-part" id="lection-module" role="tabpanel">
                    <!-- edit module -->
                    <span class="module-edit" style="display: none">
                        @include('course.module.partials.edit')
                    </span>
                    <!-- create module -->
                    <span class="module-create" style="display: none">
                        @include('course.module.partials.create')
                    </span>
                </div>

                <div class="tab-pane fade show active mt-xl-2 pt-xl-1 right-part" id="lection-create" role="tabpanel" aria-labelledby="lection-2-tab">
                    <!-- create lection -->
                    <span class="add-lection" style="display: none">
                        @include('course.module.lections.create')
                    </span>
                </div>
            @endif
        @else
            @foreach ($lections as $lection)
                @include('course.module.lections.student.lections')
            @endforeach
            <!-- Еvaluate Modal -->
            @include('course.module.lections.student.partials.evaluate-modal')
            <!-- Еvaluate Modal End -->
        @endif
    </div>
    <!-- right side END -->
    </div>

    <!-- Modal - Module info -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Информация
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-info-modul">
                    Lorem ipsum dolor sit amet, consectetuer
                    adipiscing elit, sed diam nonummy nibh euismod
                </div>
            </div>
        </div>
    </div>
    <!-- END Modal -->

    <form id="delete-module-form" action="{{ route('module.destroy', $module->id) }}" method="POST">
        {{ method_field('DELETE') }}
        @csrf
    </form>

    @php
        $firstLectionVideoUrls = \App\Services\LectionServices::lectionVideo($lections, Session::get('lectionId'));
    @endphp

    <input type="hidden" name="firstLectionId" id="firstLectionId" value="{{ Session::get('lectionId') ? Session::get('lectionId') : (isset($lections[0]) ? $lections[0]->id : null) }}">
    <input type="hidden" name="firstLectionVideoUrl" id="firstLectionVideos" value="{{ $firstLectionVideoUrls }}">
@endsection

@push('scripts')
    <script src="{{ asset('js/lection/lection.js') }}"></script>
    <script src="{{ asset('js/lection/create.js') }}"></script>
    <script src="{{ asset('js/lection/validation.js') }}"></script>
    <script src="{{ asset('js/lection/show-video.js') }}"></script>
    <script src="{{ asset('js/course/module.js') }}"></script>
@endpush
