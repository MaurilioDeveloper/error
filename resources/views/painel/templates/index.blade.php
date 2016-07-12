<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>{{$titulo or 'Curso de Laravel'}} | Produtos</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    </head>
    <style>
        .app{
            background: #23527c;
            color: #fff;
        }
    </style>
    <body>
        <div class="">
            <nav class="navbar app">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <b><a class="navbar-brand" href="#" style="color: #fff; font-size: 22px;">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Visitas
                            </a></b>
                    </div>
                </div>
            </nav>
        </div>
        <div class='container'>
            @yield('content')
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
   
    <!-- Inseri scripts js de forma dinamica -->
    @yield('scripts')
</html>