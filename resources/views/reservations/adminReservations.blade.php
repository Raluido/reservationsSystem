@extends('layouts.app-master')

@section('content')
<div class="container mt-3 mb-5">
    <h2>Gestión de reservas</h2>

    <div class="mt-5">
        <h5 class="fw-bold mb-3">Yoga</h5>
        <table class="table table-striped">
            <tr>
                <th scope="col" width="10%">Usuarios</th>
                <th scope="col" width="20%">Fechas</th>
                <th scope="col" width="10%">Eliminar</th>
            </tr>
            @foreach ($yogaReservations as $yogaReservation)
            <tr>
                <td scope="col" width="10%">{{ $yogaReservation->name }}</td>
                <td scope="col" width="20%">{{ $yogaReservation->reservation_date }}</td>
                <td>
                    {!! Form::open(['method' => 'DELETE','route' => ['reservations.destroyYoga', $yogaReservation->idYogaReservation],'style'=>'display:inline']) !!}
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