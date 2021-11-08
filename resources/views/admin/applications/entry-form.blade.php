@extends('layouts.template')

@section('title', 'Форма за кандидатстване')

@section('head')
    <link href="{{ asset('css/applications.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <!-- Mobil -->
    <div class="col-auto d-lg-none">
        <div class="row card-mobil g-0 fw-normal mb-3">
            @include('user.application-left')
            <!-- right side -->
            <div id="right-side" class="col-xl pt-md-5 mt-md-4 tab-content edit-content">
                <!-- Single lection content -->
                <div class="tab-pane module-right fade show active mt-xl-2 pt-xl-1" id="lection-1" role="tabpanel" aria-labelledby="lection-1-tab">
                    <div class="tab-body-electronic position-relative">
                        <span class="close d-lg-none position-absolute">&times;</span>
                        <div class="row g-0 d-lg-none">
                            <div class="col">
                                <div class="text-title-module">
                                    <b>Електронна форма</b>
                                    <br>
                                    <p class="text-title-module-sm d-lg-none">{{ $applicationCourse ? $applicationCourse->name : null }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row g-0 d-flex justify-content-center">
                            <div class="col-auto d-lg-none mt-5 mb-5">
                                <img src="{{ asset('assets/img/Elektronna_forma.svg') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="text-uppercase text-normal ms-2 d-lg-none">
                                    <b>Кандидати:</b>
                                </div>
                            </div>
                        </div>
                        @include('admin.applications.partials.entry-form-scroll')
                    </div>
                </div>
                <!-- Single lection content END-->
            </div>
            <!-- right side END -->
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('.modal-backdrop').removeClass('modal-backdrop')
    </script>
    <script src="{{ asset('js/application/application-form-text-counter.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/application/validation-form.js') }}" charset="utf-8"></script>
@endpush
