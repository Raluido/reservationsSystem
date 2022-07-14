@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Añadir nuevos permisos</h2>
        <div class="lead">
            <p>Añadir nuevo</p>
        </div>

        <div class="container mt-4">

            <form method="POST" action="{{ route('permissions.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input value="{{ old('name') }}" type="text" class="form-control" name="name" placeholder="Name"
                        required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Guardar permiso</button>
                <a href="{{ route('permissions.index') }}" class="btn btn-default">Volver</a>
            </form>
        </div>

    </div>
@endsection
