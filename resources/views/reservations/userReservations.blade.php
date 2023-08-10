@extends('layouts.app-master')

@section('content')
<div class="container mt-3">
    <h2>Gestión de reservas</h2>
    {{-- <div class="mt-4">
            <p>Fecha:
                <div id="datepicker"></div>
                <div id="dateevents"></div>
            </p>
        </div> --}}

    <div class="mt-5 row">
        <h5 class="fw-bold">Padel</h5>
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
</div>
@endsection
@section('js')
<script src="{{ asset('js/datepicker.js') }}" defer></script>
@endsection