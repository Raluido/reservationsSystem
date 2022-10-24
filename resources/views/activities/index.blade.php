@extends('layouts.app-master')

@section('content')
<div class="bg-light p-4 rounded">
    <h1>Añadir nueva hora</h1>
    <div class="lead">
        <p>Añadir nuevo horario para la actividad indicada.</p>
    </div>

    <div class="container mt-4">
        <form method="POST" action="">
            @csrf
            <div class="row">
                <div class="col-6">
                    @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                    @endif
                    <div class="mb-3">
                        <label for="name" class="form-label">Actividad</label>
                        <input name="name" for="name" id="name" class="form-control" />
                        @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    @for($i = 0; $i < count($activityList); $i++;) <table class="table table-bordered" id="dynamicAddRemove">
                        <tr>
                            <th>Nombre</th>
                            <th>Día de la semana</th>
                            <th>Comienzo de la clase</th>
                            <th>Final de la clase</th>
                            <th>Acción</th>
                        </tr>
                        <tr>
                            <td>
                            <td><input value="{{ $activityList-> }}" type="text" class="form-control" name="name" placeholder="Nombre" required /></td>
                            <td><select name="{{ dayOfTheWeek . $i }}" id="type" class="form-control">
                                    <option value="Monday">Lunes</option>
                                    <option value="Tuesday">Martes</option>
                                    <option value="Wednesday">Miércoles</option>
                                    <option value="Thursday">Jueves</option>
                                    <option value="Friday">Viernes</option>
                                    <option value="Saturday">Sábado</option>
                                    <option value="Sunday">Domingo</option>
                                </select></td>
                            <td><input value="" type="time" class="form-control" name="start[0]" placeholder="comienzo" required /></td>
                            <td><input value="" type="time" class="form-control" name="finish[0]" placeholder="Final" required /></td>
                            <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Añadir nueva clase</button></td>
                        </tr>
                        </table>
                        @endfor
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary mt-3">Crear nueva actividad</button>
                            <button href="{{ route('home.index') }}" class="btn btn-secondary mt-3">Atrás</button>
                        </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('js/dynamicAddRemove.js') }}" defer></script>
@endsection