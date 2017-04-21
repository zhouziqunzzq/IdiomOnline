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
//Index
Route::get('/', function () {
    return view('index');
});
//Exam
Route::get('/exam/single', 'ExamController@startSingleExam');
Route::get('/exam/team', 'ExamController@startTeamExam');
Route::post('/exam/judge', 'ExamController@judge');
//Team info
Route::get('/teaminfo', function () {
    return view('teaminfo');
});
Route::post('/teaminfo', 'StudentController@getTeamInfo');
//Register
Route::get('/finish', function () {
    return view('finish');
});
Route::resource('/students', 'StudentController', ['only' => [
    'store'
]]);
//Question
Route::resource('/questions', 'QuestionController', ['only' => [
    'store'
]]);
//Admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@autoLogin');
    Route::get('login', 'AdminController@autoLogin');
    Route::post('login', 'AdminController@login');
    Route::get('logout', 'AdminController@logout')->middleware('checkAdmin');
    Route::get('index', function () {
        return view('admin.index');
    })->middleware('checkAdmin');
    Route::get('addQuestion', function () {
        return view('admin.addQuestion');
    })->middleware('checkAdmin');
    Route::get('showQuestion', 'AdminController@showQuestion')
        ->middleware('checkAdmin');
});