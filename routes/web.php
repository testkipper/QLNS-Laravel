<?php

use Illuminate\Support\Facades\Route;
require __DIR__.'/auth.php';
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

Route::get('/roles', 'PermissionController@Permission');

Route::middleware(['admin'])->group(function () {
    Route::get('/', ['as'=>'home', 'uses'=>'HomeController@index']);
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');
});


//ROUTE START department-manager
Route::post('/department-manager', ['as'=>'insertDepartment', 'uses'=>'DepartmentController@insertDepartment']);
Route::get('/department-manager', ['as'=>'departmentManager', 'uses'=>'DepartmentController@index']);

Route::get('department-manager/{id}/delete',['as'=>'delDepartment', 'uses'=>'DepartmentController@delDepartment']);

Route::get('department-manager/{id}/edit',['as'=>'departmentedit','uses'=>'DepartmentController@edit']);
Route::post('department-manager/{id}/edit',['as'=>'departmentupdate','uses'=>'DepartmentController@update']);
//ROUTE: END route department-manager



//ROUTE START user-manager
Route::get('/user-manager', ['as'=>'usermanager', 'uses'=>'UserController@userList']);
Route::post('/user-manager/register', ['as'=>'userregister', 'uses'=>'UserController@store']);
Route::get('/usermanager/{id}/{hash}', ['as'=>'verify', 'uses'=>'VerifyEmailController@__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('/usermanager/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');
//ROUTE: END user-manager




























//ROUTE START project-manager
Route::post('/project-manager', ['as'=>'insertProject', 'uses'=>'ProjectController@insertProject']);
Route::get('/project-manager', ['as'=>'projectManager', 'uses'=>'ProjectController@index']);
Route::get('project-manager/{id}',['as'=>'delProject', 'uses'=>'ProjectController@delProject']);


Route::get('project-manager/{id}/edit',['as'=>'projectEdit','uses'=>'ProjectController@edit']);
Route::post('project-manager/{id}/edit',['as'=>'projectUpdate','uses'=>'ProjectController@update']);
//ROUTE: END project-manager






























































































































































//ROUTE START employee-manager
Route::get('employee-manager', ['as' => 'employeeList', 'uses' => 'EmployeeController@index']);
Route::get('addEmployee', ['as' => 'addEmployee', 'uses' => 'EmployeeController@insertEmployee']);
Route::post('/employee-manager/create', ['as' => 'insert', 'uses' => 'EmployeeController@addEmployee']);
//ROUTE: END route employee-manager
//ROUTE START position-manager
Route::post('/position-manager', ['as'=>'insertPosition', 'uses'=>'PositionController@insertPosition']);
Route::get('/position-manager', ['as'=>'positionManager', 'uses'=>'PositionController@index']);
Route::get('position-manager/{id}',['as'=>'delPosition', 'uses'=>'PositionController@delPosition']);

Route::get('position-manager/{id}/edit',['as'=>'positionEdit','uses'=>'PositionController@edit']);
Route::post('position-manager/{id}/edit',['as'=>'positionUpdate','uses'=>'PositionController@update']);
//ROUTE: END route position-manager



//ROUTE START education-manager
Route::post('/education-manager', ['as'=>'insertEducation', 'uses'=>'EducationController@insertEducation']);

Route::get('/education-manager', ['as'=>'educationManager', 'uses'=>'EducationController@index']);
Route::get('education-manager/{id}',['as'=>'delEducation', 'uses'=>'EducationController@delEducation']);


Route::get('education-manager/{id}/edit',['as'=>'educationEdit','uses'=>'EducationController@edit']);
Route::post('education-manager/{id}/edit',['as'=>'educationUpdate','uses'=>'EducationController@update']);
//ROUTE: END route position-manager


//ROUTE START labourcontract-manager
Route::post('/labourcontract-manager', ['as'=>'insertLabourContract', 'uses'=>'LabourContractController@insertLabourContract']);

Route::get('/labourcontract-manager', ['as'=>'labourContractManager', 'uses'=>'LabourContractController@index']);

Route::get('labourcontract-manager/{id}',['as'=>'delLabourContract', 'uses'=>'LabourContractController@delLabourContract']);

Route::get('labourcontract-manager/{id}/edit',['as'=>'labourContractEdit','uses'=>'LabourContractController@edit']);
Route::post('labourcontract-manager/{id}/edit',['as'=>'labourContractUpdate','uses'=>'LabourContractController@update']);
//ROUTE: END labourcontract-manager



//ROUTE START salary-manager
Route::post('/salary-manager', ['as'=>'insertSalary', 'uses'=>'SalaryController@insertSalary']);
Route::get('/salary-manager', ['as'=>'salaryManager', 'uses'=>'SalaryController@index']);
Route::get('salary-manager/{id}',['as'=>'delSalary', 'uses'=>'SalaryController@delSalary']);

Route::get('salary-manager/{id}/edit',['as'=>'salaryEdit','uses'=>'SalaryController@edit']);
Route::post('salary-manager/{id}/edit',['as'=>'salaryUpdate','uses'=>'SalaryController@update']);
//ROUTE: END salary-manager

