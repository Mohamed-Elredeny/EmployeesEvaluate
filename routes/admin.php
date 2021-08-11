<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/admin',
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...
    Route::get('/',function(){
        return view('admin.home');
    });
    Route::resource('certificates','admin\CertificateController');
    Route::get('delete/all','admin\CertificateController@delete_all');


    Route::resource('sectors/admin-sectors','admin\SectorController');//Sectors

    Route::resource('emotions','admin\AnswerController');//Emotions

    Route::resource('employees/admin-employees','admin\EmployeeController');//Employees
    Route::get('employees/admin-employees/index_filter/{filter}','admin\EmployeeController@index_filter')->name('index_filter-employees.index');//Employees Filter

    Route::resource('managers/admin-managers','admin\ManagerController');//Managers
    Route::get('managers/admin-managers/index_filter/{filter}','admin\ManagerController@index_filter')->name('index_filter-managers.index');//Managers Filter

    Route::resource('reports/admin-reports','admin\ReportsController');

    Route::group(['prefix'=>'report','namespace'=>'admin'],function(){
        //Questions
        Route::get('admin-questions/{id}','QuestionsController@index')->name('report.question.show');
        Route::get('admin-questions/create/{id}','QuestionsController@create')->name('report.question.create');
        Route::post('admin-questions/store/{id}','QuestionsController@store')->name('report.question.store');
        //Evaluations
        Route::get('admin-evaluation/{id}','EvaluationsController@index')->name('report.evaluation.show');
        Route::get('admin-questions/create/{id}','QuestionsController@create')->name('report.evaluation.create');
        Route::post('admin-questions/store','QuestionsController@store')->name('report.evaluation.store');

    });

});