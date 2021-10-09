<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__ . '/admin.php';

/* auth */
Route::get('user/register', function () {
    return view('auth.register');
})->name('user/register');

Route::get('user/forgotPassword', function () {
    return view('auth.passwords.forgot');
})->name('auth.password.reset');

Route::get('language/{lang}', function ($lang) {
    Session::put('locale', $lang);
    \Cookie::forget('locale');
    Cookie::queue('locale', $lang, (60 * 60 * 24 * 365));
    return back();
})->name('langroute');

Route::get('/', function () {
    return view('auth.login');
})->name('home');

// static pages
Route::get('/subscribe/{email}', 'HomeController@subscribe');

Auth::routes();

Route::get('application/create/{type?}/{course?}/{module?}',
    'Courses\ApplicationController@create')->name('application.create');
Route::post('application/store/', 'Courses\ApplicationController@store')->name('application.store');
//cw
Route::get('user/event/{event}/register','Events\EventController@cwRegister')->name('events.cw.register');
Route::post('user/event/{event}/cw', 'Events\EventController@cwStoreForm')->name('events.cw.form');
Route::post('user/{user}/event/{event}','Events\EventController@cwIsPresent')->name('events.cw.is_present');

Route::group(['middleware' => 'auth'], function () {
    Route::get('myProfile', 'HomeController@index')->name('myProfile');
    Route::get('myProfile/edit', 'Users\UserController@editMyProfile')->name('editMyProfile');
    Route::resource('user', 'Users\UserController')->names('user');
    //epay payments routes
    Route::get('course/payment/create', 'Admin\AdminController@createPayment')->name('course.payment.create');
    Route::post('course/payment/store', 'Admin\AdminController@storePayment')->name('course.payment.store');
    Route::get('course/payment/finish',function() {
        return view('course.paymentThankYouPage');
    })->name('course.payment.finish');

    //polls vote
    Route::post('poll/user/vote', 'Admin\PollController@userVote')->name('user.vote.poll');

    //applications
    Route::resource('application', 'Courses\ApplicationController', [
        'except' => [
            'create',
            'store'
        ]
    ])->names('application');

    //cw loggedin redirect
    Route::get('user/in/event/{event}/register','Events\EventController@cwRegister')->name('logged.cw.register');

    //tests user routes
    Route::get('prepare/test','Users\TestController@prepareUserTest')->name('prepare.test');
    Route::get('test/user/start','Users\TestController@start')->name('test.start');
    Route::post('test/user/answer','Users\TestController@answer')->name('test.send.answer');
    Route::get('test/user/submit','Users\TestController@submitTest')->name('test.submit');
    // users education section
    Route::post('user/create/education/', 'Users\UserController@createEducation')->name('create.education');
    Route::post('user/update/education/', 'Users\UserController@updateEducation')->name('update.education');
    Route::delete('user/delete/education/{education}',
        'Users\UserController@deleteEducation')->name('delete.education');

    //users work experience section
    Route::post('/user/create/work/experience',
        'Users\UserController@createWorkExperience')->name('create.work.experience');
    Route::post('/user/update/work/experience',
        'Users\UserController@updateWorkExperience')->name('update.work.experience');
    Route::delete('/user/delete/work/{experience}',
        'Users\UserController@deleteWorkExperience')->name('delete.work.experience');

    //users hobbies/interests section
    Route::post('/user/create/hobbies', 'Users\UserController@createHobbies')->name('create.hobbies');
    Route::delete('/user/delete/hobbie/{hobbie}', 'Users\UserController@deleteHobbie')->name('delete.hobbie');
    Route::get('/interest/{type}', 'Users\UserController@getInterests')->name('get.interest');

    //institution name autocomplete
    Route::get('/user/education/autocomplete', 'Users\UserController@eduAutocomplete')->name('edu.institution');

    //list all events
    Route::get('/user/events/all', 'Events\EventController@index')->name('users.events');

    Route::get('/user/event/{event}/register/team',
        'Events\EventController@registerTeam')->name('events.register.team');
    Route::post('/user/event/{event}/store/team', 'Events\EventController@storeTeam')->name('events.store.team');
    Route::get('/user/team/{team}/deny', 'Events\EventController@inviteDeny')->name('team.invite.deny');
    Route::get('/user/event/{event}/team/{team}/accept',
        'Events\EventController@inviteAccept')->name('team.invite.accept');
    Route::post('/user/event/{event}/team/{team}/member/{teamMember}',
        'Events\EventController@confirmInvite')->name('team.confirm.invite');
    Route::post('/user/invite/to/team/{team}/event/{event}',
        'Events\EventController@inviteToTeam')->name('invite.to.team');
    Route::get('user/{user}/course/{course}/certificate/show',
        'Users\UserController@showCertificate')->name('user.cert.show');
    Route::get('/user/event/{event}','Events\EventController@show')->name('event.show');
    Route::post('/user/upload/homework','Courses\LectionController@userUploadHomework')->name('user.upload.homework');
    Route::post('/lection/homework/user/eval','Courses\LectionController@userEvalHomework')->name('user.eval.homeworks');

    Route::get('/lection/random-homework/{lectionId}','Courses\LectionController@userRandomHomework');

    Route::get('/lection/homework/{homework}/coments','Courses\LectionController@homeworkComment');

    Route::post('/lection/homework/{homework}/user/eval','Courses\LectionController@addHomeworkStudentComment')->name('student.homework.comment');
});

/* user course operations */
Route::group(['middleware' => 'auth'], function () {
//    Route::get('/user/{user?}/course/{course}', 'Courses\CourseController@showUserCourse')->name('user.course');
    Route::get('module/{module}/lections', 'Courses\LectionController@show')->name('user.module.lections');

    Route::post('/user/{user?}/course/{course}/module/{module}/lection/{lection}/comment',
        'Courses\LectionController@addComment')->name('user.module.lection.comment');
});

