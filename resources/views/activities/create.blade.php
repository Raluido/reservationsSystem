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
                    <div class="mb-3">
                        <label for="dayOfTheWeek" class="form-label">Día de la semana</label>
                        <select name="dayOfTheWeek" id="type" class="form-control">
                            <option value="Monday">Lunes</option>
                            <option value="Tuesday">Martes</option>
                            <option value="Wednesday">Miércoles</option>
                            <option value="Thursday">Jueves</option>
                            <option value="Friday">Viernes</option>
                            <option value="Saturday">Sábado</option>
                            <option value="Sunday">Domingo</option>
                        </select>
                        @if ($errors->has('dayOfTheWeek'))
                        <span class="text-danger text-left">{{ $errors->first('dayOfTheWeek') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Actividad</label>
                        <select name="name" id="type" class="form-control">
                            <option value="Padel">Padel</option>
                            <option value="Yoga">Yoga</option>
                        </select>
                        @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="start" class="form-label">Comienzo</label>
                        <input value="{{ old('start') }}" type="time" class="form-control" name="start" placeholder="comienzo" required>
                        @if ($errors->has('start'))
                        <span class="text-danger text-left">{{ $errors->first('start') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="finish" class="form-label">Final</label>
                        <input value="{{ old('finish') }}" type="time" class="form-control" name="finish" placeholder="Final" required>
                        @if ($errors->has('finish'))
                        <span class="text-danger text-left">{{ $errors->first('finish') }}</span>
                        @endif
                    </div>
                    <div class="d-flex justify-content-around">
                        <button type="submit" class="btn btn-primary mt-3">Crear nuevo horario</button>
                        <button href="{{ route('home.index') }}" class="btn btn-secondary mt-3">Atrás</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection