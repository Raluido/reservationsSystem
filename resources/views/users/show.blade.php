@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Usuario</h1>
        <div class="lead">

        </div>

        <div class="container mt-4">
            <div>
                Nombre: {{ $user->name }}
            </div>
            <div>
                Email: {{ $user->email }}
            </div>
            <div>
                Teléfono: {{ $user->phone }}
            </div>
            <div>
                Nivel de padel: {{ $user->padelLevel }}
            </div>
        </div>

    </div>
    <div class="mt-4">
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Editar</a>
        <a href="{{ route('users.index') }}" class="btn btn-default">Volver</a>
    </div>
@endsection
