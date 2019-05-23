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
     Route::group(['prefix' => 'question2/result'], function (){
      Route::post('/get_result', 'Question2@getresult')->name('getresult');
     });


//question 3

    Route::view('/question3', 'question3');




   //question 4
   Route::resource('crud','CrudsController');


