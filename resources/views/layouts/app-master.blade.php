<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Venta de vehículos de segunda mano en Tenerife.">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Raúl Luis Domínguez">
    <meta name="keywords" content="Vehículos, segunda mano, Tenerife">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">


</head>

<body>

    @include('layouts.partials.navbar')

    <main class="container">

        @yield('content')

    </main>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/moment.min.js') }}"></script>
    @yield('js')
</body>

</html>