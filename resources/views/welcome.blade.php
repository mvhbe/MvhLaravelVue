<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mvh</title>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body style="margin-top: 80px">
        <div id="app">
            <index></index>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
