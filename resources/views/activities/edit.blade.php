@extends('layouts.app-master')

@section('content')
<div class="bg-light p-4 rounded">
    <h1>Modificar actividad</h1>
    <div class="lead">
        <p>Modificar actividad</p>
    </div>

    <div class="mt-2">
        @include('layouts.partials.messages')
    </div>

    <div class="container mt-4">
        <form method="post" action="{{ route('activities.update', $activity->id) }}" enctype="multipart/form-data">
            @method('patch')
            @csrf
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <table class="table table-striped">
                <tr>
                    <th scope="col" width="20%">Actividad</th>
                    <th scope="col" width="10%">Número de plazas</th>
                    <th scope="col" width="20%">Acción</th>
                    <th scope="col" width="1%" colspan="3"></th>
                </tr>
                <tr>
                    <td><input name="name" for="name" id="name" value="{{ $activity->name }}" class="form-control" /></td>
                    <td><input name="places" for="places" id="places" value="{{ $activity->places }}" class="form-control" /></td>
                </tr>
            </table>
            <button type="submit" class="btn btn-secondary">Editar</button>
        </form>
    </div>
    @endsection