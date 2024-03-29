@extends('layouts.app-master')

@section('content')
<div class="bg-light p-4 rounded">
    <h1>Añadir nueva hora</h1>
    <div class="lead">
        <p>Añadir nuevo horario para la actividad indicada.</p>
    </div>

    <div class="mt-2">
        @include('layouts.partials.messages')
    </div>

    <div class="container mt-4">
        <table class="table table-striped">
            <tr>
                <th scope="col" width="50%">Actividad</th>
                <th scope="col" width="30%">Número de plazas</th>
                <th scope="col" width="10%">Acción</th>
                <th scope="col" width="1%" colspan="2"></th>
            </tr>
            @if(count($activityList) != 0)
            @for($i = 0; count($activityList) > $i; $i++)
            <tr>
                <td>{{ $activityList[$i]->name }}</td>
                <td>{{ $activityList[$i]->places }}</td>
                <td><a href="{{ route('activities.edit', $activityList[$i]->id) }}" class="btn btn-success">Editar</a></td>
                <td>{!! Form::open(['method' => 'DELETE','route' => ['activities.destroy',
                    $activityList[$i]->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endfor
            @endif
        </table>
        {!! Form::open(['method' => 'STORE','route' => ['activities.store'],'style'=>'display:inline']) !!}
        <table class="table table-striped" id="dynamicAddRemove1">
            <tr>
                <td><input name="name[0]" for="name" id="name" placeholder="Nombre" class="form-control" required /></td>
                <td><input name="places[0]" for="places" id="places" placeholder="Plazas" class="form-control" required /></td>
                <td><button type="button" name="add" id="dynamic-ar1" class="btn btn-transparent">Nueva línea
                    </button></td>
            </tr>
        </table>
        <div class="">
            <div class="d-flex justify-content-end mb-5">
                {!! Form::submit('Añadir actividad', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <table class="table table-striped">
            <tr>
                <th scope="col" width="20%">Nombre</th>
                <th scope="col" width="25%">Día de la semana</th>
                <th scope="col" width="20%">Comienzo</th>
                <th scope="col" width="20%">Final</th>
                <th scope="col" width="15%">Acción</th>
                <th scope="col" width="1%" colspan="3"></th>
            </tr>
            @if(count($timetableList) != 0)
            @for($i = 0; count($timetableList) > $i; $i++)
            <tr>
                <td>{{ $timetableList[$i]->name }}</td>
                @switch($timetableList[$i]->dayOfTheWeek)
                @case(1)
                <td>Lunes</td>
                @break
                @case(2)
                <td>Martes</td>
                @break
                @case(3)
                <td>Miércoles</td>
                @break
                @case(4)
                <td>Jueves</td>
                @break
                @case(5)
                <td>Viernes</td>
                @break
                @case(6)
                <td>Sábado</td>
                @break
                @case(7)
                <td>Domingo</td>
                @break
                @endswitch
                <td>{{ $timetableList[$i]->start }}</td>
                <td>{{ $timetableList[$i]->finish }}</td>
                <td><a href="{{ route('timetables.edit', $timetableList[$i]->id) }}" class="btn btn-success">Editar</a></td>
                <td>{!! Form::open(['method' => 'DELETE','route' => ['timetables.destroy',
                    $timetableList[$i]->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endfor
            @endif
        </table>
        {!! Form::open(['method' => 'STORE','route' => ['timetables.store'],'style'=>'display:inline']) !!}
        <table class="table table-striped" id="dynamicAddRemove">
            <tr>
                <td><select name="name[0]" id="name" class="form-control" placeholder="Nombre">
                        @foreach($activityList as $index)
                        <option value="{{ $index->id }}">{{ $index->name }}</option>
                        @endforeach
                    </select></td>
                <input type="hidden" id="activitiesList" value="{{ json_encode($activityList) }}" />
                <td><select name="dayOfTheWeek[0]" id="dayOfTheWeek" class="form-control" placeholder="Día de la semana">
                        <option value="1">Lunes</option>
                        <option value="2">Martes</option>
                        <option value="3">Miércoles</option>
                        <option value="4">Jueves</option>
                        <option value="5">Viernes</option>
                        <option value="6">Sábado</option>
                        <option value="7">Domingo</option>
                    </select></td>
                <td><input name="start[0]" for="start" type="time" id="start" class="form-control" placeholder="Comienzo" required /></td>
                <td><input name="finish[0]" for="finish" type="time" id="finish" class="form-control" placeholder="Fin" required /></td>
                <td><button type="button" name="add" id="dynamic-ar" class="btn btn-transparent">Nueva línea
                    </button></td>
            </tr>
            <div class="d-flex justify-content-end">
            </div>
        </table>
        <div class="d-flex justify-content-between mb-5">
            <div class="">
                <a class="btn btn-secondary" href="/">Volver</a>
            </div>
            <div class="d-flex justify-content-end">
                {!! Form::submit('Añadir horario', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @endsection
    @section('js')
    <script src="{{ asset('js/dynamicAddRemove.js') }}" defer></script>
    <script src="{{ asset('js/dynamicAddRemove1.js') }}" defer></script>
    @endsection