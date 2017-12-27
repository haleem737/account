<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- bootstrap framework -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- online icons and fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Archivo' rel='stylesheet'>

    <!-- style -->
    <style type='text/css'>
        body{
            background:#e6e6e6;
        }
        a{
            color:black;
        }
        
        a:hover{
            text-decoration:none;
            color:black;
        }

    </style>

    <!-- custome style -->
    @yield('style')
</head>

<body>

    <div id="app">

        @include('inc.navbar')
        @include('inc.messages')
        @yield('content')
        
    </div>

    <!-- jquery framework -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    
    <!-- jquery typehead plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

    <!-- jquery popup plugin -->
    <script type="text/javascript" src="{!! asset('js/jquery.popupoverlay.js') !!}"></script>
    @yield('script')
</body>
</html>