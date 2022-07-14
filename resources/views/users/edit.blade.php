@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Actualizar usuario</h1>
        <div class="lead">

        </div>

        <div class="container mt-4">
            <form method="post" action="{{ route('users.update', $user->id) }}">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input value="{{ $user->name }}" type="text" class="form-control" name="name" placeholder="Name"
                        required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{ $user->email }}" type="email" class="form-control" name="email"
                        placeholder="Email address" required>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Teléfono</label>
                    <input value="{{ $user->phone }}" type="number" class="form-control" name="phone"
                        placeholder="phone" required>
                    @if ($errors->has('phone'))
                        <span class="text-danger text-left">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="padelLevel" class="form-label">Nivel de padel</label>
                    <select name="padel_level" id="type">
                        <option value="Low" @if ($user->padel_level == 'Low') selected="selected" @endif>Bajo</option>
                        <option value="Medium" @if ($user->padel_level == 'Medium') selected="selected" @endif>Medio</option>
                        <option value="Hight" @if ($user->padel_level == 'Hight') selected="selected" @endif>Alto</option>
                    </select>
                    @if ($errors->has('padelLevel'))
                        <span class="text-danger text-left">{{ $errors->first('padelLevel') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Rol</label>
                    <select class="form-control" name="role" required>
                        <option value="">Seleccionar rol</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ in_array($role->name, $userRole) ? 'selected' : '' }}>
                                {{ $role->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('role'))
                        <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Actualizar usuario</button>
                <a href="{{ route('users.index') }}" class="btn btn-default">Cancelar</button>
            </form>
        </div>

    </div>
@endsection
