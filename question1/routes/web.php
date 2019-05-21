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

Route::group(['prefix' => 'question1'], function (){
    Route::post('question1','Question1@getresult')->name('question1');

});


    Route::get('/question2',function()
    {return view('question2')
        ;});
    Route::post('/get_result', 'Question2@getresult')->name('getresult');




//Route::get('/question2', 'Question2@getresult')->name('question2');