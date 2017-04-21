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
    return view('index');
});

Route::get('/exam/single', 'ExamController@startSingleExam');

Route::resource('/questions', 'QuestionController', ['only' => [
    'index', 'show', 'store'
]]);

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@autoLogin');
    Route::get('login', 'AdminController@autoLogin');
    Route::post('login', 'AdminController@login');
    Route::get('logout', 'AdminController@logout')->middleware('checkAdmin');
    Route::get('index', function ()    {
        return view('admin.index');
    })->middleware('checkAdmin');
    Route::get('addQuestion', function ()    {
        return view('admin.addQuestion');
    })->middleware('checkAdmin');
    Route::get('showQuestion', 'AdminController@showQuestion')
        ->middleware('checkAdmin');
});