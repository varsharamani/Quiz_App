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
                    <Publish></Publish>
            </div>
       </div>
       <script src="{{ asset('js/app.js') }}"></script>
       <script src="{{ asset('js/jquery.min.js') }}"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
       <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script> 
   
    </body>
</html>
