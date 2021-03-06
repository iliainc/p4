<!doctype html>
<html>
<head>
    <title>
        @yield('title', 'Gofer Sales To-Do Manager')
    </title>

    <meta charset='utf-8'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">

    @yield('head')

</head>
<body>

    <header>
        <h1 class="welcome">Gofer Sales To-Do Manager</h1>

        <img
            src='images/gofertodo.jpg'
            alt='Gofer Sales To-Do Manager'>
    </header>

    <section>
        @yield('content')
    </section>

    <footer class="welcome">
        &copy; {{ date('Y') }} Ilya Nossov
    </footer>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="html5lightbox/jquery.js"></script>
    <script type="text/javascript" src="html5lightbox/html5lightbox.js"></script>

    @yield('body')

</body>
</html>
