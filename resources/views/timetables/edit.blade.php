@extends('layouts.app-master')

@section('content')
<div class="bg-light p-4 rounded">
    <h1>Editar hora</h1>
    <div class="lead">
        <p>Modificar hora</p>
    </div>

    <div class="mt-2">
        @include('layouts.partials.messages')
    </div>

    <div class="container mt-4">
        <form method="post" action="{{ route('timetables.update', $timetable->id) }}" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <table class="table table-striped">
                <tr>
                    <th scope="col" width="20%">Nombre</th>
                    <th scope="col" width="20%">Día de la semana</th>
                    <th scope="col" width="10%">Comienzo</th>
                    <th scope="col" width="20%">Final</th>
                    <th scope="col" width="1%" colspan="3"></th>
                </tr>
                <tr>
                    <td><input name="name" for="name" class="form-control" value="{{ $activity }}" /></td>
                    <td><input name="dayOfTheWeek" for="dayOfTheWeek" id="dayOfTheWeek" value="{{ $timetable->dayOfTheWeek }}" class="form-control" /></td>
                    <td><input name="start" for="start" id="start" value="{{ $timetable->start }}" class="form-control" /></td>
                    <td><input name="finish" for="finish" id="finish" value="{{ $timetable->finish }}" class="form-control" /></td>
                </tr>
            </table>
            <button type="submit" class="btn btn-secondary">Editar</button>
        </form>
    </div>
    @endsection