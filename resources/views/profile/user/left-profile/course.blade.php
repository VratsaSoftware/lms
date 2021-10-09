<div class="col-lg">
    <div class="main pt-lg-5 px-xxl-5 px-lg-4">
        <div class="row g-0">
            <div class="col-auto courses">
                <ul class="list-unstyled m-0">
                    <li>
                        <div class="row g-0">
                            <div class="col">
                                <p class="fw-bold text-uppercase courses-section-title">Записани курсове</p>
                            </div>
                            <div class="col-auto">
{{--                                <img src="{{ asset('assets/icons/filter.svg') }}" width="32" alt="#" class="filter">--}}
                            </div>
                        </div>
                    </li>
                    @foreach ($courses as $course)
                        <li>
                            <div class="course">
                                <div class="row g-0">
                                    <div class="col-auto card-course">
                                        @include ('profile.course-icon', [
                                            'type' => $course->training_type
                                        ])
                                    </div>
                                    <div class="col text-end">
                                        <span class="fw-bold course-status-active">Активен</span>
                                    </div>
                                </div>
                                <div class="row g-0 mt-4 d-flex align-items-center">
                                    <div class="col">
                                        <p class="m-0 p-0 pe-4 course-title">{{ $course->name }}</p>
                                    </div>
                                    <div class="col-auto">
                                        <form action="{{ asset($course->Modules->Count() ? 'user/' . Auth::user()->id . '/course/' . $course->id . '/module/' . $course->Modules[0]->id . '/lections' : '#') }}">
                                            <button class="btn view-course-btn d-flex py-0 px-3">
                                                <div class="row w-100 g-0 align-self-center">
                                                    <div class="col text-start">
                                                        <span class="fw-bold">Виж</span>
                                                    </div>
                                                    <div class="col-auto d-flex align-items-center">
                                                        <img src="{{ asset('assets/icons/action_icon.svg') }}" width="27" alt="#">
                                                    </div>
                                                </div>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    @foreach ($pastCourses as $course)
                        <li>
                            <div class="course">
                                <div class="row g-0">
                                    <div class="col-auto card-course">
                                        @include ('profile.course-icon', [
                                            'type' => $course->training_type
                                        ])
                                    </div>
                                    <div class="col text-end">
                                        <span class="fw-bold course-status-past">Отминал</span>
                                    </div>
                                </div>
                                <div class="row g-0 mt-4 d-flex align-items-center">
                                    <div class="col">
                                        <p class="m-0 p-0 pe-4 course-title">{{ $course->name }}</p>
                                    </div>
                                    <div class="col-auto">
                                        <form action="{{ asset($course->Modules->Count() ? 'user/' . Auth::user()->id . '/course/' . $course->id . '/module/' . $course->Modules[0]->id . '/lections' : '#') }}">
                                            <button class="btn view-course-btn d-flex py-0 px-3">
                                                <div class="row w-100 g-0 align-self-center">
                                                    <div class="col text-start">
                                                        <span class="fw-bold">Виж</span>
                                                    </div>
                                                    <div class="col-auto d-flex align-items-center">
                                                        <img src="{{ asset('assets/icons/action_icon.svg') }}" width="27" alt="#">
                                                    </div>
                                                </div>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                    <li>
                        <p class="fw-bold text-uppercase courses-section-title">Активни курсове</p>
                    </li>
                    @foreach ($activeCourses as $activeCourse)
                        <li>
                            <div class="course">
                                <div class="row g-0">
                                    <div class="col-auto" style="width: 316px">
                                        @include ('profile.course-icon', [
                                            'type' => $activeCourse->training_type
                                        ])
                                    </div>
                                    <div class="col text-end">
                                        <span class="fw-bold course-status-active">
                                            @if ($activeCourse->userEntryForms->count())
                                                Записан
                                            @else
                                                Нов
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="row g-0 mt-4 d-flex align-items-center">
                                    <div class="col">
                                        <p class="m-0 p-0 pe-4 course-title">{{ $activeCourse->name }}</p>
                                    </div>
                                    <div class="col-auto">
                                        <form action="{{ route('application.create', [$activeCourse->training_type, $activeCourse->id]) }}">
                                            <button onclick="window.location.href='{{ asset('application/create/' . $activeCourse->id) }}'" class="btn view-course-btn d-flex py-0 px-3">
                                                <div class="row w-100 g-0 align-self-center">
                                                    <div class="col text-start">
                                                        <span class="fw-bold">Виж</span>
                                                    </div>
                                                    <div class="col-auto d-flex align-items-center">
                                                        <img src="{{ asset('assets/icons/action_icon.svg') }}" width="27" alt="#">
                                                    </div>
                                                </div>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
