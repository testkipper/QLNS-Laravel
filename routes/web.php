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


//ROUTE START department-manager
Route::post('/department-manager', ['as'=>'insertDepartment', 'uses'=>'DepartmentController@insertDepartment']);
Route::get('/department-manager', ['as'=>'departmentManager', 'uses'=>'DepartmentController@index']);

Route::get('department-manager/{id}/delete',['as'=>'delDepartment', 'uses'=>'DepartmentController@delDepartment']);


//ROUTE: END route department-manager
//ROUTE START project-manager
Route::post('/project-manager', ['as'=>'insertProject', 'uses'=>'ProjectController@insertProject']);
Route::get('/project-manager', ['as'=>'projectManager', 'uses'=>'ProjectController@index']);
Route::get('project-manager/{id}',['as'=>'delProject', 'uses'=>'ProjectController@delProject']);
//ROUTE: END route project-manager
Route::get('department-manager/{id}/edit',['as'=>'departmentedit','uses'=>'DepartmentController@edit']);
Route::post('department-manager/{id}/edit',['as'=>'departmentupdate','uses'=>'DepartmentController@update']);
//ROUTE: END route department-manager





























































































































































//ROUTE START employee-manager
Route::get('employee-manager', ['as' => 'employeeList', 'uses' => 'EmployeeController@index']);
Route::get('addEmployee', ['as' => 'addEmployee', 'uses' => 'EmployeeController@insertEmployee']);
Route::post('', ['as' => 'insert', 'uses' => 'EmployeeController@addEmployee']);
//ROUTE: END route employee-manager