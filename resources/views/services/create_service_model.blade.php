@extends('layouts.app')
@section('content')

    <form class="row" action="{{isset($object) ? url("services/$object->id") : url("services")}}" method="post">

        @csrf
        @isset($object)
            {{method_field('put')}}
        @endisset

        @if ($id = request('id'))
            <input type="hidden" name="service_type_id" value="{{$id}}">
        @else
            <div class="form-group col-md-4">
                <label for="service-type"> این مدل مربوط به کدام خدمات است؟ </label>
                <select class="form-control" name="service_type_id" id="service-type">
                    @foreach (service_types() as $key => $service_type)
                        <option value="{{$service_type->id}}"
                            @if(isset($object) && $object->service_type_id == $service_type->id)
                                selected
                            @elseif(old('service_type_id') == $service_type->id)
                                selected
                            @endisset
                        >
                            {{$service_type->title}}
                        </option>
                    @endforeach
                </select>
            </div>
        @endif

        <div class="form-group col-md-4">
            <label for="title"> عنوان </label>
            <input type="text" class="form-control" id="title" name="title" value="{{$object->title ?? old('title')}}" required>
        </div>

        <div class="form-group col-md-4">
            <label for="base"> مبلغ پایه </label>
            <input type="number" step="1000" class="form-control" id="base" name="base" value="{{$object->base ?? old('base')}}" required>
        </div>

        <div class="form-group col-md-12">
            <label for="description"> توضیحات </label>
            <textarea name="description" id="description" rows="4" class="form-control">{{$object->description ?? old('description')}}</textarea>
            <label class="custom-control custom-checkbox mt-3">
                <input type="checkbox" class="custom-control-input" name="countable" value="1"
                    @isset($object)
                        {{$object->countable ? 'checked' : ''}}
                    @elseif(old('kind'))
                        {{old('countable') ? 'checked' : ''}}
                    @else
                        checked
                    @endisset
                >
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">  میخواهم در پروسه رزرو، کاربر تعداد این خدمات را وارد کند </span>
            </label>
        </div>

        @include('fragments.submit', ['text'=> isset($object) ? 'ویرایش' : 'ذخیره', 'name'=>'kind', 'value'=>$kind])

    </form>
@endsection
