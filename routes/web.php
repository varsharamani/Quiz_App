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

/*Route::get('/', function () {
    return view('quiz');
});*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/quiz/{id}', 'SelectController@index')->name('home');
Route::get('/quiz',function(){
    return view('quiz');
});

Route::get('/publish',function(){
    return view('publish');
});

Route::get('/previewQuiz',function(){
    return view('previewQuiz');
});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
