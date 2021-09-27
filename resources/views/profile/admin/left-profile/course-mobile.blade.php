<div class="col-12 mobile mobile-courses-edit-profile">
    <h2 class="text-uppercase"><span id="status">Активни курсове</span></h2>
    <div class="row g-0">
        <div id="active-courses" class="col section-active-courses d-flex flex-nowrap mobile-courses">
            <!-- Courses -->
            @foreach ($courses as $course)
                @include('profile.course-mobile', [
                    'courseStatus' => 'active',
                    'course' => $course
                ])
            @endforeach
            <!-- End courses -->
        </div>
        <div class="col section-past-courses d-none d-flex flex-nowrap mobile-courses">
            <!-- Courses -->
            @foreach ($pastCourses as $course)
                @include('profile.course-mobile', [
                    'courseStatus' => 'past',
                    'course' => $course
                ])
            @endforeach
            <!-- End courses -->
        </div>
    </div>
    <div class="col mb-5">
        <div class="position-relative d-inline-block">
            <select class="border-0 form-control position-relative  py-0 text-uppercase" id="tab_selector" style="text-shadow: 0px 0px 0px black;">
                <option value="Активни">Активни курсове</option>
                <option value="Отминали">Отминали курсове</option>
            </select>
            <img src="{{ asset('assets/img/arrow.svg') }}" class="position-absolute">
        </div>
        <hr>
    </div>

    @include('profile.event.event-mobile')
</div>
