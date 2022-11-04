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
        <table class="table table-striped">
            <tr>
                <th scope="col" width="20%">Actividad</th>
                <th scope="col" width="10%">Número de plazas</th>
                <th scope="col" width="20%">Acción</th>
                <th scope="col" width="1%" colspan="3"></th>
            </tr>
            <tr>
                <form method="post" action="{{ route('activities.update', $activity->id) }}" enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <td><input name="name" for="name" id="name" value="{{ $activity->name }}" class="form-control" /></td>
                    <td><input name="places" for="places" id="places" value="{{ $activity->places }}" class="form-control" /></td>
                    <td><button type="submit" class="btn btn-success">Editar</button></td>
                </form>
            </tr>
        </table>
        <div class="d-flex justify-content-center mt-5">
            <div class="">
                <a class="btn btn-secondary" href="/activity/create">Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection