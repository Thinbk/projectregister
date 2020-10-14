<?php

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
    return view('welcome');
});

//login
Route::get('/login','AuthController@getLogin')->name('login');
Route::post('/login','AuthController@login')->name('postLogin');
Route::get('/logout','AuthController@logout')->name('logout');

// admin
//Route::prefix('admin')->group(function (){
Route::middleware(['checkrole:admin'])->prefix('admin')->group(function(){

    Route::get('/getuser', 'AdminController@getUser')->name('getuser');

    Route::get('/createuser','AdminController@create')->name('getcreateuser');

    Route::post('/createuser', 'AdminController@createUser')->name('postcreateuser');

    Route::get('/deleteuser/{id}', 'AdminController@deleteUser')->name('deleteuser');
});

//studen
//
//Ro

Route::middleware(['checkrole:student'])->prefix('student')->group(function(){

    Route::get('/createtopic', 'StudentController@getTopic')->name('gettopic');
    Route::post('/createtopic', 'StudentController@postTopic')->name('posttopic');

    Route::get('/status', 'StudentController@statusTopic')->name('statustopic');

    Route::get('/canceltopic', 'StudentController@getcancelTopic')->name('getcancel');
    Route::get('/canceltopic/{id}', 'StudentController@cancelTopic')->name('canceltopic');

    Route::get('/extendtopic', 'StudentController@extendTopic')->name('extendTopic');
    Route::post('/extendtopic', 'StudentController@postExtendTopic')->name('postExtendTopic');

    Route::get('/submitreport', 'StudentController@getFormSubmit')->name('submitreport');
    Route::post('/submitreport', 'StudentController@submitReport')->name('submit');

});
//lecture
Route::middleware(['checkrole:teacher'])->prefix('student')->group(function(){

    Route::get('listtopic', 'LecturerController@getTopicStudent')->name('listtopic');

    Route::get('confirmregister', 'LecturerController@getConfirmRegisterTopic')->name('confirmregister');

    Route::get('confirmextend', 'LecturerController@getConfirmExtendTopic')->name('confirmextend');

    Route::get('confirmcancel', 'LecturerController@getConfirmCancelTopic')->name('confirmcancel');
});
