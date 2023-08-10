@extends('layouts.app-master')

@section('content')
<div class="container my-5">
    <h2>Gestión de reservas</h2>

    <div class="mt-5 row">
        <h6 class="fw-bold">Padel</h6>
        @if ($padelReservations != null)
        @foreach ($padelReservations as $padelReservation)
        <div class="d-flex justify-content-center border mt-3 col-12 col-md-6 col-lg-4">
            <div class="">
                <p class="mt-3">{{ $padelReservation->reservation_date }}</p>
                <button class='ms-3 mb-3'><a class='text-dark text-decoration-none' href="userReservations/deletePadel/{{ $padelReservation->reservation_date }}">Cancelar</a></button>
            </div>
        </div>
        @endforeach
        @else
        <p class="my-3">No tienes ninguna partido reservado para las próximas dos semanas.</p>
        @endif
    </div>
    <div class="mt-5 row">
        @if ($othersReservations != null)
        @foreach ($othersReservations as $otherReservation)
        <h6 class="fw-bold mt-4">{{ $otherReservation->name }}</h6>
        <div class="d-flex justify-content-center border mt-3 col-12 col-md-6 col-lg-4">
            <div class="">
                <p class="mt-3">{{ $otherReservation->reservationDay . " " . $otherReservation->start }}</p>
                <button class='ms-3 mb-3'><a class='text-dark text-decoration-none' href="{{ route('reservations.cancel', $otherReservation->id) }}">Cancelar</a></button>
            </div>
        </div>
        @endforeach
        @else
        <p class="my-3">No tienes ningúna reserva para las próximas dos semanas.</p>
        @endif
    </div>
</div>
@endsection