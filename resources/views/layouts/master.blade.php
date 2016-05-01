<!doctype html>
<html>
<head>
    <title>
        @yield('title', 'GoferToDo')
    </title>

    <meta charset='utf-8'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">

    @yield('head')

</head>
<body>

    <header>

    </header>

    <h1 class="welcome">GoferToDo</h1>
    <h3 class="welcome">Your To-Do Assistant</h3>

    <img
    src='images/gofertodo.jpg'
    alt='GoferToDo'>

    <section>
        @yield('content')
    </section>

    <footer class="welcome">
        &copy; {{ date('Y') }} Ilya Nossov
    </footer>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    @yield('body')

</body>
</html>
