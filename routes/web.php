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

Route::get('/add-trainer', 'TrainerController@newTrainer');

Route::get('/add-club', 'ClubController@newClub');

Route::get('/all-clubs', 'ClubController@allClubs');

Route::post('/add-class-data',[
	'as' => 'user.preferences.update',
	'uses' => 'AddClassController@test'
]);

Route::post('/add-trainer-data',[
	'as' => 'user.add.trainer',
	'uses' => 'TrainerController@createNewTrainer'
]);

Route::post('/add-club-data',[
	'as' => 'user.add.club',
	'uses' => 'ClubController@createNewClub'
]);

Route::get('make-trainer/{id}', 'TrainerController@createNewTrainer');