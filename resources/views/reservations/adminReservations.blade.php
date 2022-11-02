@extends('layouts.app-master')

@section('content')
<div class="container mt-3 mb-5">
    <h2>Gestión de reservas</h2>

    <div class="mt-5">
        <h5 class="fw-bold mb-3"></h5>
        <table class="table table-striped">
            <tr>
                <th scope="col" width="10%">Usuario</th>
                <th scope="col" width="10%">Actividad</th>
                <th scope="col" width="20%">Día</th>
                <th scope="col" width="10%">Hora de comienzo</th>
            </tr>
            @foreach ($reservations as $index)
            <tr>
                <td scope="col" width="10%">{{ $index->user }}</td>
                <td scope="col" width="10%">{{ $index->name }}</td>
                <td scope="col" width="20%">{{ $index->reservationDay }}</td>
                <td scope="col" width="20%">{{ $index->start }}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE','route' => ['reservations.destroy', $index->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="mt-5">
        <h5 class="fw-bold mb-3">Padel</h5>
        <table class="table table-striped">
            <tr>
                <th scope="col" width="10%">Usuarios</th>
                <th scope="col" width="20%">Fechas</th>
                <th scope="col" width="10%">Eliminar</th>
            </tr>
            @foreach ($padelReservations as $padelReservation)
            <tr>
                <td scope="col" width="10%">{{ $padelReservation->name }}</td>
                <td scope="col" width="20%">{{ $padelReservation->reservation_date }}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE','route' => ['reservations.destroyPadel', $padelReservation->idPadelReservation],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection