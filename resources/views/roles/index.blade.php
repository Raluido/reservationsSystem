@extends('layouts.app-master')

@section('content')
    <h1 class="mt-3 mb-2">Gestionar permisos y roles</h1>

    <div class="bg-light p-4 rounded">
        <h1>Roles</h1>
        <div class="lead mt-4">
            <p>Gestiona tus roles aqui
            <p class="">
                <a href="{{ route('roles.create') }}" class="btn btn-primary btn-md float-right mt-3 mb-2">Añadir rol</a>
        </div>

        <div class="mt-2 mb-4">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-bordered">
            <tr>
                <th width="1%">No</th>
                <th>Nombre</th>
                <th width="3%" colspan="3">Acción</th>
            </tr>
            @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('roles.show', $role->id) }}">Mostrar</a>
                    </td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('roles.edit', $role->id) }}">Editar</a>
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>

        <div class="d-flex">
            {!! $roles->links() !!}
        </div>

    </div>
@endsection
