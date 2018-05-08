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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

Route::get('ID/{id?}',function ($id='20'){
    echo 'ID :'.$id;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/user')->group(function(){
    Route::get('/', 'HomeController@index')->name('user.home');
    Route::get('/reset-password','PasswordResetController@index')->name('user.password_reset');
    Route::post('/reset-proccess','PasswordResetController@resetPassword')->name('user.proccess_reset');
    Route::get('/absence','AbsenceController@index')->name('user.absence');
    Route::get('/student','StudentController@index')->name('user.student');
    Route::get('/schedule','ScheduleController@index')->name('user.schedule');
    Route::get('/teacher','TeacherController@index')->name('user.teacher');
});

Route::prefix('/admin')->group(function(){
    Route::get('/', 'HomeController@index');

    Route::get('/edit-lesson','AdminEditController@editLesson')->name('admin.lesson');
    Route::post('/add-lesson','AdminEditController@addLesson')->name('admin.lesson-add');
    Route::post('/update-lesson','AdminEditController@updateLesson')->name('admin.lesson-edit');
    Route::post('/delete-lesson','AdminEditController@deleteLesson')->name('admin.lesson-delete');

    Route::get('/edit-class','AdminEditController@editClass')->name('admin.class');
    Route::post('/add-class','AdminEditController@addClass')->name('admin.class-add');
    Route::post('/update-class','AdminEditController@updateClass')->name('admin.class-edit');
    Route::post('/delete-class','AdminEditController@deleteClass')->name('admin.class-delete');

    Route::get('/edit-schedule','AdminEditController@editSchedule')->name('admin.schedule');
    Route::post('/add-schedule','AdminEditController@addSchedule')->name('admin.schedule-add');
    Route::post('/update-schedule','AdminEditController@updateSchedule')->name('admin.schedule-edit');
    Route::post('/delete-schedule','AdminEditController@deleteSchedule')->name('admin.schedule-delete');

    Route::get('/edit-student','AdminEditController@editStudent')->name('admin.student');
    Route::post('/add-student','AdminEditController@addStudent')->name('admin.student-add');
    Route::post('/delete-student','AdminEditController@deleteStudent')->name('admin.student-delete');
    Route::post('/update-student','AdminEditController@updateStudent')->name('admin.student-edit');

    Route::get('/edit-lecture','AdminEditController@editLeacture')->name('admin.lecture');
    Route::post('/add-lecture','AdminEditController@addLeacture')->name('admin.lecture-add');
    Route::post('/delete-lecture','AdminEditController@deleteLeacture')->name('admin.lecture-delete');
    Route::post('/update-lecture','AdminEditController@updateLeacture')->name('admin.lecture-edit');

    Route::get('/edit-teacher','AdminEditController@editTeacher')->name('admin.teacher');
    Route::post('/add-teacher','AdminEditController@addTeacher')->name('admin.teacher-add');
    Route::post('/delete-teacher','AdminEditController@deleteTeacher')->name('admin.teacher-delete');
    Route::post('/update-teacher','AdminEditController@updateTeacher')->name('admin.teacher-edit');

    Route::get('/edit-absence','AdminEditController@editAbsence')->name('admin.absence');
    Route::post('/edit-absence','AdminEditController@editAbsence')->name('admin.absence');

});
