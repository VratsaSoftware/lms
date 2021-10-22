<div class="col-lg-auto col-12 comment-avatar">
    <div class="row g-0 align-items-center">
        <div class="col fw-bold card-title-application-mobil">
            <b>{{ $applicationCourse ? $applicationCourse->name : 'Кандидатстване' }}</b>
        </div>
        <div class="col-auto me-4">
            <img src="{{ asset('assets/img/Design.svg') }}" alt="" class="img-design">
        </div>
    </div>
    @if ($applicationCourse)
        <div class="row g-0 mt-4">
            <div class="col pe-lg-0 pe-4 me-xxl-3">
                <span class="text-small">
                    <b>Начало:</b>
                </span>
                <br>
                <span class="text-small pt-lg-0 pt-2 mt-lg-0 mt-1 d-inline-block">
                    {{ $applicationCourse->starts->format('d.m.Y') }}
                </span>
            </div>
            <div class="col-xxl-auto col">
                <span class="text-small">
                    <b>Продължителност:</b>
                </span>
                <br>
                <span class="text-small pt-lg-0 pt-2 mt-lg-0 mt-1 d-inline-block">
                    {{ $applicationCourse->ends->format('d.m.Y') }}
                </span>
            </div>
        </div>
    @endif
</div>
@if ($applicationCourse)
    <div class="col-lg col-12 d-flex overflow-hidden">
        <div class="d-inline-block text-small align-self-center comment-text position-relative px-lg-5 me-lg-4 py-2">
            <div class="row g-0 mt-4">
                <div class="col-xxl-auto col mt-5">
                    <span class="text-small d-inline-block">
                        <b>Описание</b>
                    </span>
                    <br>
                    <span class="text-small mt-4 d-inline-block">
                        {{ $applicationCourse->description }}
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col d-flex justify-content-center">
        <button class="btn-edit comment-toggler btn-white btn-top-mobil row g-0">
            <div class="col text-btn-sm fw-bold">Виж повече</div>
            <div class="col-auto ms-4">
                <img src="{{ asset('assets/img/arrow-right-blue.svg') }}">
            </div>
        </button>
    </div>
@else
    <div class="col d-flex justify-content-center mt-3 mb-3">
        Това е първата стъпка при кандидатстване. След кандидатстването си  ще може да следите прогреса на кандидатстване от този профил.
    </div>
@endif
</div>
<div class="row g-0 mt-4 ms-3 d-flex justify-content-center">
<div class="col-auto mt-5 me-3">
    <div class="card-small-mobil">
        <!-- <img style="border-radius:100%" src="https://loremflickr.com/50/50" class="electro-avatar-img"> -->
        @include ('profile.partials.user-picture', [
            'user' => Auth::user(),
            'style' => 'border-radius: 100%; width: 35px; height: 35px; margin-left: -15px; margin-top: 15px',
            'class' => 'electro-avatar-img',
        ])
    </div>
</div>
<div class="col-auto ms-3 mt-5">
    <button class="nav btn btn-green btn-mobile active py-0 pe-2 d-flex" id="lection-1-tab" data-bs-toggle="tab" href="#lection-1" role="tab" aria-controls="lection-1" aria-selected="true">
        <div class="text-kermit-green text-priem-sm-mobil pb-2">
            <b class="pe-3 text-priem-xl-mobil">1.</b>
            <b class="text-navy-blue">Електронна
                <br>
                форма
            </b>
        </div>
    </button>
    <div class="text-kermit-green text-priem-sm-mobil pb-2">
        <b class="pe-3 text-priem-xl-mobil">2.</b>
        <b>Предварителен
            <br>
            тест</b>
        </div>
        <div class="text-kermit-green text-priem-sm-mobil pb-2">
            <b class="pe-3 text-priem-xl-mobil">3.</b>
            <b>Самостоятелна
                <br>
                задача</b>
            </div>
            <div class="text-kermit-green text-priem-sm-mobil pb-2">
                <b class="pe-3 text-priem-xl-mobil">4.</b>
                <b>Интервю</b>
            </div>
            <div class="text-navy-blue text-priem-sm-mobil">
                <b class="pe-3 text-priem-xl-mobil">5.</b>
                <a href="#" class="text-navy-blue text-priem-sm-mobil"><b>Прием</b></a>
            </div>
        </div>
        <div class="col-auto d-none d-lg-block">
            <div class="card-mini">
                <img src="{{ asset('assets/img/Elektronna_forma.svg') }}" class="priem-img">
            </div>
        </div>
        <div class="col-auto mt-5 ms-5">
            <button class="nav btn btn-green btn-mobile active py-0 pe-2 d-flex" id="lection-1-tab" data-bs-toggle="tab" href="#lection-1" role="tab" aria-controls="lection-1" aria-selected="true">
                <img src="{{ asset('assets/img/action_icon2.svg') }}">
            </button>
        </div>
    </div>
