<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Venta de vehículos de segunda mano en Tenerife.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Raúl Luis Domínguez">
    <meta name="keywords" content="Vehículos, segunda mano, Tenerife">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/img/favicon.png') }}">

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet">


    <!-- FontAwesome -->
    {{-- <link href="{{ asset('assets/fontawesome/css/all.css') }}" rel="stylesheet"> --}}

</head>

<body>

    @include('layouts.partials.navbar')

    <main class="container">

        @yield('content')

    </main>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/moment.min.js') }}" defer></script>
    <script src="{{ asset('js/daterangepicker.js') }}" defer></script>
    @yield('js')
</body>

</html>
