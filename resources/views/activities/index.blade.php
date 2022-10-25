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
                @for($i = 0; count($activityList) / 2 > $i; $i++)
                <tr>
                    <td><input name="name" for="name" id="name" value="{{ $index->name }}" class="form-control" /></td>
                    <td><input name="places" for="places" id="places" value="{{ $index->places }}" class="form-control" /></td>
                    <td><a href="" class="">Editar</a></td>
                    <td>{!! Form::open(['method' => 'DELETE','route' => ['activities.destroy',
                        $activity->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @endfor
                @else
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
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('js/dynamicAddRemove.js') }}" defer></script>
<script src="{{ asset('js/dynamicAddRemove1.js') }}" defer></script>
@endsection