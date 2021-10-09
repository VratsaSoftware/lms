<div class="col-12 mobile mobile-courses-edit-profile">
    <h2 class="text-uppercase"><span id="status">Записани курсове</span></h2>
    <div class="row g-0">
        <div id="active-courses" class="col section-my-courses d-flex flex-nowrap mobile-courses">
            @if ($courses->count())
                @foreach ($courses as $course)
                    @include('profile.course-mobile', [
                        'courseStatus' => 'active',
                        'course' => $course
                    ])
                @endforeach
            @endif
        </div>
        <div id="past-courses" class="col d-none section-past-courses d-flex flex-nowrap mobile-courses">
            @foreach ($pastCourses as $course)
                @include('profile.course-mobile', [
                    'courseStatus' => 'past',
                    'course' => $course
                ])
            @endforeach
        </div>
        <div class="col section-active-courses d-none d-flex flex-nowrap mobile-courses">
            @foreach ($activeCourses as $course)
                @include('profile.course-mobile', [
                    'courseStatus' => 'active',
                    'course' => $course,
                    'application' => true
                ])
            @endforeach
        </div>
    </div>
    <div class="col mb-5">
        <div class="position-relative d-inline-block">
            <select class="border-0 form-control position-relative  py-0 text-uppercase" id="tab_selector" style="text-shadow: 0px 0px 0px black;">
                <optgroup label="Мой курсове">
                    <option value="Записани">Записани курсове</option>
                    <option value="Отминали">Отминали курсове</option>
                </optgroup>
                <option value="Активни">Активни курсове</option>
            </select>
            <img src="{{ asset('assets/img/arrow.svg') }}" class="position-absolute">
        </div>
        <hr>
    </div>

    @include('profile.event.event-mobile')
</div>
