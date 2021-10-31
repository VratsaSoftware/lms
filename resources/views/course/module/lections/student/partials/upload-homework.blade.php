@if ($lection->homework_end && !$myHomework)
    <button class="ms-xxl-2 mt-xxl-0 mt-4 btn-view-1 btn-green row g-0 align-items-center d-lg-none" style="{{ (($lection->homework_end && $lection->homework_end->addDays(1)->gt(\Carbon\Carbon::now())) || !$lection->homework_end) ?: 'background-color: #999999' }}">
        <label for="homework-input-{{ $loop->iteration }}">
            <div class="col-auto mx-auto upload-btn" data-lection-id="{{ $loop->iteration }}">
                КАЧИ ДОМАШНО
                <br>
                <div class="deadline-student">
                    @if (($lection->homework_end && $lection->homework_end->addDays(1)->gt(\Carbon\Carbon::now())) || !$lection->homework_end)
                        Краен срок
                    @else
                        Срокът е изтекъл
                    @endif
                    @if ($lection->homework_end)
                        {{ ($lection->homework_end->format('Y') == date('Y')) ? $lection->homework_end->format('d.m') : $lection->homework_end->format('d.m.Y') }}
                    @else
                        Няма
                    @endif
                </div>
            </div>
        </label>
    </button>
    <!--End mobil btn-->
    <div class="row g-0 uploaded-home-1 align-items-center p-3 mt-4">
        <div class="col ps-3 text-uploaded-home  text-uppercase text-white d-none d-lg-block">
            КАЧИ ДОМАШНО
        </div>
        <div class="col d-none d-lg-block">
            <div class="row">
                <div class="col-auto">
                    <img src="{{ asset('assets/img/bell.svg') }}" alt="" class="bell-img">
                </div>
                <div class="col d-none d-lg-block">
                    <div class="row g-0">
                        <div class="col text-white deadline-2">
                            Краен срок
                            <br>
                            <div class="date-pill d-flex align-items-center data-07">
                                <div class="w-100 text-center fw-bold enddata1">
                                    @if ($lection->homework_end)
                                        {{ ($lection->homework_end->format('Y') == date('Y')) ? $lection->homework_end->format('d.m') : $lection->homework_end->format('d.m.Y') }}
                                    @else
                                        Няма
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-auto d-none d-lg-block">
            <div class="row g-0 ps-1">
                <div class="col">
                    <label for="homework-input-{{ $loop->iteration }}">
                        <div class="btn-green btn1-cs upload-btn upload-btn" data-lection-id="{{ $loop->iteration }}"
                             id="lection-1-tab" style="{{ (($lection->homework_end && $lection->homework_end->addDays(1)->gt(\Carbon\Carbon::now())) || !$lection->homework_end) ?: 'background-color: #999999' }}">
                            <div class="row g-0 align-self-center">
                                <div class="col mt-2 ps-2 text-start text-small">
                                    Прикачи
                                </div>
                                <div class="col-auto mt-2 px-2">
                                    <img src="{{ asset('assets/img/action_icon.svg') }}">
                                </div>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
        </div>
    </div>
@endif
