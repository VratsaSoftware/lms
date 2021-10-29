<!-- Accordion sections  -->
<div class="accordion accordion-flush position-relative" id="accordionExample">
    @foreach ($lections as $lection)
        @php
            $validHomework = false;
        @endphp
        @if (!Auth::user()->isLecturer() && !Auth::user()->isAdmin())
            @foreach ($homeworks as $homework)
                @if ($homework->lection_id == $lection->id)
                    @php
                        $validHomework = true;
                    @endphp
                    @break
                @else
                    @php
                        $validHomework = false;
                    @endphp
                @endif
            @endforeach
        @endif
        <!-- Accordion item -->
        <div class="accordion-item">
            <button class="accordion-button {{ Session::get('lectionId') == $lection->id || (!Session::get('lectionId') && $loop->first) ?: 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->iteration }}" aria-expanded="false" aria-controls="collapse{{ $loop->iteration }}">
                <div class="row d-flex w-100 align-items-end g-0 text-start text-uppercase">
                    <div class="col lection-title text-large">
                        {{ $loop->iteration }}. {{ strlen($lection->title) > 15 ? mb_substr($lection->title, 0, 15) . "..." : $lection->title }}
                    </div>
                    <div class="col-auto ms-auto text-small time pe-2">
                        {{-- $lection->first_date->format('H:i') --}}
                    </div>
                </div>
            </button>
            <div id="collapse{{ $loop->iteration }}" class="accordion-collapse collapse {{ Session::get('lectionId') == $lection->id ? 'show' : (!Session::get('lectionId') && $loop->first ? 'show' : null) }}" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body py-lg-3 py-1">
                    <div class="d-flex justify-content-between pb-4 text-small">
                        <div>
                            <img src="{{ asset('assets/img/Homework.svg') }}">
                            @if (!is_null($lection->homework_end))
                                <span>Домашно до</span>
                                <span class="text-orange fw-bold">{{ $lection->homework_end->format('d.m') }}</span>
                            @endif
                            @if (Auth::user()->isLecturer() || Auth::user()->isAdmin())
                                @if (!$lection->homework_end)
                                    <div class="text-orange mt-2 ms-lg-0 ms-2 ps-lg-0 ps-4 pt-1 fw-bold row g-0 align-items-center">
                                        <span class="orange-dot col-auto"></span>
                                        <span class=col>Не е качено</span>
                                    </div>
                                @else
                                    <div class="text-green mt-2 ms-lg-0 ms-2 ps-lg-0 ps-4 pt-1 fw-bold row g-0 align-items-center">
                                        <span class="green-dot-circle col-auto"></span>
                                        <span class=col>Качено домашно</span>
                                    </div>
                                @endif
                            @else
                                @if ($lection->homework_end)
                                    @if ($validHomework)
                                        <div class="text-green mt-2 ms-lg-0 ms-2 ps-lg-0 ps-4 pt-1 fw-bold row g-0 align-items-center">
                                            <span class="green-dot-circle col-auto"></span>
                                            <span class=col>Качено домашно</span>
                                        </div>
                                    @else
                                        <div class="text-orange mt-2 ms-lg-0 ms-2 ps-lg-0 ps-4 pt-1 fw-bold row g-0 align-items-center">
                                            <span class="orange-dot col-auto"></span>
                                            <span class=col>Не е качено</span>
                                        </div>
                                    @endif
                                @else
                                    <div class="text-gray mt-2 ms-lg-0 ms-2 ps-lg-0 ps-4 pt-1 fw-bold row g-0 align-items-center">
                                        <span class="gray-dot col-auto"></span>
                                        <span class=col>Няма домашно</span>
                                    </div>
                                @endif
                            @endif
                        </div>
                        <div class="d-lg-inline-block d-none">
                            @if ($lection->homework_criteria || $lection->demo || $lection->slides)
                                <img src="{{ asset('assets/img/download.svg') }}" alt="">
                                <span>Файлове</span>
                            @endif
                        </div>
                        <div class="d-lg-inline-block d-none">
                            @if (isset($lection->Video->url))
                                <i class="fas fa-play text-green me-2"></i>
                                <span class="">Видео</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-see row g-0">
                <div class="col eval text-normal">
{{--                    ОЦЕНКA:--}}
                </div>

                <div class="col-auto file-notification d-xxl-flex d-sm-flex d-none align-items-center">
                    @if (Auth::user()->isLecturer() || Auth::user()->isAdmin())
                        @if (!$lection->homework_end)
                            <div class="big-orange-dot position-relative">
                                <img class="position-absolute" src="{{ asset('assets/img/Homework.svg') }}">
                            </div>
                        @else
                            <div class="big-green-dot position-relative">
                                <img class="position-absolute" src="{{ asset('assets/img/Homework.svg') }}">
                            </div>
                        @endif
                    @else
                        @if ($lection->homework_end)
                            @if ($validHomework)
                                <div class="big-green-dot position-relative">
                                    <img class="position-absolute" src="{{ asset('assets/img/Homework.svg') }}">
                                </div>
                            @else
                                <div class="big-orange-dot position-relative">
                                    <img class="position-absolute" src="{{ asset('assets/img/Homework.svg') }}">
                                </div>
                            @endif
                        @else
                            <div class="big-gray-dot position-relative">
                                <img class="position-absolute" src="{{ asset('assets/img/Homework.svg') }}">
                            </div>
                        @endif
                    @endif
                </div>
                @php
                    $videoUrls = \App\Services\LectionServices::videoUrlFormat($lection->Video);
                @endphp
                <div class="col-auto">
                    <button data-lections="{{ $lection }}" class="nav btn btn-green py-0 pe-2
                    d-flex nav-lection nav-lection-green-btn" id="lection-1-tab" data-bs-toggle="tab" href="#lection-{{ $loop->iteration }}"
                            role="tab" aria-controls="lection-1"
                            aria-selected="true"
                            data-videos="{{ $videoUrls }}">
                        <div class="row g-0 align-self-center">
                            <div class="col-auto text-start text-small">Виж</div>
                            <div class="col text-end align-items-center d-flex">
                                <img src="{{ asset('assets/img/action_icon.svg') }}" alt="">
                            </div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
        @if (!Auth::user()->isLecturer() || !Auth::user()->isAdmin())
            @php
                $validHomework = null;
            @endphp
        @endif
    @endforeach
</div>
