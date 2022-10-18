@extends('layouts.app-master')

@section('content')
<div class="bg-light p-4 rounded">
    <h1>Añadir nuevo hora</h1>
    <div class="lead">
        <p>Añadir nuevo horario para la actividad indicada.</p>
    </div>

    <div class="container mt-4">
        <form method="POST" action="">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="dayOfTheWeek" class="form-label">Actividad</label>
                        <select name="dayOfTheWeek" id="type" class="form-control">
                            <option value="Monday">Lunes</option>
                            <option value="Tuesday">Martes</option>
                            <option value="Wednesday">Miércoles</option>
                            <option value="Thursday">Jueves</option>
                            <option value="Friday">Viernes</option>
                            <option value="Saturday">Sábados</option>
                            <option value="Sunday">Domingos</option>
                        </select>
                        @if ($errors->has('activities'))
                        <span class="text-danger text-left">{{ $errors->first('activities') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="activities" class="form-label">Actividad</label>
                        <select name="activities" id="type" class="form-control">
                            <option value="Padel">Padel</option>
                            <option value="Yoga">Yoga</option>
                        </select>
                        @if ($errors->has('activities'))
                        <span class="text-danger text-left">{{ $errors->first('activities') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="time" class="form-label">Actividad</label>
                        <input value="{{ old('time') }}" type="time" class="form-control" name="time" placeholder="Time" required>
                        @if ($errors->has('time'))
                        <span class="text-danger text-left">{{ $errors->first('time') }}</span>
                        @endif
                    </div>
                    <div class="d-flex justify-content-around">
                        <button type="submit" class="btn btn-primary mt-3">Crear nuevo horario</button>
                        <button href="{{ route('home') }}" class="btn btn-secondary mt-3">Atrás</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection