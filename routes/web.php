<?php

use Illuminate\Support\Facades\Route;
use App\Models\school;
use App\Models\course;
use App\Models\Department;
use App\Models\semester;
use App\Models\student;
use App\Models\semesterUnits;
use App\Models\lecturer;
use App\Models\units;
use App\Models\admins;
use App\Models\employmentType;
use App\Models\designation;
use App\Models\staffCategory;
use App\Models\competenciesGroups;


Route::get('/', function () {
    return view('auth.login');
});

 Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('register-student', [App\Http\Controllers\StudentController::class, 'register_student']);
Route::post('student-reg', [App\Http\Controllers\StudentController::class, 'create_student'])->name('student-reg');


Route::get('schools', [App\Http\Controllers\SchoolController::class, 'index_school']);
Route::post('add-school', [App\Http\Controllers\SchoolController::class, 'create']);
Route::get('/add-school', [App\Http\Controllers\SchoolController::class, 'create_page']);
Route::post('edit-school-modal', function (){ return view('schools.edit_modal'); })->name('edit-school-modal');
Route::post('edit-school/{id}', [App\Http\Controllers\SchoolController::class, 'edit_school'])->name('edit-school');
Route::get('delete-school/{id}', [App\Http\Controllers\SchoolController::class, 'delete']);
//departments
Route::get('departments', [App\Http\Controllers\DepartmentController::class, 'index']);
Route::post('add-department', [App\Http\Controllers\DepartmentController::class, 'create']);
Route::get('/add-department', [App\Http\Controllers\DepartmentController::class, 'create_page']);
Route::post('edit-department-modal', function (){ $school = school::select('schools.*')->get(); return view('departments.edit_modal',[ "school"=>$school ]); })->name('edit-department-modal');
Route::post('edit-department/{id}', [App\Http\Controllers\DepartmentController::class, 'edit_department'])->name('edit-department');
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
Route::post('edit-staffcategory/{id}', [App\Http\Controllers\StaffCategoryController::class, 'edit'])->name('edit-staffcategory');
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

//admins
Route::get('admin', [App\Http\Controllers\AdminsController::class, 'index']);
Route::post('add-admin', [App\Http\Controllers\AdminsController::class, 'create'])->name('add-admin');
Route::get('/add-admin', [App\Http\Controllers\AdminsController::class, 'create_page']);
Route::post('edit-admin-modal', function (){ $admins = admins::select('admins.*')->get(); return view('admins.edit_modal',[ "admins"=>$admins ]); })->name('edit-admin-modal');
Route::post('edit-admin', [App\Http\Controllers\AdminsController::class, 'edit'])->name('edit-admin');
Route::get('delete-admin/{id}', [App\Http\Controllers\AdminsController::class, 'delete']);
 
//lecturers
Route::get('lecturer', [App\Http\Controllers\LecturerController::class, 'index']);
Route::post('add-lecturer', [App\Http\Controllers\LecturerController::class, 'create'])->name('add-lecturer');
Route::get('/add-lecturer', [App\Http\Controllers\LecturerController::class, 'create_page']);
Route::post('edit-lecturer-modal', function (){ $Department = Department::select('departments.*')->get();
    $employmentType=employmentType::select('employment_types.*')->get();
    $designation=designation::select('designations.*')->get();
    $staffCategory=staffCategory::select('staff_categories.*')->get();
     return view('lecturers.edit_modal',[ "Department"=>$Department ,"employmentType"=>$employmentType,"staffCategory"=>$staffCategory,"designation"=>$designation]); })->name('edit-lecturer-modal');
Route::post('edit-lecturer', [App\Http\Controllers\LecturerController::class, 'edit'])->name('edit-lecturer');
Route::get('delete-lecturer/{id}', [App\Http\Controllers\LecturerController::class, 'delete']);

//HOD
Route::get('hod', [App\Http\Controllers\HodController::class, 'index']);
Route::post('add-hod', [App\Http\Controllers\HodController::class, 'create'])->name('add-hod');
Route::get('/add-hod', [App\Http\Controllers\HodController::class, 'create_page']);
Route::post('edit-hod-modal', function (){ $Department = Department::select('departments.*')->get();
    $employmentType=employmentType::select('employment_types.*')->get();
    $designation=designation::select('designations.*')->get();
    $staffCategory=$staffCategory::select('staff_categories.*')->get();
     return view('hod.edit_modal',[ "Department"=>$Department ,"employmentType"=>$employmentType,"staffCategory"=>$staffCategory,"designation"=>$designation]); })->name('edit-hod-modal');
Route::post('edit-hod', [App\Http\Controllers\HodController::class, 'edit'])->name('edit-hod');
Route::get('delete-hod/{id}', [App\Http\Controllers\HodController::class, 'delete']);

//units
Route::get('unit', [App\Http\Controllers\UnitsController::class, 'index']);
Route::post('add-unit', [App\Http\Controllers\UnitsController::class, 'create']);
Route::get('/add-unit', [App\Http\Controllers\UnitsController::class, 'create_page']);
Route::post('edit-unit-modal', function (){ $course = course::select('courses.*')->get(); return view('units.edit_modal',[ "course"=>$course ]); })->name('edit-unit-modal');
Route::post('edit-unit', [App\Http\Controllers\UnitsController::class, 'edit'])->name('edit-unit');
Route::get('delete-unit/{id}', [App\Http\Controllers\UnitsController::class, 'delete']);

