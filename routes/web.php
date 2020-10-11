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

Route::get('/login','UserController@getLogin')->name('login');
Route::post('/login','UserController@login')->name('postLogin');
Route::get('/logout','UserController@logout')->name('logout');

// admin
//Route::prefix('admin')->group(function (){
Route::middleware(['checkrole:admin'])->prefix('admin')->group(function(){

    Route::get('/getuser', 'UserController@getUser')->name('getuser');

    Route::get('/createuser','UserController@create')->name('getcreateuser');

    Route::post('/createuser', 'UserController@createUser')->name('postcreateuser');

    Route::get('/deleteuser/{id}', 'UserController@deleteUser')->name('deleteuser');
});

//studen
//
//Ro

Route::middleware(['checkrole:student'])->prefix('student')->group(function(){

    Route::get('/createtopic', 'TopicController@getTopic')->name('gettopic');
    Route::post('/createtopic', 'TopicController@postTopic')->name('posttopic');

    Route::get('/status', 'TopicController@statusTopic')->name('statustopic');

    Route::get('/canceltopic', 'TopicController@getcancelTopic')->name('getcancel');
    Route::get('/canceltopic/{id}', 'TopicController@cancelTopic')->name('canceltopic');

    Route::get('/extendtopic', 'TopicController@extendTopic')->name('extendTopic');
    Route::post('/extendtopic', 'TopicController@extendTopic')->name('postExtendTopic');

    Route::get('/submitreport', 'SubmitReportController@getFormSubmit')->name('submitreport');
    Route::post('/submitreport', 'SubmitReportController@submitReport')->name('submit');

});
