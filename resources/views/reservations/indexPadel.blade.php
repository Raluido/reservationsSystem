@extends('layouts.app-master')

@section('content')
<div class="bg-light p-4 rounded">
    <div class="d-flex justify-content-center ">
        <h2>Reservar padel</h2>
    </div>
    <div class="container mt-5">
        <div class="">
            <h4></h4>
            <p></p>
        </div>
        <input type="hidden" value="{{ json_encode($checkdatesAr3) }}" id="checkeddata">
        <div class="d-flex">
            <div class="mt-5" id="datepicker"></div>
            <div class="ms-5" id="dateevents"></div>
        </div>
    </div>
</div>
@endsection