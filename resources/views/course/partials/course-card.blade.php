@foreach ($courses as $course)
    <div class="{{ $resolution == 'mobile' ? 'course' : 'course-admin' }}">
        <div class="row g-0">
            <div class="col-auto">
                @include ('profile.course-icon', [
                    'type' => $course->training_type
                ])
            </div>
            <div class="col text-end">
                <span class="fw-bold course-status-active">{{ $status }}</span>
            </div>
        </div>
        <div class="row g-0 mt-4 d-flex align-items-center">
            <div class="col">
                <p class="m-0 p-0 pe-4 course-title text-navy-blue fw-bold">{{ $course->name }}</p>
            </div>
            <div class="col-auto">
                <button class="btn-green {{ $resolution == 'mobile' ? 'view-course-btn' : 'view-course-admin-btn' }} d-flex py-0 px-3" onclick="window.location.href='{{ asset($course->Modules->Count() ? 'module/' . $course->Modules[0]->id : '#') }}'">
                    <div class="row w-100 g-0 align-self-center">
                        <div class="col text-start">
                            <span class="fw-bold">Виж</span>
                        </div>
                        <div class="col-4 d-flex align-items-center">
                            <img src="{{ asset('assets/img/action_icon.svg') }}">
                        </div>
                    </div>
                </button>
            </div>
        </div>
    </div>
@endforeach