//course
Route::get('course', [App\Http\Controllers\CourseController::class, 'index']);
Route::post('add-course', [App\Http\Controllers\CourseController::class, 'create']);
Route::get('/add-course', [App\Http\Controllers\CourseController::class, 'create_page']);
Route::post('edit-course-modal', function (){ $Department = Department::select('departments.*')->get(); return view('course.edit_modal',[ "Department"=>$Department ]); })->name('edit-course-modal');
Route::post('edit-course', [App\Http\Controllers\CourseController::class, 'edit'])->name('edit-course');
Route::get('delete-course/{id}', [App\Http\Controllers\CourseController::class, 'delete']);

//competency
Route::get('competency', [App\Http\Controllers\CompetencyController::class, 'index']);
Route::post('add-competency', [App\Http\Controllers\CompetencyController::class, 'create']);
Route::get('/add-competency', [App\Http\Controllers\CompetencyController::class, 'create_page']);
Route::post('edit-competency-modal', function (){ $competenciesGroups = competenciesGroups::select('competencies_groups.*')->get(); return view('competency.edit_modal',[ "competenciesGroups"=>$competenciesGroups ]); })->name('edit-competency-modal');
Route::put('edit-competency', [App\Http\Controllers\CompetencyController::class, 'edit_'])->name('edit-competency');
Route::get('delete-competency/{id}', [App\Http\Controllers\CompetencyController::class, 'delete']);

//semester
Route::get('semester', [App\Http\Controllers\SemesterController::class, 'index']);
Route::post('add-semester', [App\Http\Controllers\SemesterController::class, 'create']);
Route::get('/add-semester', [App\Http\Controllers\SemesterController::class, 'create_page']);
Route::post('edit-semester-modal', function (){ return view('semesters.edit_modal'); })->name('edit-semester-modal');
Route::post('edit-semester', [App\Http\Controllers\SemesterController::class, 'edit'])->name('edit-semester');
Route::get('delete-semester/{id}', [App\Http\Controllers\SemesterController::class, 'delete']);

//semesterunits
Route::get('semesterunit', [App\Http\Controllers\SemesterUnitsController::class, 'index']);
Route::post('add-semesterunit', [App\Http\Controllers\SemesterUnitsController::class, 'create']);
Route::get('/add-semesterunit', [App\Http\Controllers\SemesterUnitsController::class, 'create_page']);
Route::post('edit-semesterunit-modal', function (){
    $semesterUnits = units::select('units.*')->get();
    $lecturer = lecturer::select('lecturers.*')->get();
    $semester = semester::select('semesters.*')->get();
     return view('semesterunits.edit_modal',[ "semesterUnits"=>$semesterUnits,"lecturer"=>$lecturer,"semester"=>$semester]); })->name('edit-semesterunit-modal');
Route::post('edit-semesterunit', [App\Http\Controllers\SemesterUnitsController::class, 'edit'])->name('edit-semesterunit');
Route::get('delete-semesterunit/{id}', [App\Http\Controllers\SemesterUnitsController::class, 'delete']);

//studentselectedcourses
Route::get('studentselectedcourse', [App\Http\Controllers\StudentSelectedCourseController::class, 'index']);
Route::post('add-studentselectedcourse', [App\Http\Controllers\StudentSelectedCourseController::class, 'create']);
Route::get('/add-studentselectedcourse', [App\Http\Controllers\StudentSelectedCourseController::class, 'create_page']);
Route::post('edit-studentselectedcourse-modal', function (){
    $semester = semester::select('semesters.*')->get();
    $student = student::select('students.*')->get();
    $semesterUnits = semesterUnits::select('semester_units.*')->get();
     return view('studentselectedcourses.edit_modal',[ "semester"=>$semester,"student"=>$student,"semesterUnits"=>$semesterUnits]); })->name('edit-studentselectedcourse-modal');
Route::post('edit-studentselectedcourse', [App\Http\Controllers\StudentSelectedCourseController::class, 'edit'])->name('edit-studentselectedcourse');
Route::get('delete-studentselectedcourse/{id}', [App\Http\Controllers\StudentSelectedCourseController::class, 'delete']);

//competencyscore
Route::get('competencyscore', [App\Http\Controllers\CompetencyScoreController::class, 'index']);
Route::post('add-competencyscore', [App\Http\Controllers\CompetencyScoreController::class, 'create']);
Route::get('/add-competencyscore', [App\Http\Controllers\CompetencyScoreController::class, 'create_page']);
Route::post('edit-competencyscore-modal', function (){ return view('competencyscores.edit_modal'); })->name('edit-competencyscore-modal');
Route::post('edit-competencyscore', [App\Http\Controllers\CompetencyScoreController::class, 'edit'])->name('edit-competencyscore');
Route::get('delete-competencyscore/{id}', [App\Http\Controllers\CompetencyScoreController::class, 'delete']);


//evaluation routes
Route::get('evaluate', [App\Http\Controllers\EvaluateController::class, 'student_courses'])->name('evaluate');
Route::get('assess/{id}',[App\Http\Controllers\EvaluateController::class, 'assess'])->name('assess');
Route::post('assess', [App\Http\Controllers\EvaluateController::class, 'sub'])->name('assesssubmit');