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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true]);

// Route::get('/home', 'HomeController@index')->name('home');
// Route::resource('user','UserController');


Route::post('/login/custom',[
    'uses'=>'LoginController@login',
    'as'=>'login.custom'
]);

Route::post('/contact','ContactController@sendContactMail');



Route::group(['middleware'=>'auth'],function(){

    Route::get('/admindashboard','UserController@admindashboard')->name('admindashboard');
    Route::get('/staffdashboard','ClassRoomController@staffdashboard')->name('staffdashboard');
    Route::get('/studentdashboard','PerformanceRecordController@studentdashboard')->name('studentdashboard');

    
    Route::resource('users','UserController');
    Route::resource('studentprofile','StudentProfileController');
    Route::resource('staffprofile','StaffProfileController');
    Route::resource('classroom','ClassRoomController');
    // Route::resource('performancerecords','PerformanceRecordController');
    Route::resource('assignment','AssignmentController');
    Route::resource('submission','SubmissionsController');
    Route::resource('exam','ExamController');
    Route::resource('question','QuestionsController');
    Route::resource('options','OptionsController');



    Route::get('/search','UserController@search');
    Route::get('/search-student','ClassRoomController@search');
    Route::get('/search-examrecords','PerformanceRecordController@search');
    Route::get('/search-assignments','AssignmentController@search');
    Route::get('/search-exams','ExamController@search');
    Route::get('/search-question/{id}/','QuestionsController@search');



    Route::get('/performancerecords/{performancerecord}/addmarks','PerformanceRecordController@addmarks')->name('performancerecords');
    Route::get('assignment/submission/create/{id}','SubmissionsController@create');
    Route::get('assignment/submission/{id}','SubmissionsController@index');
    Route::get('dynamic_pdf/pdf','DynamicPDFController@pdf');
    Route::get('/assignment/download/{file}','AssignmentController@download');
    Route::get('/assignment/submission/download/{file}','SubmissionsController@download');
    Route::put('/assignment/submission/remarks/{id}','SubmissionsController@remarks');
    Route::get('/question/{id}/create','QuestionsController@create');
    Route::post('/exam/questions/{id}-{slug}','ExamController@storeanswer');
    Route::get('/exam/questions/{id}-{slug}','ExamController@startexam');



    Route::get('/clear-cache', function() {
        Artisan::call('cache:clear');
        return "Cache is cleared";
    });

    Route::get('/clear-config', function() {
        Artisan::call('config:clear ');
        return "Config is cleared";
    });
    
    Route::get('/storage-link', function() {
        Artisan::call('storage:link ');
        return "Storage link is set";
    });


});
