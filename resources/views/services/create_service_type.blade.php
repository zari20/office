@extends('layouts.app')
@section('content')

    <form class="row" action="{{isset($object) ? url("services/$object->id") : url("services")}}" method="post">

        @csrf
        @isset($object)
            {{method_field('put')}}
        @endisset

        <div class="col-md-3"></div>
        <div class="form-group col-md-3">
            <label for="title"> <i class="fa fa fa-asterisk ml-1 text-danger"></i> عنوان </label>
            <input type="text" class="form-control" id="title" name="title" value="{{$object->title ?? old('title')}}" required>
            <small> عنوان خدمات مورد نظر را وارد کنید. مثال : خدمات پذیرایی </small>
        </div>
        <div class="form-group col-md-3">
            <label for="position"> مرحله </label>
            <input type="number" class="form-control" id="position" name="position" value="{{$object->position ?? old('position')}}">
            <small> این خدمات در پروسه رزرو چندمین مرحله باشد ؟ </small>
        </div>

        @include('fragments.submit', ['text'=> isset($object) ? 'ویرایش' : 'ذخیره', 'name'=>'kind', 'value'=>$kind])

    </form>
@endsection
