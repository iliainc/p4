<?php

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return view('welcome');
    });


    // First check whether user is logged in. If not logged in, redirect to homepage.
    Route::get('/dashboard',function(){
        if(Auth::guest()){
            return view('welcome');
        }
        return view('dashboard.index');
    });


    Route::post('/loremipsum', 'LoremIpsumController@postIndex');
    Route::get('/loremipsum', 'LoremIpsumController@getIndex');

    Route::post('/randomuser', 'RandomUserController@postIndex');
    Route::get('/randomuser', 'RandomUserController@getIndex');

    Route::get('/practice', function() {
        echo config('app.url');
    });

    // Practice routes for CRUD DB operations
    Route::get('/createbook', 'CrudController@getCreateBook');
    Route::get('/readbook', 'CrudController@getReadBook');
    Route::get('/updatebook', 'CrudController@getUpdateBook');
    Route::get('/deletebook', 'CrudController@getDeleteBook');

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
