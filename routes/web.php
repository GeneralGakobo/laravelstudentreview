<?php

use Illuminate\Support\Facades\Route;
use App\Models\school;
use App\Models\course;

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
//departments
Route::get('departments', [App\Http\Controllers\DepartmentController::class, 'index']);
Route::post('add-department', [App\Http\Controllers\DepartmentController::class, 'create']);
Route::get('/add-department', [App\Http\Controllers\DepartmentController::class, 'create_page']);
Route::post('edit-department-modal', function (){ $school = school::select('schools.*')->get(); return view('departments.edit_modal',[ "school"=>$school ]); })->name('edit-department-modal');
Route::post('edit-department', [App\Http\Controllers\DepartmentController::class, 'edit'])->name('edit-department');
Route::get('delete-department/{id}', [App\Http\Controllers\DepartmentController::class, 'delete']);

//Designation

Route::get('designations', [App\Http\Controllers\DesignationController::class, 'index']);
Route::post('add-designation', [App\Http\Controllers\DesignationController::class, 'create']);
Route::get('/add-designation', [App\Http\Controllers\DesignationController::class, 'create_page']);
Route::post('edit-designation-modal', function (){ return view('designation.edit_modal'); })->name('edit-designation-modal');
Route::post('edit-designation', [App\Http\Controllers\DesignationController::class, 'edit'])->name('edit-designation');
Route::get('delete-designation/{id}', [App\Http\Controllers\DesignationController::class, 'delete']);

//employmenttype
Route::get('employmenttype', [App\Http\Controllers\EmploymentTypeController::class, 'index']);
Route::post('add-employmenttype', [App\Http\Controllers\EmploymentTypeController::class, 'create']);
Route::get('/add-employmenttype', [App\Http\Controllers\EmploymentTypeController::class, 'create_page']);
Route::post('edit-employmenttype-modal', function (){ return view('employmenttypes.edit_modal'); })->name('edit-employmenttype-modal');
Route::post('edit-employmenttype', [App\Http\Controllers\EmploymentTypeController::class, 'edit'])->name('edit-employmenttype');
Route::get('delete-employmenttype/{id}', [App\Http\Controllers\EmploymentTypeController::class, 'delete']);

//staffcategory
Route::get('staffcategory', [App\Http\Controllers\StaffCategoryController::class, 'index']);
Route::post('add-staffcategory', [App\Http\Controllers\StaffCategoryController::class, 'create']);
Route::get('/add-staffcategory', [App\Http\Controllers\StaffCategoryController::class, 'create_page']);
Route::post('edit-staffcategory-modal', function (){ return view('staffcategory.edit_modal'); })->name('edit-staffcategory-modal');
Route::post('edit-staffcategory', [App\Http\Controllers\StaffCategoryController::class, 'edit'])->name('edit-staffcategory');
Route::get('delete-staffcategory/{id}', [App\Http\Controllers\StaffCategoryController::class, 'delete']);

//competencygroups
Route::get('competencygroups', [App\Http\Controllers\CompetenciesGroupsController::class, 'index']);
Route::post('add-competencygroups', [App\Http\Controllers\CompetenciesGroupsController::class, 'create']);
Route::get('/add-competencygroups', [App\Http\Controllers\CompetenciesGroupsController::class, 'create_page']);
Route::post('edit-competencygroups-modal', function (){ return view('competencygroups.edit_modal'); })->name('edit-competencygroups-modal');
Route::post('edit-competencygroups', [App\Http\Controllers\CompetenciesGroupsController::class, 'edit'])->name('edit-competencygroups');
Route::get('delete-competencygroups/{id}', [App\Http\Controllers\CompetenciesGroupsController::class, 'delete']);

//students
Route::get('student', [App\Http\Controllers\StudentController::class, 'index']);
Route::post('add-students', [App\Http\Controllers\StudentController::class, 'create'])->name('add-students');
Route::get('/add-student', [App\Http\Controllers\StudentController::class, 'create_page']);
Route::post('edit-student-modal', function (){ $course = course::select('courses.*')->get(); return view('students.edit_modal',[ "course"=>$course ]); })->name('edit-student-modal');
Route::post('edit-student', [App\Http\Controllers\StudentController::class, 'edit'])->name('edit-student');
Route::get('delete-student/{id}', [App\Http\Controllers\StudentController::class, 'delete']);
