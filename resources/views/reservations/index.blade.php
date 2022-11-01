@extends('layouts.app-master')

@section('content')
<div class="bg-light p-4 rounded">
    <div class="container mt-4">
        {!! Form::open(['method' => 'POST','route' => ['reservations.showReservations'],'style'=>'display:inline']) !!}
        <select name="activityChosen" class="form-control w-25">
            @foreach($activityList as $index)
            <option value="{{ $index->id }}" @if ($index->id == $activityId) selected="selected" @endif>{{ $index->name }}</option>
            @endforeach
        </select>
        {!! Form::submit('Ver disponibilidad', ['class' => 'btn btn-primary mt-4']) !!}
        {!! Form::close() !!}
    </div>
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
@endsection