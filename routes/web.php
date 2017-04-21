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

Route::get('/testpaper/single', function () {
    return view('testpaper');
});

Route::resource('/questions', 'QuestionController', ['only' => [
    'index', 'show', 'store'
]]);

Route::group(['prefix' => 'admin'], function () {
    Route::get('addQuestion', function ()    {
        return view('admin.addQuestion');
    });
    Route::get('showQuestion', 'AdminController@showQuestion');
});