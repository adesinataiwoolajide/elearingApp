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

// Route::get('/login', function () {
//     return view('welcome');
// });
Route::get("/", "AdministratorController@login")->name("admin.login");
Route::post("/user_login", "AdministratorController@userlogin")->name("admin.login");
Route::get("/logout", "AdministratorController@logout")->name("admin.logout");
Route::get("/administrator", "AdministratorController@index")->name("admin.index");


// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Auth::routes(['verify' => true]);
Route::get("/administrator/dashboard", "AdministratorController@dashboard")->name("administrator.dashboard");
Route::group(["prefix" => "administrator", "middleware" => "verified"], function(){

    Route::group(["prefix" => "users"], function(){
        Route::get("/index", "UserController@index")->name("user.create");
        Route::post("/save", "UserController@store")->name("user.save");
        Route::get("/edit/{user_id}", "UserController@edit")->name("user.edit");
        Route::get("/delete/{user_id}", "UserController@destroy")->name("user.delete");
        Route::post("/update/{user_id}", "UserController@update")->name("user.update");
        Route::get("/recyclebin", "UserController@bin")->name("user.restore");
        Route::get("/restore/{user_id}", "UserController@restore")->name("user.undelete");
        Route::get("/change_password", "UserController@resetpassword")->name("change.pasword");
        Route::post("/update_password/{user_id}", "UserController@updatepassword")->name("update.password");
        Route::get("/profile", "UserController@profile")->name("user.profile");
        Route::post("/update_profile/{user_id}", "UserController@updateprofile")->name("profile.update");
        Route::get("/suspend/{user_id}", "UserController@suspendAccount")->name("user.suspend");
        Route::get("/unsuspend/{user_id}", "UserController@unSuspendAccount")->name("user.unsuspend");
    });

    Route::group(["prefix" => "courses"], function(){
        Route::get("/index", "CourseController@index")->name("course.create");
        Route::post("/save", "CourseController@store")->name("course.save");
        Route::get("/edit/{course_code}", "CourseController@edit")->name("course.edit");
        Route::get("/delete/{course_code}", "CourseController@destroy")->name("course.delete");
        Route::post("/update/{course_code}", "CourseController@update")->name("course.update");
        Route::get("/recyclebin", "CourseController@bin")->name("course.restore");
        Route::get("/restore/{course_id}", "CourseController@restore")->name("course.undelete");

    });

    Route::group(["prefix" => "staffs"], function(){
        Route::get("/index", "StaffController@index")->name("staff.create");
        Route::post("/save", "StaffController@store")->name("staff.save");
        Route::get("/edit/{staff_email}", "StaffController@edit")->name("staff.edit");
        Route::get("/delete/{staff_email}", "StaffController@destroy")->name("staff.delete");
        Route::post("/update/{staff_email}", "StaffController@update")->name("staff.update");

        Route::get("/recyclebin", "StaffController@bin")->name("staff.restore");
        Route::get("/restore/{staff_email}", "StaffController@restore")->name("staff.undelete");

    });

    Route::group(["prefix" => "course_allocation"], function(){
        Route::get("/index", "CourseAllocationController@index")->name("allocation.create");
        Route::post("/save", "CourseAllocationController@store")->name("allocation.save");
        Route::get("/edit/{allocation_id}", "CourseAllocationController@edit")->name("allocation.edit");
        Route::get("/delete/{allocation_id}", "CourseAllocationController@destroy")->name("allocation.delete");
        Route::post("/update/{allocation_id}", "CourseAllocationController@update")->name("allocation.update");
        Route::get("/recyclebin", "CourseAllocationController@bin")->name("allocation.restore");
        Route::get("/restore/{allocation_id}", "CourseAllocationController@restore")->name("allocation.undelete");

    });

    Route::group(["prefix" => "students"], function(){
        Route::get("/index", "StudentController@index")->name("student.create");
        Route::post("/save", "StudentController@store")->name("student.save");
        Route::get("/edit/{matric_number}", "StudentController@edit")->name("student.edit");
        Route::get("/delete/{matric_number}", "StudentController@destroy")->name("student.delete");
        Route::post("/update/{matric_number}", "StudentController@update")->name("student.update");
        Route::get("/recyclebin", "StudentController@bin")->name("student.restore");
        Route::get("/restore/{student_email}", "StudentController@restore")->name("student.undelete");

    });

    Route::group(["prefix" => "assignments"], function(){
        Route::get("/index", "AssignmentController@index")->name("assignment.index");
        Route::get("/assignment_create/{allocation_id}", "AssignmentController@create")->name("assignment.create");
        Route::post("/save", "AssignmentController@store")->name("assignment.save");
        Route::get("/edit/{assignment_id}", "AssignmentController@edit")->name("assignment.edit");
        Route::get("/delete/{assignment_id}", "AssignmentController@destroy")->name("assignment.delete");
        Route::post("/update/{assignment_id}", "AssignmentController@update")->name("assignment.update");
        Route::get("/recyclebin", "AssignmentController@bin")->name("assignment.restore");
        Route::get("/restore/{assignment_id}", "AssignmentController@restore")->name("assignment.undelete");

        Route::get("/solution/{assignment_id}", "AssignmentSolutionController@create")->name("assignment.solution");
        Route::post("/solution_save", "AssignmentSolutionController@store")->name("solution.save");

    });

    Route::group(["prefix" => "submissions"], function(){
        Route::get("/new", "AssignmentSolutionController@index")->name("submissions.index");
        Route::get("/marked", "AssignmentSolutionController@marked")->name("submissions.marked");
        Route::get("/all", "AssignmentSolutionController@list")->name("submissions.list");
        Route::get("/edit", "AssignmentSolutionController@edit")->name("submissions.edit");
    });

    Route::group(["prefix" => "results"], function(){
        Route::get("/index", "AssignmentResultController@index")->name("result.index");
        Route::post("/save", "AssignmentResultController@store")->name("result.save");
        Route::get("/edit", "AssignmentResultController@edit")->name("result.edit");
    });



});

