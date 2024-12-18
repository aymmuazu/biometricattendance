<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EntrollmentController;


Route::get('/', HomeController::class)->name('home.login')->middleware('guest');

Route::post('/', [HomeController::class, 'login'])->middleware('guest');

Route::get('/user/dashboard', [DashboardController::class, 'dashboard'])->name('user.dashboard')->middleware('auth');
Route::get('/user/attendance', [AttendanceController::class, 'attendance'])->name('user.attendance')->middleware('auth');
Route::get('/user/students', [StudentController::class, 'students'])->name('user.students')->middleware('auth');
Route::post('/user/students/store', [StudentController::class, 'storeStudent'])->name('user.students.store')->middleware('auth');
Route::delete('/user/students/delete/{id}', [StudentController::class, 'destroyStudent'])->name('user.students.destroy');


Route::get('/user/entrollment', [EntrollmentController::class, 'entrollment'])->name('user.entrollment')->middleware('auth');
Route::get('/user/entrollment/entroll/{student}/{reg_no}', [EntrollmentController::class, 'viewEntroll'])->name('user.entrollment.viewEntroll')->middleware('auth');

Route::get('/user/admins', [UserController::class, 'admins'])->name('user.admins')->middleware('auth');
Route::post('/user/admins', [UserController::class, 'storeadmins'])->name('user.admins.store')->middleware('auth');



Route::get('/user/logout', [DashboardController::class, 'logout'])->name('user.logout')->middleware('auth');
