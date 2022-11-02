<?php

use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::middleware('UserControll')->group(function (){

        Route::middleware('AdminControll')->group(function () {
            Route::get('/admin', [UserController::class, 'adminView'])->name('admin');
            Route::get('/addgroup', [GroupController::class, 'addGroup'])->name('add_group');
            Route::post('/addgroup', [GroupController::class, 'addGroupPost']);
            Route::get('/addcab', [ClassRoomController::class, 'addCabinets'])->name('add_cab');
            Route::post('/addcab', [ClassRoomController::class, 'addCabinetsPost']);
            Route::get('/addsub', [SubjectController::class, 'addSubject'])->name('add_sub');
            Route::post('/addsub', [SubjectController::class, 'addSubjectsPost']);
            Route::get('/registration', [UserController::class, 'registration'])->name('reg');
            Route::post('/registration', [UserController::class, 'registrationPost']);
            Route::get('/addteacher', [TeacherController::class, 'addTeacherView'])->name('add_teacher');
            Route::post('/addteacher', [TeacherController::class, 'addTeacherPost']);

            Route::get('/studentslist', [UserController::class, 'studentList'])->name('student_list');
            Route::get('/teacherlist', [UserController::class, 'teacherList'])->name('teacher_list');
            Route::get('/deleteUser/{user}', [UserController::class, 'deleteUser'])->name('delete_user');
            Route::post('/deleteUser/{user}', [UserController::class, 'deleteUserPost']);
            Route::get('/deleteTeacher/{teacher}', [TeacherController::class, 'deleteTeacher'])->name('delete_teacher');
            Route::post('/deleteTeacher/{teacher}', [TeacherController::class, 'deleteTeacherPost']);
        });

        Route::get('/addpairs', [ScheduleController::class, 'addPairs'])->name('add_pairs');
        Route::post('/addpairs', [ScheduleController::class, 'addPairsPost']);
        Route::get('/editschedule/{schedule}', [ScheduleController::class, 'editScheduleView'])->name('edit_schedule');
        Route::post('/editschedule/{schedule}', [ScheduleController::class, 'editSchedulePost']);
        Route::get('/deleteschedule/{schedule}', [ScheduleController::class, 'deleteScheduleView'])->name('delete_schedule');
        Route::post('/deleteschedule/{schedule}', [ScheduleController::class, 'deleteSchedulePost']);



});
Route::get('/login', [UserController::class, 'loginView'])->name('login');
Route::post('/login', [UserController::class, 'loginPost'])->name('loginPost');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');




Route::get('/account', [UserController::class, 'accountView'])->name('acc');

Route::get('/warning', [UserController::class, 'warning'])->name('warning');

Route::get('/schedule', [ScheduleController::class, 'scheduleView'])->name('schedule');
Route::post('/schedule', [ScheduleController::class, 'schedulePost']);

