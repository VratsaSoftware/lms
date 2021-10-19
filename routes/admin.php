<?php

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'isLecturer'], function () {
        /* lecturer routes */
        Route::post('/lecturer/update/bio', 'Users\UserController@updateBio')->name('lecturer.update.bio');
        Route::get('/lecturer/show/course/{course}',
            'Courses\CourseController@showLecturerCourse')->name('lecturer.show.course');

        /* module */
        Route::resource('module', 'Courses\ModuleController')->names('module');
        Route::post('module/add/student', 'Courses\ModuleController@addUser')->name('module.add.student');
        Route::post('module/remove/student', 'Courses\ModuleController@removeUser')->name('module.remove.student');

        /* course routes */
        Route::resource('course', 'Courses\CourseController')->names('course');

        /* lection routes */
        Route::resource('lection', 'Courses\LectionController')->names('lection');
        Route::post('change/lection/{lection}/visibility',
            'Courses\LectionController@changeVisibility')->name('lection.visibility');
        Route::get('lection/{lection}/homeworks', 'Courses\LectionController@showHomeworks')->name('homeworks.show');
        Route::post('lection/homework/{homework}', 'Courses\LectionController@addHomeworkLecturerComment')->name('lection.homework.lecturer.comment');

        /* tests routes */
        Route::resource('test', 'Admin\TestController')->names('test');
        Route::post('test/add/student', 'Admin\TestController@addUser')->name('test.add.student');
        Route::post('test/remove/student', 'Admin\TestController@removeStudent')->name('test.remove.student');
        Route::post('test/bank/create', 'Admin\TestController@createBank')->name('create.bank');
        Route::post('test/question/create', 'Admin\TestController@storeQuestion')->name('store.question');
        Route::get('bank/question/{question}/edit', 'Admin\TestController@editQuestion')->name('question.edit');
        Route::put('test/question/update/{question}', 'Admin\TestController@updateQuestion')->name('update.question');
        Route::delete('/test/delete/question/{question}',
            'Admin\TestController@deleteQuestion')->name('delete.question');
        Route::get('applications/all/{type?}', 'Courses\ApplicationController@applicationsAll')->name('admin.applications');
        Route::post('applications/filter', 'Courses\ApplicationController@loadApplications')->name('admin.ajax.applications');
        Route::post('/add/student/to/course', 'Courses\CourseController@addStudent')->name('add.student.to.course');

        /* admin/lecturer show entry forms */
        Route::get('application/course/{courseId?}', 'Courses\ApplicationController@showCourseEntryForm')
            ->name('application-entry-form');
    });

    Route::group(['middleware' => 'isAdmin'], function () {
        Route::get('courses/all', 'Admin\AdminController@allCourses')->name('all.courses');
        Route::get('events/all', 'Admin\AdminController@showAllEvents')->name('admin.events');

        /* events routes */
        Route::resource('events', 'Events\EventController')->names('events');

        /* polls routes */
        Route::resource('polls', 'Admin\PollController')->names('polls');
        Route::get('poll/{poll}/votes', 'Admin\PollController@getVotes')->name('poll.votes');

        /* course certificate routes */
        Route::get('course/certificate/create/{course?}', 'Admin\AdminController@createCertificate')->name('course.cert.create');
        Route::get('course/certificate/user/{users?}',
            'Admin\AdminController@getUserDataForCertificate')->name('users.modules');
        Route::post('certificate/store/', 'Admin\AdminController@storeCertificate')->name('certification.store');
        Route::get('user/{user}/certificate/preview',
            'Admin\AdminController@certificatePreview')->name('certificate.preview');
    });
});
