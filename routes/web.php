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

Route::get('/new-question', 'QuestionController@newQuestion');

Route::post('/createQuestion', 'QuestionController@store');

Route::get('/all-questions', 'QuestionController@all');

Route::get('/calendar', 'CalendarController@getCalendar');

Route::get('/add-class', 'AddClassController@newClass');

Route::get('/add-trainer', 'TrainerController@newTrainer');

Route::get('/add-club', 'ClubController@newClub');

Route::get('/all-clubs', 'ClubController@allClubs');

Route::get('subscribe-to-club/{id}', 'ClubController@subscribe');

Route::get('unsubscribe-from-club/{id}', 'ClubController@unsubscribe');

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

Route::post('/add-question-data',[
	'as' => 'user.new.question',
	'uses' => 'QuestionController@store'
]);

/**
 * Search routes
 */
Route::get('/search', function () {
    return view( 'search' );
} );

Route::post('/search',[
	'as' => 'user.search',
	'uses' => 'SearchController@handleSearch'
]);

Route::post('/upload-trainer-docs',[
	'as' => 'trainer.upload.docs',
	'uses' => 'HomeController@uploadTrainerDocs'
]);

Route::get('make-trainer/{id}', 'TrainerController@createNewTrainer');

Route::get('reject-trainer/{id}', 'TrainerController@rejectTrainer');

Route::get('trainers-list', 'TrainerController@allTrainers');

Route::get('subscribers-list', 'TrainerController@allSubscribers');

Route::get('dummy-data', 'DummyData@dummyDataView');

Route::post('/dummy-data',[
    'as' => 'user.dummy.data',
    'uses' => 'DummyData@doDummyData'
]);

Route::get('subscribe-to-class/{id}', 'AddClassController@subscribeToClass');

Route::get('single-class/{id}', 'AddClassController@singleClass');
