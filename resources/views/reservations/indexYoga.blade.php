@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Reservar yoga</h2>

        <div class="container mt-5">
            <div class="mb-5">
                <h4>Ver horarios disponibles</h4>
                <p></p>
            </div>
            <div class="w-75 mt-5 d-flex justify-content-around">
                <div class="">
                    <input class="form-control w-100" name="daterange" id="daterange" type="daterange" />
                </div>
                <div class="">
                    <button id="button1" type="button" class="btn btn-primary">Ver disponibilidad</button>
                </div>
                <div class="">
                    <button class="btn btn-secondary"><a href="{{ route('reservations.indexYoga') }}"
                            class="text-white text-decoration-none">Volver</a></button>
                </div>
            </div>
            <div class="mt-5 d-flex justify-content-around">
                <div class="mt-5">
                    <div class="" id="checkdate1"></div>
                </div>
                <div class="mt-5">
                    <div class="" id="checkdate2"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/yogaCheckDates.js') }}" defer></script>
@endsection
