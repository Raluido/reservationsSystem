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
                    {!! Form::open(['method' => 'POST','route' => ['reservations.showReservations'],'style'=>'display:inline']) !!}
                    <select name="activityChosen" class="form-control">
                        @foreach($activityList as $index)
                        <option value="{{ $index->id }}" @if ($index->id == $activityId) selected="selected" @endif>{{ $index->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="">
                    {!! Form::submit('Ver disponibilidad', ['class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
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