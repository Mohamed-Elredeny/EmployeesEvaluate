<?php

use Illuminate\Support\Facades\Artisan;
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

Route::get('/certificate', function () {
    return view('admin.certificate');
});

Route::get('/tasks', function () {
    $rand = rand(0,1);
    $rand1 = rand(0,1);
    $name = ['martina','mohamed'];
   return $name[$rand] .  'Task ' . ($rand1 + 1);
});

/*Route::get('export', 'DemoController@export')->name('export');*/
/*Route::get('importExportView', 'DemoController@importExportView');*/
Route::post('import', 'admin\CertificateController@import')->name('import');
Route::post('importEmployees', 'admin\CertificateController@importEmployees')->name('import.employees');

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Admin routes
/*
Route::get('/', function () {
    return view('admin.login.user');
})->name('employee.login');*/

Route::get('/', 'Auth\Employee\EmployeeLoginController@showLoginForm')->name('employee.login');
Route::prefix('employees')->group(function(){
    Route::post('/login', 'Auth\Employee\EmployeeLoginController@login')->name('employee.login.submit');
});

Route::prefix('admins')->group(function(){
    Route::get('/login', 'Auth\Admin\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\Admin\AdminLoginController@login')->name('admin.login.submit');
});

Route::prefix('managers')->group(function(){
    Route::get('/login', 'Auth\Manager\ManagerLoginController@showLoginForm')->name('manager.login');
    Route::post('/login', 'Auth\Manager\ManagerLoginController@login')->name('manager.login.submit');
});
