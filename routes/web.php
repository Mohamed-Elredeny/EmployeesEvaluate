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

Route::get('/', function () {
    return view('admin.login');
});

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
