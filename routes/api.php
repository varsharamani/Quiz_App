<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "apinsertQuestioni" middleware group. Enjoy building your API!
|
*/



Route::get('Choice','SelectController@index');
Route::get('selChoice/{qid}','SelectController@selChoice');
Route::post('insertselChoice','SelectController@store');
Route::post('insertQuestion/{id}/{quizId}','SelectController@insertQuestion');

Route::post('articleImage/{id}/{quizId}/{index}','SelectController@articleImage');
Route::post('delselChoice/{id}/{quizId}','SelectController@destroy');
Route::post('delselAns/{id}/{index}/{quizId}','SelectController@delselAns');

Route::get('Quiz','HomeController@index');
Route::post('addQuiz','HomeController@addQuiz');
Route::post('edit/{id}','HomeController@update');
Route::get('Quiz/{id}','HomeController@editQuiz');
Route::get('QuizDel/{id}','HomeController@destroy');
Route::post('editBasic/{id}','HomeController@editBasic');

Route::get('basicInfo/{quizid}','QuizController@index');
Route::post('getSelChoice/{quizid}/{sort}/{id}','QuizController@getSelChoice');




