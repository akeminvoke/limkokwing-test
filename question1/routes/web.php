<?php


//question 1
Route::get('/', function () {
    return view('question1');
});
Route::group(['prefix' => 'question1'], function (){
    Route::post('question1','Question1@getresult')->name('question1');

});

//question 2
    Route::get('/question2',function()
    {return view('question2')
        ;});
    Route::post('/get_result', 'Question2@getresult')->name('getresult');


//question 4
Route::resource('crud','CrudsController');


//Route::get('/question2', 'Question2@getresult')->name('question2');