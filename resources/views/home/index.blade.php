@extends('layouts.app-master')

@section('content')
<div class="bg-light p-5 rounded">
    @auth
    <h1>Gestión de Reservas</h1>
    <p class="lead">Sólo usuarios registrados podrán acceder al contenido.</p>
    @if(Session('success'))
    <span class="success">{{ Session('success') }}</span>
    @endif
    @endauth

    @guest
    <h1>Reserva tus clases</h1>
    <p class="lead">Estás en nuestra página principal. Para acceder al contenido tendrás que loguearte con las
        claves que te hemos facilitado.</p>
    @endguest
</div>
@endsection