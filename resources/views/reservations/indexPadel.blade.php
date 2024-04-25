@extends('layouts.app-master')

@section('content')
<div class="bg-light p-4 rounded">
    <div class="">
        @include('layouts.partials.messages')
    </div>
    <div class="">
        <h2>Reservar padel</h2>
    </div>
    <div class="container mt-5">
        <div class="">
            <h4></h4>
            <p></p>
        </div>
        <input type="hidden" value="{{ json_encode($checkdatesAr3) }}" id="checkeddata">
        <div class="">
            <div class="mt-5" id="datepicker"></div>
            <div class="mt-5" id="dateevents"></div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('js/datepicker.js') }}" defer></script>
@endsection