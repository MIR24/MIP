<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="assets/demo/demo2/media/img/logo/favicon.ico" />

    <meta name="storeStatUrl" content="{{ route('stats.store') }}">
</head>
<body>
<div id="app">
    <div class="main-container">

        @include('layouts_partials.top_bar')
        <div class="content">
            @yield('content')
        </div>
        @include('layouts_partials.footer')


    </div>
</div>
</body>
</html>
