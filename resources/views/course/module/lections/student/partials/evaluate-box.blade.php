@if (!\Carbon\Carbon::parse($lection->homework_end)->addDays(1)->gt(\Carbon\Carbon::now()))
    <div class="row g-0 ps-1">
        <div class="col d-lg-none">
            <button @if (($lection->homework_check_end && $lection->homework_check_end->addDays(1)->gt(\Carbon\Carbon::now())) || !$lection->homework_check_end)data-bs-toggle="modal" data-bs-target="#evaluateModal" data-lection-eval="{{ $lection->id }}"@endif class="nav btn active py-0 pe-2 d-flex w-100 btn2-mobil d-flex justify-content-center lection-eval" id="lection-1-tab" data-bs-toggle="tab" href="#" role="tab" aria-controls="lection-1" aria-selected="true">
                <div class="row g-0 align-self-center">
                    <div class="col-auto text-start text-evaluation"><b>Оцени домашни</b></div>
                    <div class="col-auto text-start ms-1 text-evaluation-number"><b>({{ $myHomework->evaluation_user }}/{{ $lection->HomeWorks->count() - 1 }})</b></div>
                    <div class="col-auto ms-3 text-data-yellow"><b>({{ $lection->homework_check_end ? 'до ' . $lection->homework_check_end->format('d.m') : 'без срок' }})</b></div>
                    @if (($lection->homework_check_end && $lection->homework_check_end->addDays(1)->gt(\Carbon\Carbon::now())) || !$lection->homework_check_end)
                        <div class="col align-items-center d-flex img-btn-ms">
                            <img src="{{ asset('assets/img/action_icon _black.svg') }}">
                        </div>
                    @endif
                </div>
            </button>
        </div>
    </div>
    <div class="row g-0 uploaded-home-2 align-items-center p-3 mt-4 mb-lg-5">
        <div class="col ps-3 text-uploaded-home text-uppercase text-navy-blue d-none d-lg-block">
            ОЦЕНИ ДОМАШНО <b class="text-orange ps-2">({{ $myHomework->evaluation_user }}/{{ $lection->HomeWorks->count() - 1 }})</b>
        </div>
        <div class="col d-none d-lg-block">
            <div class="row">
                <div class="col-auto">
                    <img src="{{ asset('assets/img/bell.svg') }}" class="bell-img">
                </div>
                <div class="col d-none d-lg-block">
                    <div class="row g-0">
                        <div class="col text-navy-blue deadline-2">
                            Краен срок
                            <br>
                            <div class="date-pill d-flex align-items-center data-07">
                                <div class="w-100 text-center fw-bold enddata1">{{ $lection->homework_check_end ? $lection->homework_check_end->format('d.m') : 'Няма' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-auto d-none d-lg-block">
            <div class="row g-0 ps-1">
                <div class="col lection-eval" @if (($lection->homework_check_end && $lection->homework_check_end->addDays(1)->gt(\Carbon\Carbon::now())) || !$lection->homework_check_end)data-bs-toggle="modal" data-bs-target="#evaluateModal"@endif data-lection-eval="{{ $lection->id }}">
                    <button class="btn-green btn1-cs" style="{{ (($lection->homework_check_end && $lection->homework_check_end->addDays(1)->gt(\Carbon\Carbon::now())) || !$lection->homework_check_end) ?: 'background-color:#999999' }}">
                        <div class="row g-0 align-self-center">
                            <div class="col ps-2 text-start text-small">
                                Оцени
                            </div>
                            <div class="col-auto px-2">
                                <img src="{{ asset('assets/img/action_icon.svg') }}">
                            </div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif
