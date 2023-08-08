@extends('layouts.app-master')

@section('content')
<div class="container bg-light mt-4">
    <div class="">
        <div class="">
            <h4>Consulta la disponiblidad de las actividades disponibles</h4>
        </div>
        <div class="container mt-5">
            <div class="d-flex justify-content-around">
                <div class="">
                    @foreach($activityList as $index)
                    <a href="{{ route('reservations.index', $index->id) }}">{{ $index->name }}</a>
                    @endforeach
                </div>
                <div class="">
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="">
            <h4></h4>
            <p></p>
        </div>
        <input type="hidden" value="{{ json_encode($checkdatesAr3) }}" id="checkeddata">
        <div class="d-flex justify-content-center">
            <div class="mt-2" id="datepicker"></div>
            <div class="ms-5" id="dateevents"></div>
        </div>
    </div>
</div>
@endsection
<script src="{{ asset('js/addSelected.js') }}" defer></script>