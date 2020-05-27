<!-- Stored in resources/views/layouts/app.blade.php -->

<html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
            Ovo je navigacija sa strane.
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
