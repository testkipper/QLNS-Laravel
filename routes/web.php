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



Route::middleware(['admin'])->group(function () {
    Route::get('/', ['as'=>'home', 'uses'=>'HomeController@index']);
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');
});
Route::get('/employee-manager', function () {
    return view('managers.employee');
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





