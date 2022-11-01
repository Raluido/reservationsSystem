@extends('layouts.app-master')

@section('content')
<div class="bg-light p-4 rounded">
    <div class="container mt-4">
        <form method="post" action="{{ route('reservations.indexId') }}" enctype="multipart/form-data">
            @csrf
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <select name="activityChosen" class="form-control">
                        @foreach($activityList as $index)
                        <option value="{{ $index->name }}">{{ $index->name }}</option>
                        @endforeach
                    </select>

                    <buttom type="submit" class="btn btn-secondary mt-2">Ver disponibilidad</buttom>
            </div>
        </form>
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