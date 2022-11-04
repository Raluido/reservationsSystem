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
            <table class="table table-striped">
                <tr>
                    <th scope="col" width="20%">Nombre</th>
                    <th scope="col" width="20%">Día de la semana</th>
                    <th scope="col" width="10%">Comienzo</th>
                    <th scope="col" width="20%">Final</th>
                    <th scope="col" width="20%">Acción</th>
                    <th scope="col" width="1%" colspan="3"></th>
                </tr>
                <tr>
                    <td><select name="name" id="name" class="form-control" placeholder="Nombre">
                            @foreach($activityList as $index)
                            <option value="{{ $index->id }}" @if($index->id == $timetable->activity_id) selected="selected" @endif>{{ $index->name }}</option>
                            @endforeach
                        </select></td>
                    <td><select name="dayOfTheWeek" id="dayOfTheWeek" class="form-control" placeholder="Día de la semana">
                            @foreach($dayOfTheWeek as $index)
                            <option value="{{ $index->id }}" @if($index->id == $activity[0]->dayOfTheWeek) selected="selected" @endif>{{ $index->day }}</option>
                            @endforeach
                        </select></td>
                    <td><input name="start" for="start" id="start" value="{{ $timetable->start }}" class="form-control" /></td>
                    <td><input name="finish" for="finish" id="finish" value="{{ $timetable->finish }}" class="form-control" /></td>
                    <td><button type="submit" class="btn btn-success">Editar</button></td>
                </tr>
            </table>
        </form>
        <div class="d-flex justify-content-center mt-5">
            <div class="">
                <a class="btn btn-secondary" href="/activity/create">Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection