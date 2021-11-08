@extends('layouts.home')

@push('head')
    <link href="{{ asset('css/profile/user-profile.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('title', 'Моят Профил')

@section('content')
    <div class="col-xl d-none d-lg-block pt-md-5 mt-md-4 tab-content edit-content-admin">
{{--        <div style="margin-left:10%; background-color: white; width: 940px; border-radius: 30px; padding: 60px;">--}}
{{--            <div class="row">--}}
{{--                <div class="col-8 text-normal">--}}
{{--                    <h2>Александрина Иванова</h2>--}}
{{--                </div>--}}

{{--                <div class="col-4">--}}
{{--                    <img src="https://ui-avatars.com/api/?name=Admin Admin&amp;color=7F9CF5&amp;background=random" alt="profile-pic" style="border-radius: 5px; float: right; width: 100px" class="avatar">--}}
{{--                </div>--}}
{{--                <div class="col-8">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col">0888888888</div>--}}
{{--                        <div class="col">email@email.email</div>--}}
{{--                        <div class="col">Враца</div>--}}
{{--                        <div class="col">https:/site.com</div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row mt-5">--}}
{{--                <div class="col-6">--}}
{{--                    <div class="col">--}}
{{--                        <p class="fw-bold bio-title">Образование</p>--}}
{{--                        <div class="row g-0">--}}
{{--                            <div class="col-auto pe-3 fw-bold item-number"><i class="fas fa-school"></i></div>--}}
{{--                            <div class="col mb-3 bio-description">--}}
{{--                                ВУ Училище--}}
{{--                            </div>--}}
{{--                            <div class="w-100"></div>--}}
{{--                            <div class="col-auto pe-3 mb-3 fw-bold item-number"><i class="fas fa-graduation-cap"></i></div>--}}
{{--                            <div class="col bio-description">--}}
{{--                                Спец--}}
{{--                            </div>--}}
{{--                            <div class="w-100"></div>--}}
{{--                            <div class="col-auto pe-3 fw-bold item-number"><i class="far fa-calendar"></i></div>--}}
{{--                            <div class="col mb-3 bio-description">--}}
{{--                                1950 - 2000--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-6">--}}
{{--                    <p class="fw-bold bio-title">Работен опит</p>--}}
{{--                    <div class="row g-0">--}}
{{--                        <div class="col-auto pe-3 fw-bold item-number"><i class="fas fa-briefcase"></i></div>--}}
{{--                        <div class="col mb-3 bio-description">Developer</div>--}}
{{--                        <div class="w-100"></div>--}}
{{--                        <div class="col-auto pe-3 mb-3 fw-bold item-number"><i class="fas fa-building"></i></div>--}}
{{--                        <div class="col bio-description">--}}
{{--                            Vola Software</div>--}}
{{--                        <div class="w-100"></div>--}}
{{--                        <div class="col-auto pe-3 fw-bold item-number"><i class="far fa-calendar"></i></div>--}}
{{--                        <div class="col mb-3 bio-description">--}}
{{--                            2019 - В ход--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
@endsection
