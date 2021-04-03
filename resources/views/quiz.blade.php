
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('resources/fontawesome/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app-back.css') }}">
      
    </head>
    <body>
        <div id="app">
             <div class="content">
                    <Quiz></Quiz>
            </div>
       </div>
       <script src="{{ asset('js/app.js') }}"></script>
      
    </body>
</html>
