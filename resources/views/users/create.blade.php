@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Añadir nuevo usuario</h1>
        <div class="lead">
            <p>Añadir nuevo usuario y asignar un rol.</p>
        </div>

        <div class="container mt-4">
            <form method="POST" action="">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input value="{{ old('name') }}" type="text" class="form-control" name="name"
                                placeholder="Name" required>

                            @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input value="{{ old('email') }}" type="email" class="form-control" name="email"
                                placeholder="Email address" required>
                            @if ($errors->has('email'))
                                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Teléfono</label>
                            <input value="{{ old('phone') }}" type="number" class="form-control" name="phone"
                                placeholder="phone" required>
                            @if ($errors->has('phone'))
                                <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="padel_level" class="form-label">Nivel de padel</label>
                            <select name="padel_level" id="type" class="form-control">
                                <option value="Low">Bajo</option>
                                <option value="Medium">Medio</option>
                                <option value="Hight">Alto</option>
                            </select>
                            @if ($errors->has('padel_level'))
                                <span class="text-danger text-left">{{ $errors->first('padel_level') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Rol</label>
                            <select class="form-control" name="role" class="" required>
                                <option value="">Seleccionar rol</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}"
                                        {{ in_array($role->name, $userRole) ? 'selected' : '' }}>
                                        {{ $role->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('role'))
                                <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                            @endif
                        </div>
                        <div class="d-flex justify-content-around">
                            <button type="submit" class="btn btn-primary mt-3">Crear usuario</button>
                            <button href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Atrás</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
