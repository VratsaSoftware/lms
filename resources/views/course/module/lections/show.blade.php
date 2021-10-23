<link href="{{ asset('css/lection/show.css') }}" rel="stylesheet" />

<div class="tab-body position-relative">
    <span class="close d-lg-none position-absolute">&times;</span>
    <div class="row pt-lg-0 pt-4 g-0">
        <div class="col pe-4 d-none d-lg-block">
            <h2 class="text-l1">{{ strlen($lection->title) > 25 ? mb_substr($lection->title, 0, 25) . "..." : $lection->title }}</h2>
        </div>
        <div class="col-auto pe-4 d-block d-lg-none">
            <h2 class="text-l1">{{ $lection->title }}</h2>
        </div>
        <div class="col-auto pe-4">
            <div class="data1">{{ $lection->first_date->format('d.m.Y') }}</div>
        </div>
        <div class="col-auto align-self-stretch border d-none d-lg-block"></div>
        <div class="col pe-4 ps-4 d-none d-lg-block">
            <div class="data1">{{ isset($lection->second_date) ? $lection->second_date->format('d.m.Y') : null }}</div>
        </div>
        <div class="col-auto pe-5 d-none d-lg-block">
            <div class="pill1 d-flex align-items-center float-right rounded-circle overflow-hidden">
                <button class="nav btn py-0 pe-2 d-flex" id="lection-1-tab" data-bs-toggle="tab" href="#lection-{{ $loop->iteration - 1 }}" aria-controls="lection-1" aria-selected="true">
                    <a class="btn px-2 col p-0 text-center" id="toggleNav">
                        <img src="{{ asset('assets/img/arrow.svg') }}"class="arrow1">
                    </a>
                </button>
            </div>
        </div>
        <div class="col-auto pe-4 d-none d-lg-block">
            <div class="pill2 d-flex align-items-center float-right rounded-circle overflow-hidden">
                <button class="nav btn py-0 pe-2 d-flex" id="lection-1-tab" data-bs-toggle="tab" href="#lection-{{ $loop->iteration + 1 }}" aria-controls="lection-1" aria-selected="true">
                    <a class="btn px-2 col p-0 text-center" id="toggleNav">
                        <img src="{{ asset('assets/img/arrow.svg') }}"class="arrow1">
                    </a>
                </button>
            </div>
        </div>
    </div>
    @php
        $videoUrl = \App\Services\LectionServices::videoUrlFormat($lection->Video);
    @endphp
    <div class="video-upload row g-0 my-4 position-relative" {{ $videoUrl ?: 'style="background-color: transparent;"' }}>
        @if ($videoUrl)
            <iframe width="762" height="375" src="{{ $videoUrl }}"
                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border-radius: 45px;"></iframe>
        @else
            <div class="edit-lection-btn video-upload-btn position-absolute text-center">
                <img src="{{ asset('assets/img/upload_video.svg') }}">
                <div class="text-center fw-bold pt-lg-4 pt-3">
                    Upload
                    <br class="d-lg-block d-none">
                    video
                </div>
            </div>
        @endif
    </div>
    <div class="edit-decsription pt-3 pb-2">
        <div class="lorem">
            {{ $lection->description }}
        </div>
    </div>
    <div class="row g-0 align-items-lg-center lh-1 pb-5">
        @if ($lection->presentation)
            <div class="col-lg col-6 mb-lg-0 mb-3 text-lg-end d-block d-sm-none">
                <div class="row g-0 mt-2">
                    <div class="col-lg col-auto text-small align-self-end pe-3">
                        <a href="{{ asset('/data/course-' . $module->Course->id . '/modules/' . $module->id.'/slides-' . $lection->id . '/' . $lection->presentation) }}" target="_blank">
                            Презентация
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="{{ asset('/data/course-' . $module->Course->id . '/modules/' . $module->id . '/slides-'.$lection->id . '/' . $lection->presentation) }}" download>
                            <img src="{{ asset('assets/img/download.svg') }}">
                        </a>
                    </div>
                </div>
            </div>
            <hr class="d-block d-sm-none mt-4">
        @endif
        <div class="col-12 text-normal py-4">
            Файлове
        </div>
        <div class="col">
            <div class="row g-0">
                @if ($lection->presentation)
                    <div class="col-auto mb-lg-0 mb-3 text-lg-end d-none d-lg-block">
                        <div class="row g-0">
                            <div class="col-lg col-auto text-small align-self-end pe-3">
                                <a href="{{ asset('/data/course-'.$module->Course->id . '/modules/' . $module->id . '/slides-' . $lection->id . '/' . $lection->presentation) }}" target="_blank">
                                    Презентация
                                </a>
                            </div>
                            <div class="col-auto">
                                <a href="{{ asset('/data/course-'.$module->Course->id . '/modules/' . $module->id . '/slides-'.$lection->id . '/' . $lection->presentation)}}" download>
                                    <img src="{{ asset('assets/img/download.svg') }}">
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($lection->demo)
                    <div class="col-lg col-6 mb-lg-0 mb-3 text-lg-end">
                        <div class="row g-0">
                            <div class="col-lg col-auto text-small align-self-end pe-3">Демо</div>
                            <div class="col-auto">
                                <a href="{{ $lection->demo }}" target="_blank">
                                    <img src="{{ asset('assets/img/download.svg') }}">
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($lection->homework_criteria)
                    <div class="col-lg col-6 mb-lg-0 mb-3 text-lg-end">
                        <div class="row g-0">
                            <div class="col-lg col-auto text-small align-self-end pe-3">
                                <a href="{{ asset('/data/course-' . $module->Course->id . '/modules/' . $module->id . '/homework-' . $lection->id . '/' . $lection->homework_criteria) }}" target="_blank">
                                    Домашно
                                </a>
                            </div>
                            <div class="col-auto">
                                <a href="{{ asset('/data/course-' . $module->Course->id . '/modules/' . $module->id . '/homework-' . $lection->id . '/' . $lection->homework_criteria) }}" download>
                                    <img src="{{ asset('assets/img/download.svg') }}">
                                </a>
                            </div>
                        </div>
                    </div>
                 @endif
            </div>
        </div>
    </div>
    <div class="row g-0 mb-4">
        <div class="delete-lection col-lg col-auto mx-lg-0 mx-auto d-block d-lg-none" data-lection-title="{{ $lection->title }}">
            <button form="delete-lection-form-{{ $loop->iteration }}" class="ms-xxl-2 mt-xxl-0 mt-3 btn-edit row g-0 align-items-center">
                <div class="col text-start fw-bold">Изтрий лекция</div>
                <div class="col-auto">
                    <img src="{{ asset('assets/img/Delete.svg') }}" alt="">
                </div>
            </button>
        </div>
        <div class="col-auto mx-lg-0 mx-auto d-block d-lg-none">
            <button class="edit-lection-btn ms-xxl-2 mt-xxl-0 mt-3 btn-edit row g-0 align-items-center">
                <div class="col text-start fw-bold">Редактирай лекция</div>
                <div class="col-auto">
                    <img src="{{ asset('assets/img/edit.svg') }}">
                </div>
            </button>
        </div>
    </div>
    <div class="row g-0 home-work-1 align-items-center p-3 mt-3">
        <div class="col-auto text-normal text-uppercase text-white d-lg-none ps-3">
            ДОМАШНИ
        </div>
        <div class="col-auto ps-3 pe-3 text-normal text-uppercase d-lg-none" style="color: #8de219;">
            ({{ $lection->HomeWorks->count() }})
        </div>
        <div class="col-auto ps-3 d-lg-none">
            <div class="row g-0">
                <div class="col text-white deadline-2">
                    Краен срок
                    за домашно:
                </div>
                <div class="col-auto">
                    <div class="d-flex align-items-center data-07 ps-4">
                        <div class="w-100 text-center fw-bold enddata">
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
        <img src="{{ asset('assets/img/bell.svg') }}" class="bell-size d-lg-none">
        <div class="col-auto ps-3 d-lg-none">
            <div class="row g-0">
                <div class="col text-white deadline-2">
                    Краен срок
                    за проверка:
                </div>
                <div class="col-auto">
                    <div class="d-flex align-items-center data-07 ps-4">
                        <div class="w-100 text-center fw-bold enddata">
                            @if ($lection->homework_check_end)
                                {{ ($lection->homework_check_end->format('Y') == date('Y')) ? $lection->homework_check_end->format('d.m') : $lection->homework_check_end->format('d.m.Y') }}
                            @else
                                Няма
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-auto mx-lg-0 mx-auto d-lg-none">
            <button onclick="window.location.href='{{ route('homeworks.show', $lection->id) }}'" class="ms-xxl-2 mt-xxl-0 mt-4 btn-view-1 btn-green row g-0 align-items-center ">
                <div class="col-auto mx-auto fw-bold see-all">Виж всички <img src="{{ asset('assets/img/action_icon.svg') }}" alt=""></div>
            </button>
        </div>
        <div class="col-auto ps-3 text-normal text-uppercase text-white d-none d-lg-block">
            ДОМАШНИ
        </div>
        <div class="col-auto ps-3 pe-3 text-normal text-uppercase d-none d-lg-block" style="color: #8de219;">
            ({{ $lection->HomeWorks->count() }})
        </div>
        <div class="col d-none d-lg-block">
            <div class="row g-0">
                <div class="col ps-4 text-white deadline-2">
                    Краен срок<br>
                    за домашно:
                </div>
                <div class="col-auto">
                    <div class="date-pill d-flex align-items-center data-07">
                        <div class="w-100 text-center fw-bold enddata">
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
        <div class="col d-none d-lg-block">
            <div class="row g-0">
                <div class="col ps-3 text-white deadline-2">
                    Краен срок<br>
                    за проверка:
                </div>
                <div class="col-auto">
                    <div class="date-pill d-flex align-items-center data-07">
                        <div class="w-100 text-center fw-bold enddata1">
                            @if ($lection->homework_check_end)
                                {{ ($lection->homework_check_end->format('Y') == date('Y')) ? $lection->homework_check_end->format('d.m') : $lection->homework_check_end->format('d.m.Y') }}
                            @else
                                Няма
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-auto d-none d-lg-block">
            <div class="row g-0 ps-1">
                <div class="col">
                    <button onclick="window.location.href='{{ route('homeworks.show', $lection->id) }}'" class="nav btn btn-green active py-0 pe-2 d-flex btn1-d" id="lection-1-tab" data-bs-toggle="tab" role="tab" aria-controls="lection-1" aria-selected="true">
                        <div class="row g-0 align-self-center">
                            <div class="col text-end align-items-center d-flex ms-3">
                                <img src="{{ asset('assets/img/action_icon.svg') }}">
                            </div>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <hr class="my-5 d-none d-lg-block">
    <div class="row g-0">
        <div class="col-lg col-auto mx-lg-0 mx-auto d-none d-lg-block">
            <button form="delete-lection-form-{{ $loop->iteration }}" class="ms-xxl-2 mt-xxl-0 mt-3 btn-edit row g-0 align-items-center delete-lection" data-lection-title="{{ $lection->title }}">
                <div class="col text-start fw-bold">Изтрий лекция</div>
                <div class="col-auto">
                    <img src="{{ asset('assets/img/Delete.svg') }}">
                </div>
            </button>
        </div>
        <div class="col-auto mx-lg-0 mx-auto d-none d-lg-block">
            <button class="edit-lection-btn ms-xxl-2 mt-xxl-0 mt-3 btn-edit row g-0 align-items-center">
                <div class="col text-start fw-bold">Редактирай лекция</div>
                <div class="col-auto">
                    <img src="{{ asset('assets/img/edit.svg') }}" >
                </div>
            </button>
        </div>
    </div>
</div>
