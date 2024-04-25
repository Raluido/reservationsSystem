@extends('layouts.app-master')

@section('content')
<div class="bg-light p-4 rounded">
    <div class="">
        <h2>Usuario</h2>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3 mt-5 p-2 border">
                <div class=""><a class="text-dark text-decoration-none" href="{{ route('user.editData') }}">Modificar datos</a>
                </div>
                <div class="mt-3"><a class="text-dark text-decoration-none" href="{{ route('user.editPassword') }}">Modificar
                        contraseña</a>
                </div>
            </div>

            <div class="col-md-9">
                <div class="d-flex justify-content-center">
                    <form method='POST' action='/panel/updatePassword'>
                        @csrf
                        <div class='mt-5 d-flex'>
                            <div class="row">
                                <div class="col-5">
                                    <label for='password' required>Contraseña</label>
                                </div>
                                <div class="col-7">
                                    <input type='password' name='password' id='password' placeholder='Contraseña' value=''>
                                    <div class="mt-5">
                                        @if ($errors->has('name'))
                                        <span class='text-danger text-left'>{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class='mt-5 d-flex'>
                            <div class="row">
                                <div class="col-5">
                                    <label for='password_confirmation' required>Repite contraseña</label>
                                </div>
                                <div class="col-7">
                                    <input type='password' name='password_confirmation' id='password_confirmation' placeholder='Repite contraseña' value=''>
                                    <div class="mt-5">
                                        @if ($errors->has('name'))
                                        <span class='text-danger text-left'>{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class=''>
                                <button class="btn btn-secondary mt-5" type='submit'>Modificar contraseña</button>
                            </div>
                            <div class="ms-5 mt-5">
                                <button type="button"><a href="{{ route('home.index') }}" class="btn btn-light text-decoration-none text-dark">Volver</a></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endsection