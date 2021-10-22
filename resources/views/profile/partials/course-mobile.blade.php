<div class="course">
    <div class="row g-0">
        <div class="col-auto">
            @include ('profile.partials.course-icon', [
                'type' => $course->training_type
            ])
        </div>
        @if ($courseStatus == 'active')
            <div class="col text-end">
                <span class="fw-bold course-status-active">Активен</span>
            </div>
        @else
            <div class="col text-end">
                <span class="fw-bold course-status-past">Отминал</span>
            </div>
        @endif
    </div>
    <div class="row g-0 mt-4 d-flex align-items-center">
        <div class="col">
            <p class="m-0 p-0 pe-4 course-title fw-bold">{{ $course->name }}</p>
        </div>
        <div class="col-auto">
            @if ((Auth::user()->isAdmin() || Auth::user()->isLecturer()) && !isset($application))
                <button onclick="window.location.href='{{ asset($course->Modules->Count() ? 'module/' . $course->Modules[0]->id : '#') }}'" class="btn view-course-btn d-flex py-0 px-3">
                    <div class="row w-100 g-0 align-self-center">
                        <div class="col text-start">
                            <span class="fw-bold">Виж</span>
                        </div>
                        <div class="col-auto d-flex align-items-center">
                            <img src="{{ asset('assets/icons/action icon.svg') }}" width="27" alt="#">
                        </div>
                    </div>
                </button>
            @elseif (!isset($application))
                <button onclick="window.location.href='{{ $course->Modules->Count() ? route('user.module.lections', $course->Modules[0]->id) : '' }}'" class="btn view-course-btn d-flex py-0 px-3">
                    <div class="row w-100 g-0 align-self-center">
                        <div class="col text-start">
                            <span class="fw-bold">Виж</span>
                        </div>
                        <div class="col-auto d-flex align-items-center">
                            <img src="{{ asset('assets/icons/action icon.svg') }}" width="27" alt="#">
                        </div>
                    </div>
                </button>
            @endif

            @if (isset($application))
                <button onclick="window.location.href='{{ asset('application/create/' . $course->training_type . '/' . $course->id) }}'" class="btn view-course-btn d-flex py-0 px-3">
                    <div class="row w-100 g-0 align-self-center">
                        <div class="col text-start">
                            <span class="fw-bold">Виж</span>
                        </div>
                        <div class="col-auto d-flex align-items-center">
                            <img src="{{ asset('assets/icons/action icon.svg') }}" width="27" alt="#">
                        </div>
                    </div>
                </button>
            @endif
        </div>
    </div>
</div>
