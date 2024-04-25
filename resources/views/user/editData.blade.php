@extends('layouts.app-master')

@section('content')
<div class="bg-light p-4 rounded">
    <div class="">
        <h2>Usuario</h2>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3 mt-5 border">
                <div class="mt-3"><a class="text-dark text-decoration-none" href="{{ route('user.editData') }}">Modificar datos</a>
                </div>
                <div class="mt-3"><a class="text-dark text-decoration-none" href="{{ route('user.editPassword') }}">Modificar
                        contraseña</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="d-flex justify-content-center">
                    <form method='POST' action='/panel/updateData'>
                        @csrf
                        <div class='mt-5 d-flex'>
                            <div class="row">
                                <div class="col-5">
                                    <label for='text' required>Nombre</label>
                                </div>
                                <div class="col-7">
                                    <input type='name' id='name' name='name' placeholder='Nombre' value='{{ $user->name }}'>
                                    @if ($errors->has('name'))
                                    <span class='text-danger text-left'>{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class='mt-5 d-flex'>
                            <div class="row">
                                <div class="col-5">
                                    <label for='email' required>Email</label>
                                </div>
                                <div class="col-7">
                                    <input type='email' name='email' id='email' placeholder='Email' value='{{ $user->email }}'>
                                    @if ($errors->has('email'))
                                    <span class='text-danger text-left'>{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class='mt-5 d-flex'>
                            <div class="row">
                                <div class="col-5">
                                    <label for='phone' required>Teléfono</label>
                                </div>
                                <div class="col-7">
                                    <input type='phone' name='phone' id='phone' placeholder='Teléfono' value='{{ $user->phone }}'>
                                    @if ($errors->has('phone'))
                                    <span class='text-danger text-left'>{{ $errors->first('phone') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class='mt-5 d-flex'>
                            <div class="row">
                                <div class="col-5">
                                    <label for='padelLevel' class='form-label'>Nivel de padel</label>
                                </div>
                                <div class="col-7">
                                    <select name='padelLevel' id='padelLevel'>
                                        <option value='Low' @if ($user->padelLevel == 'Bajo') selected='selected' @endif>
                                            Bajo
                                        </option>
                                        <option value='Medium' @if ($user->padelLevel == 'Medio') selected='selected' @endif>
                                            Medio
                                        </option>
                                        <option value='Hight' @if ($user->padelLevel == 'Alto') selected='selected' @endif>
                                            Alto
                                        </option>
                                    </select>
                                    @if ($errors->has('padelLevel'))
                                    <span class='text-danger text-left'>{{ $errors->first('padelLevel') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class=''>
                            <input type='hidden' value='{{ $user->password }}'>
                        </div>
                        <div class="d-flex">
                            <div class=''>
                                <button class="btn btn-secondary mt-5" type='submit'>Editar</button>
                            </div>
                            <div class="ms-5 mt-5">
                                <button type="button"><a href="{{ route('home.index') }}" class="btn btn-light text-decoration-none text-dark">Volver</a></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection