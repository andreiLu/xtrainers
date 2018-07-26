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

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/createQuestion', 'QuestionController@store');

Route::get('/all-questions', 'QuestionController@all');

Route::get('/calendar', 'CalendarController@getCalendar');

Route::get('/add-class', 'AddClassController@newClass');

//Route::post('/add-class', 'AddClassController@test');

Route::post('/add-class-data',[
	'as' => 'user.preferences.update',
	'uses' => 'AddClassController@test'
]);


//Route::get('/add-class', [
//	'uses' => 'AddClassController@newClass'
//]);

//Route::get('/handle-add-class', 'AddClassController@handleRequest');
