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












































//ROUTE START project-manager
Route::post('/project-manager', ['as'=>'insertProject', 'uses'=>'ProjectController@insertProject']);
Route::get('/project-manager', ['as'=>'projectManager', 'uses'=>'ProjectController@index']);
Route::get('project-manager/{id}',['as'=>'delProject', 'uses'=>'ProjectController@delProject']);

Route::get('project-manager/{id}/edit',['as'=>'projectEdit','uses'=>'ProjectController@edit']);
Route::post('project-manager/{id}/edit',['as'=>'projectUpdate','uses'=>'ProjectController@update']);
//ROUTE: END route project-manager







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





