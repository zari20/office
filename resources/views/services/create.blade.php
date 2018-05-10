@extends('layouts.app')
@section('content')

    <form class="row" action="{{isset($object) ? url("services/update/$type/$object->id") : url("services/store/$type")}}" method="post">
        @csrf
        <div class="form-group col-md-4">
            <label for="name">نام {{translate($type)}}</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$object->name ?? old('name')}}" required>
        </div>
        @if ($type=='room')
            <div class="form-group col-md-4">
                <label for="capacity"> ظرقیت سالن </label>
                <input type="number" class="form-control" id="capacity" name="capacity" value="{{$object->capacity ?? old('capacity')}}" required>
            </div>
            <div class="form-group col-md-4">
                <label for="cost_pre_hour"> هزینه در هر ساعت (به تومان) </label>
                <input type="number" step="1000" class="form-control" id="cost_pre_hour" name="cost_pre_hour" value="{{$object->cost_pre_hour ?? old('cost_pre_hour')}}" required>
            </div>
        @else
            <div class="form-group col-md-4">
                <label for="cost"> فی </label>
                <input type="number" step="1000" class="form-control" id="cost" name="cost" value="{{$object->cost ?? old('cost')}}" required>
            </div>
        @endif
        <div class="form-group col-md-12">
            <label for="description"> توضیحات </label>
            <textarea name="description" id="description" rows="4" class="form-control">{{$object->description ?? old('description')}}</textarea>
        </div>

        @include('fragments.submit', ['text'=> isset($object) ? 'ویرایش' : 'ذخیره'])

    </form>
@endsection
