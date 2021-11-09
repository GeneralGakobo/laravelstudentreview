<?php

use Illuminate\Support\Facades\Route;
use App\Models\school;

Route::get('/', function () {
    return view('auth.login');
});

 Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('register-student', [App\Http\Controllers\StudentController::class, 'register_student']);
Route::post('student-reg', [App\Http\Controllers\StudentController::class, 'create_student'])->name('student-reg');


Route::get('schools', [App\Http\Controllers\SchoolController::class, 'index']);
Route::post('add-school', [App\Http\Controllers\SchoolController::class, 'create']);
Route::get('/add-school', [App\Http\Controllers\SchoolController::class, 'create_page']);
Route::post('edit-school-modal', function (){ return view('schools.edit_modal'); })->name('edit-school-modal');
Route::post('edit-school', [App\Http\Controllers\SchoolController::class, 'edit'])->name('edit-school');
Route::get('delete-school/{id}', [App\Http\Controllers\SchoolController::class, 'delete']);

Route::get('departments', [App\Http\Controllers\DepartmentController::class, 'index']);
Route::post('add-department', [App\Http\Controllers\DepartmentController::class, 'create']);
Route::get('/add-department', [App\Http\Controllers\DepartmentController::class, 'create_page']);
Route::post('edit-department-modal', function (){ $school = school::select('schools.*')->get(); return view('departments.edit_modal',[ "school"=>$school ]); })->name('edit-department-modal');
Route::post('edit-department', [App\Http\Controllers\DepartmentController::class, 'edit'])->name('edit-department');
Route::get('delete-department/{id}', [App\Http\Controllers\DepartmentController::class, 'delete']);
