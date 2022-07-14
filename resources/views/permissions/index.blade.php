@extends('layouts.app-master')

@section('content')
    <h1 class="mb-3 mt-3">Permisos y Roles</h1>

    <div class="bg-light p-4 rounded">
        <h2>Permisos</h2>
        <div class="lead mt-3">
            <p>Gestiona tus permisos aqui</p>
            <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-md float-right mt-3">Añadir permisos</a>
        </div>

        <div class="mt-4">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" width="15%">Nombre</th>
                    <th scope="col">Guard</th>
                    <th scope="col" colspan="3" width="1%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>
                        <td><a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-info btn-sm">Editar</a>
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id], 'style' => 'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