</div>
<!-- Mobil END-->
<!-- left side -->
<div class="col-xl-auto col ps-xxl-0 ps-lg-4 d-none d-lg-block">
    <div class="card">
        <div class="card-body-application">
            <div class="row g-0 pb-lg-4 mb-lg-3">
                <div class="col pt-lg-0 pt-2 mt-lg-0 mt-1">
                    <h2 class="card-title-application text-uppercase m-0">
                        {{ $applicationCourse ? $applicationCourse->name : 'Кандидатстване' }}
                    </h2>
                </div>
                <div class="col-auto">
                    <img src="{{ asset('assets/img/Design.svg') }}" class="img-design">
                </div>
            </div>
            <div class="tab-content pt-lg-2">
                <!--First tab-->
                <div class="tab-pane fade show active" id="module-1" role="tabpanel" aria-labelledby="module-1-tab">
                    @if ($applicationCourse)
                        <div class="row g-0 pb-4 mb-lg-0 mb-1 pt-lg-0 pt-1">
                            <div class="col-auto pe-5 me-5">
                                <div class="text-normal">
                                    Начало:
                                </div>
                                <br>
                                <div class="text-small pt-lg-0 pt-2 mt-lg-0 mt-1 d-inline-block">
                                    {{ $applicationCourse->starts->format('d.m.Y') }}
                                </div>
                            </div>
                            <div class="col">
                                <div class="text-normal">
                                    Продължителност до:
                                </div>
                                <br>
                                <div class="text-small pt-lg-0 pt-2 mt-lg-0 mt-1 d-inline-block">
                                    {{ $applicationCourse->ends->format('d.m.Y') }}
                                </div>
                            </div>
                        </div>
                        <div class="row g-0 mt-5">
                            <div class="col-10">
                                <div class="text-normal">
                                    Описание
                                </div>
                                <div class="mt-3 text-grey">
                                    {{ $applicationCourse->description }}
                                </div>
                            </div>
                        </div>
                    @else
                        Това е първата стъпка при кандидатстване. След кандидатстването си  ще може да следите прогреса на кандидатстване от този профил.
                    @endif
                    <div class="row g-0 mt-4">
                        <div class="col-auto mt-5 me-3">
                            <div class="card-small-electro">
                                @include ('profile.partials.user-picture', [
                                    'user' => Auth::user(),
                                    'style' => 'border-radius: 100%; width: 35px; height: 35px; margin-left: -15px; margin-top: 5px',
                                    'class' => 'electro-avatar-img',
                                ])
                            </div>
                        </div>
                        <div class="col-auto ms-3 mt-5">
                            <div class="text-kermit-green text-priem-sm pb-2">
                                <b class="pe-3 text-priem-xl">1.</b>
                                <b>Електронна форма</b>
                            </div>
                            <div class="text-grey text-priem-sm pb-2">
                                <b class="pe-3 text-priem-xl">2.</b>
                                <b>Предварителен
                                    <br>
                                    тест</b>
                            </div>
                            <div class="text-grey text-priem-sm pb-2">
                                <b class="pe-3 text-priem-xl">3.</b>
                                <b>Самостоятелна
                                <br>
                                задача</b>
                            </div>
                            <div class="text-grey text-priem-sm pb-2">
                                <b class="pe-3 text-priem-xl">4.</b>
                                <b>Интервю</b>
                            </div>
                            <div class="text-grey text-priem-sm">
                                <b class="pe-3 text-priem-xl">5.</b>
                                <b>Прием</b>
                            </div>
                            </div>
                            <div class="col-auto d-none d-lg-block">
                                <div class="card-mini">
                                    <img src="{{ asset('assets/img/Elektronna_forma.svg') }}" class="priem-img">
                                </div>
                            </div>
                            </div>
                        </div>
                        <!--First tab END-->
                    </div>
                    <!-- Nav tabs END-->
                </div>
            </div>
        </div>
        <!-- left side END -->
    </div>
</div>
