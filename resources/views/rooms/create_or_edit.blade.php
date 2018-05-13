@extends('layouts.app')
@section('content')

    <form class="row" action="{{$room->id ? url("rooms/$room->id") : url("rooms")}}" method="post">

        @if ($room->id)
            @method('put')
        @endif
        @csrf


        <div class="form-group col-md-4">
            <label for="name">نام سالن</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$room->name ?? old('name')}}" required>
        </div>

        <div class="form-group col-md-4">
            <label for="capacity"> ظرقیت سالن </label>
            <input type="number" class="form-control" id="capacity" name="capacity" value="{{$room->capacity ?? old('capacity')}}" required>
        </div>

        <div class="form-group col-md-4">
            <label for="cost_pre_hour"> هزینه در هر ساعت (به تومان) </label>
            <input type="number" step="1000" class="form-control" id="cost_pre_hour" name="cost_pre_hour" value="{{$room->cost_pre_hour ?? old('cost_pre_hour')}}" required>
        </div>

        <div class="form-group col-md-12">
            <label for="description"> توضیحات </label>
            <textarea name="description" id="description" rows="4" class="form-control">{{$room->description ?? old('description')}}</textarea>
        </div>

        @include('fragments.submit', ['text'=> $room->id ? 'ویرایش' : 'ذخیره'])

    </form>
@endsection
