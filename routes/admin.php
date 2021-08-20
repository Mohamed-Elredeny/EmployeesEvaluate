<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/manager',function(){
    return view('manager.home');
})->name('manager.dashboard');


Route::get('/employee',function(){
    return view('employee.home');
})->name('employee.dashboard');

Route::group(
    [
        'prefix' => '/admin',
        'middleware'=>'auth:admin','auth:employee','auth:manger'
    ], function(){ //...
    Route::get('/','admin\HomeController@index')->name('admin.dashboard');


    Route::resource('certificates','admin\CertificateController');
    Route::get('delete/all','admin\CertificateController@delete_all');


    Route::resource('sectors/admin-sectors','admin\SectorController');//Sectors

    Route::resource('emotions','admin\AnswerController');//Emotions

    Route::resource('employees/admin-employees','admin\EmployeeController');//Employees
    Route::get('employees/admin-employees/index_filter/{filter}','admin\EmployeeController@index_filter')->name('index_filter-employees.index');//Employees Filter

    Route::resource('managers/admin-managers','admin\ManagerController');//Managers
    Route::get('managers/admin-managers/index_filter/{filter}','admin\ManagerController@index_filter')->name('index_filter-managers.index');//Managers Filter

    Route::resource('reports/admin-reports','admin\ReportsController');
    Route::get('reports/delete/report/sector/{id}','admin\ReportsController@deleteReportSector')->name('delete.report.sector.redeny');
    Route::group(['prefix'=>'report','namespace'=>'admin'],function(){
        //Questions
        Route::get('admin-questions/{id}','QuestionsController@index')->name('report.question.show');
        Route::get('admin-questions/create/{id}','QuestionsController@create')->name('report.question.create');
        Route::post('admin-questions/store/{id}','QuestionsController@store')->name('report.question.store');
        //Evaluations
         Route::get('admin-evaluation/{id}','QuestionsController@index')->name('report.evaluation.show');
         Route::get('admin-questions/create/{id}','QuestionsController@create')->name('report.evaluation.create');
         Route::post('admin-questions/store','QuestionsController@store')->name('report.evaluation.store');
         Route::get('admin-questions/edit/{id}','QuestionsController@edit')->name('report.evaluation.edit');
         Route::put('admin-questions/update/{id}','QuestionsController@update')->name('report.evaluation.update');
         Route::delete('admin-questions/destroy/{id}','QuestionsController@destroy')->name('report.evaluation.destroy');

    });

    Route::resource('admins','admin\AdminController');
    Route::resource('evaluations','admin\EvaluationsController');

    Route::get('/employee/evaluation/{employeeId}/{reportId}', 'admin\EmployeeController@evaluation');
    Route::get('getSectorEmployee', 'admin\EvaluationsController@getSectorEmployee');
    Route::get('getSectorEmployeeReport', 'admin\EvaluationsController@getSectorEmployeeReport');

    Route::any('makeEvaluate', 'admin\EvaluationsController@makeEvaluate')->name('admin.makeEvaluate');
    Route::any('storeEvaluate', 'admin\EvaluationsController@storeEvaluate')->name('admin.storeEvaluate');

    Route::get('statistics/{sector_id}','admin\StatisticesController@index');
    });
