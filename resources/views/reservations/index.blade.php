@extends('layouts.app-master')

@section('content')
<div class="bg-light mt-4">
    <div class="">
        <div class="">
            <h4>Consulta la disponiblidad de las actividades disponibles</h4>
        </div>
        <div class="mt-5">
            <div class="clickMenu btn btn-primary position-relative">{{ $activityChoose->name }}</div>
            <div class="d-none dropdownMenu bg-ligth border border-secondary ms-2 p-2 position-absolute">
                @foreach($activityList as $index)
                <a class="d-block text-decoration-none text-secondary" href="{{ route('reservations.index', $index->id) }}">{{ $index->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="mt-5 position-absolute">
        <div class="">
            <h4></h4>
            <p></p>
        </div>
        <input type="hidden" value="{{ json_encode($checkdatesAr3) }}" id="checkeddata">
        <div class="">
            <div class="mt-2" id="datepicker"></div>
            <div class="mt-5" id="dateevents"></div>
        </div>
    </div>
</div>
@endsection
<script src="{{ asset('js/datepicker.js') }}" defer></script>
<script src="{{ asset('js/activitiesMenu.js') }}" defer></script>