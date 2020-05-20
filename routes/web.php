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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::resource('user','UserController');


Route::post('/login/custom',[
    'uses'=>'LoginController@login',
    'as'=>'login.custom'
]);

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});


Route::group(['middleware'=>'auth'],function(){

    Route::get('/admindashboard','UserController@index')->name('admindashboard');
    Route::get('/staffdashboard','ClassRoomController@index')->name('staffdashboard');
    Route::get('/studentdashboard','PerformanceRecordController@index')->name('studentdashboard');
    Route::get('/performancerecords/{performancerecord}/addmarks','PerformanceRecordController@addmarks')->name('performancerecords');



    
    Route::resource('users','UserController');
    Route::resource('studentprofile','StudentProfileController');
    Route::resource('staffprofile','StaffProfileController');
    Route::resource('classroom','ClassRoomController');
    Route::resource('performancerecords','PerformanceRecordController');
    Route::resource('assignment','AssignmentController');
    Route::get('/search','UserController@search');
    Route::get('/search-student','ClassRoomController@search');
    Route::get('/search-examrecords','PerformanceRecordController@search');
    Route::get('/search-assignments','AssignmentController@search');

    Route::get('dynamic_pdf/pdf','DynamicPDFController@pdf');


});
