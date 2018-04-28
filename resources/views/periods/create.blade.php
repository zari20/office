@extends('layouts.app')
@section('content')

    <form class="row" action="{{isset($period) ? url("periods/$period->id") : url("periods")}}" method="post">

        @csrf
        @isset($period)
            {{method_field('PUT')}}
        @endisset

        <div class="form-group col-md-3">
            <label for="day-id"> روز هفته </label>
            <select class="form-control" name="day_id" id="day-id">
                @foreach ($days as $key => $day)
                    <option value="{{$day->id}}" @if(isset($period) && $period->day_id == $day->id) selected @endif> {{week_day($day->number)}} </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="room-id"> اتاق </label>
            <select class="form-control" name="room_id" id="room-id">
                @foreach ($rooms as $key => $room)
                    <option value="{{$room->id}}" @if(isset($period) && $period->room_id == $room->id) selected @endif> {{$room->name}} </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="from"> ساعت شروع </label>
            <input type="time" class="form-control" id="from" name="from" value="{{$period->from ?? ''}}" required>
        </div>
        <div class="form-group col-md-3">
            <label for="till"> ساعت پایان </label>
            <input type="time" class="form-control" id="till" name="till" value="{{$period->till ?? ''}}" required>
        </div>


        @include('fragments.submit', ['text'=> isset($period) ? 'ویرایش' : 'ذخیره'])

    </form>
@endsection
