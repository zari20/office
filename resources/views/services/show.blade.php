@extends('layouts.app')
@section('content')
    <h4 class="text-blue dinar"> {{$service->title}} </h4>
    <hr>

    <h4 class="text-blue dinar"> مدل ها </h4>
    @if (count($models = $service->models))
        @include('partials.models')
    @else
        <div class="alert alert-warning my-3">
            هیج مدلی یافت نشد.
        </div>
    @endif
    <div class="text-left">
        <a href="{{url("services/create?id=$service->id")}}" class="none"> + اضافه کردن مدل برای {{$service->title}} </a>
    </div>

    <hr>
    <a href="{{url("services/$service->id/edit?kind=service_type")}}" class="btn btn-success"> <i class="fa fa-edit ml-1"></i> ویرایش این خدمات </a>
    <a href="{{url("services/")}}" class="btn btn-info"> <i class="fa fa-eye ml-1"></i> مشاهده همه خدمات </a>

@endsection
