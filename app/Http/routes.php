<?php

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/dashboard', 'DashboardController@getIndex');

        Route::get('/add', 'AddTaskController@getAddTask');
        Route::post('/add', 'AddTaskController@postAddTask');

        Route::get('/edit/{id?}', 'EditTaskController@getEditTask');
        Route::post('/edit', 'EditTaskController@postEditTask');

        Route::get('/complete', 'CompleteController@getIndex');
        Route::get('/incomplete', 'IncompleteController@getIndex');

        Route::get('/confirm-delete/{id?}', 'DeleteTaskController@getIndex');
        Route::get('/delete/{id?}', 'DeleteTaskController@getDeleteTask');

        Route::get('/success', 'SuccessController@getIndex');
        Route::get('/successadd', 'SuccessController@getAddIndex');

    });


    # Show login form
    Route::get('/login', 'Auth\AuthController@getLogin');

    # Process login form
    Route::post('/login', 'Auth\AuthController@postLogin');

    # Process logout
    Route::get('/logout', 'Auth\AuthController@logout');

    # Show registration form
    Route::get('/register', 'Auth\AuthController@getRegister');

    # Process registration form
    Route::post('/register', 'Auth\AuthController@postRegister');

    Route::get('/practice', function() {
        echo config('app.url');
    });


});
