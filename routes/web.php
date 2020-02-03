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

use App\Submission;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('editions', 'EditionController@index')->name('editions.index');
Route::get('editions/create', 'EditionController@create')->name('editions.create');
Route::post('editions/store', 'EditionController@store')->name('editions.store');
Route::get('editions/{edition}', 'EditionController@show')->name('editions.show');
Route::get('editions/{edition}/edit', 'EditionController@edit')->name('editions.edit');
Route::post('editions/{edition}', 'EditionController@update')->name('editions.update');
Route::delete('editions/{edition}', 'EditionController@destroy')->name('editions.destroy');

Route::get('submissions', 'SubmissionController@index')->name('submissions.index');
Route::get('submissions/create/{edition}', 'SubmissionController@create')->name('submissions.create');
Route::get('submissions/create', 'SubmissionController@create')->name('submissions.create');
Route::get('submissions/{submission}', 'SubmissionController@show')->name('submissions.show');
Route::get('submissions/{submission}/edit', 'SubmissionController@edit')->name('submissions.edit');
Route::post('submissions/{submission}/update', 'SubmissionController@update')->name('submissions.update');
Route::get('submissions/{submission}/addAuthor', 'SubmissionController@addAuthor')->name('submissions.add.author');
Route::post('submissions/store', 'SubmissionController@store')->name('submissions.store');
Route::delete('submissions/{submission}', 'SubmissionController@destroy')->name('submissions.destroy');


Route::get('evaluations', 'EvaluationController@index')->name('evaluations.index');
Route::post('evaluations', 'EvaluationController@store')->name('evaluations.store');
Route::get('evaluations/create/{edition}', 'EvaluationController@create')->name('evaluations.create');
Route::get('evaluations/create', 'EvaluationController@create')->name('evaluations.create');

Route::get('selections', 'SelectionController@index')->name('selections.index');
