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

    Route::get('/debug', function() {

        echo '<pre>';

        echo '<h1>Environment</h1>';
        echo App::environment().'</h1>';

        echo '<h1>Debugging?</h1>';
        if(config('app.debug')) echo "Yes"; else echo "No";

        echo '<h1>Database Config</h1>';
        /*
        The following line will output your MySQL credentials.
        Uncomment it only if you're having a hard time connecting to the database and you
        need to confirm your credentials.
        When you're done debugging, comment it back out so you don't accidentally leave it
        running on your live server, making your credentials public.
        */
        //print_r(config('database.connections.mysql'));

        echo '<h1>Test Database Connection</h1>';
        try {
            $results = DB::select('SHOW DATABASES;');
            echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
            echo "<br><br>Your Databases:<br><br>";
            print_r($results);
        }
        catch (Exception $e) {
            echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
        }

        echo '</pre>';

    });

    Route::get('/islogin', function() {

        # You may access the authenticated user via the Auth facade
        $user = Auth::user();

        if($user) {
            echo 'You are logged in.';
            dump($user->toArray());
        } else {
            echo 'You are not logged in.';
        }

        return;

    });


});
