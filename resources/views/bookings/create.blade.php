@extends('layouts.app')
@section('content')

    <form class="row" action="{{url("bookings")}}" method="post">

        @csrf

        <div class="col-md-2"></div>

        <div class="form-group col-md-4">
            <label for="period-id"> سانس </label>
            <select class="select2" name="period_id" id="period-id">
                <option selected disabled> انتخاب کنید </option>
                @foreach ($periods as $key => $period)
                    <option value="{{$period->id}}" @if(old('period_id') == $period->id) selected @endif>
                        {{week_day($period->day->number)}} -
                        {{$period->room->name}} -
                        {{display_time($period->from)}} تا {{display_time($period->till)}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="date"> تاریخ </label>
            <input type="text" data-calendar="persian" readonly autocomplete="off" class="form-control" id="date" name="date" value="{{old('date')}}">
        </div>

        @include('fragments.submit', ['text'=> 'اشغال'])

    </form>

@endsection
