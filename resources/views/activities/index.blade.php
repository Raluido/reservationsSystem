@extends('layouts.app-master')

@section('content')
<div class="bg-light p-4 rounded">
    <h1>Añadir nueva hora</h1>
    <div class="lead">
        <p>Añadir nuevo horario para la actividad indicada.</p>
    </div>

    <div class="container mt-4">
        <table class="table table-striped" id="dynamicAddRemove1">
            <thead>
                <tr>
                    <th scope="col" width="20%">Actividad</th>
                    <th scope="col" width="10%">Número de plazas</th>
                    <th scope="col" width="20%">Acción</th>
                    <th scope="col" width="1%" colspan="3"></th>
                </tr>
            </thead>
            <tbody>
                @if(count($activityList) != 0)
                @for($i = 0; count($activityList) > $i; $i++)
                <tr>
                    <td><input name="name" for="name" id="name" value="{{ $activityList[$i]->name }}" class="form-control" /></td>
                    <td><input name="places" for="places" id="places" value="{{ $activityList[$i]->places }}" class="form-control" /></td>
                    <td>{!! Form::open(['method' => 'POST','route' => ['activities.update',
                        $activityList[$i]->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Editar', ['class' => 'btn btn-success btn-sm']) !!}
                        {!! Form::close() !!}</td>
                    <td>{!! Form::open(['method' => 'DELETE','route' => ['activities.destroy',
                        $activityList[$i]->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Borrar', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                    @endfor
                </tr>
                @endif
                {!! Form::open(['method' => 'POST','route' => ['activities.store'],'style'=>'display:inline'])
                !!}
                <tr>
                    <td><input name="name[0]" for="name" id="name" placeholder="Nombre" class="form-control" /></td>
                    <td><input name="places[0]" for="places" id="places" placeholder="Plazas" class="form-control" /></td>
                    <td><button type="button" name="add" id="dynamic-ar1" class="btn btn-transparent">Nueva línea
                        </button></td>
                </tr>
                <div class="d-flex justify-content-end">
                    {!! Form::submit('Añadir actividad', ['class' => 'btn btn-primary my-4']) !!}
                    {!! Form::close() !!}
                </div>
            </tbody>
        </table>
    </div>

    <div class="container mt-4">
        <table class="table table-striped" id="dynamicAddRemove">
            <thead>
                <tr>
                    <th scope="col" width="15%">Nombre</th>
                    <th scope="col" width="10%">Día de la semana</th>
                    <th scope="col" width="10%">Comienzo</th>
                    <th scope="col" width="10%">Final</th>
                    <th scope="col" width="20%">Acción</th>
                    <th scope="col" width="1%" colspan="3"></th>
                </tr>
            </thead>
            <tbody>
                @if(count($timetableList) != 0)
                @for($i = 0; count($timetableList) > $i; $i++)
                <tr>
                    <td><input name="name" for="name" class="form-control" value="{{ $timetableList[$i]->name }}"/></td>
                    <td><input name="dayOfTheWeek" for="dayOfTheWeek" id="dayOfTheWeek" value="{{ $timetableList[$i]->dayOfTheWeek }}" class="form-control" /></td>
                    <td><input name="start" for="start" id="start" value="{{ $timetableList[$i]->start }}" class="form-control" /></td>
                    <td><input name="finish" for="finish" id="finish" value="{{ $timetableList[$i]->finish }}" class="form-control" /></td>
                    <td>{!! Form::open(['method' => 'POST','route' => ['timetables.update',
                        $timetableList[$i]->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Editar', ['class' => 'btn btn-success btn-sm']) !!}
                        {!! Form::close() !!}</td>
                    <td>{!! Form::open(['method' => 'DELETE','route' => ['timetables.destroy',
                        $timetableList[$i]->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Borrar', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                    @endfor
                </tr>
                @endif
                {!! Form::open(['method' => 'POST','route' => ['timetables.store'],'style'=>'display:inline'])
                !!}
                <tr>
                    <td><input name="name" for="name" class="form-control" placeholder="Nombre"/></td>
                    <td><input name="dayOfTheWeek[0]" for="dayOfTheWeek" id="dayOfTheWeek" placeholder="Día de la semana" class="form-control" /></td>
                    <td><input name="start[0]" for="start" type="time" id="start" class="form-control" placeholder="Comienzo"/></td>
                    <td><input name="finish[0]" for="finish" type="time" id="finish" class="form-control" placeholder="Fin"/></td>
                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-transparent">Nueva línea
                        </button></td>
                </tr>
                <div class="d-flex justify-content-end">
                    {!! Form::submit('Añadir horario', ['class' => 'btn btn-primary my-4']) !!}
                    {!! Form::close() !!}
                </div>
            </tbody>

        </table>
    </div>
    @endsection
    @section('js')
    <script src="{{ asset('js/dynamicAddRemove.js') }}" defer></script>
    <script src="{{ asset('js/dynamicAddRemove1.js') }}" defer></script>
    @endsection