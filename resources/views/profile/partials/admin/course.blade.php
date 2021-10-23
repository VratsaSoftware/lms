<div class="col-lg">
    <div class="main pt-lg-5 px-xxl-5 px-lg-4">
        <div class="row g-0">
            <div class="col-auto courses">
                <ul class="list-unstyled m-0">
                    <li>
                        <div class="row g-0">
                            <div class="col">
                                <p class="fw-bold text-uppercase courses-section-title active-course-section">Активни курсове</p>
                            </div>
                            <div class="col-auto">
                                <img src="{{ asset('assets/icons/filter.svg') }}" width="32" alt="#" class="filter">
                            </div>
                        </div>
                        <div id="filter-section" class="row g-0 mb-4" style="display: none">
                            <div class="col">
                                <input type="checkbox" class="filter-checkbox" id="activ-courses" checked>
                                <label for="activ-courses" class="fw-bold text-uppercase courses-section-title">Активни</label>
                            </div>
                            <div class="col-auto">
                                <input type="checkbox" class="filter-checkbox" id="past-courses" checked>
                                <label for="past-courses" class="fw-bold text-uppercase courses-section-title">Отминали</label>
                            </div>
                        </div>
                    </li>
                    @if ($courses->count())
                        @foreach ($courses as $course)
                            <li>
                                <div class="course active-course-section">
                                    <div class="row g-0">
                                        <div class="col-auto card-course">
                                            @include ('profile.partials.course-icon', [
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
                                            <form action="{{ asset($course->Modules->Count() ? 'module/' . $course->Modules[0]->id : '#') }}">
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
                    @endif
                    <li>
                        <p class="fw-bold text-uppercase courses-section-title past-course-section">Отминали курсове</p>
                    </li>
                    @foreach ($pastCourses as $pastCourse)
                        <li>
                            <div class="course past-course-section">
                                <div class="row g-0">
                                    <div class="col-auto card-course">
                                        @include ('profile.partials.course-icon', [
                                            'type' => $pastCourse->training_type
                                        ])
                                    </div>
                                    <div class="col text-end">
                                        <span class="fw-bold course-status-past">Отминал</span>
                                    </div>
                                </div>
                                <div class="row g-0 mt-4 d-flex align-items-center">
                                    <div class="col">
                                        <p class="m-0 p-0 pe-4 course-title">{{ $pastCourse->name }}</p>
                                    </div>
                                    <div class="col-auto">
                                        <form action="{{ asset($pastCourse->Modules->Count() ? 'module/' . $pastCourse->Modules[0]->id : '#') }}">
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
                </ul>
            </div>
        </div>
    </div>
</div>
