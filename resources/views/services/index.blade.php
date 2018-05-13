@extends('layouts.app')
@section('content')
    <div class="">
        <span class="h2 text-blue"> خدمات ثبت شده در سیستم </span>
        <a href="{{url("/services/create?kind=service_type")}}" class="float-left"> <i class="fa fa-plus ml-1"></i> اضافه کردن مورد جدید </a>
    </div>
    <hr>
    <div class="direct-x">
        <table class="table table-bordered table-hover table-striped text-center">
            <thead>
                <tr>
                    <th> ردیف </th>
                    <th> عنوان </th>
                    <th> مرحله </th>
                    <th colspan="3"> عملیات </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $key => $object)
                    <tr>
                        <td> {{$key+1}} </td>
                        <td> {{$object->title ?? '-'}} </td>
                        <td> {{$object->position ?? '-'}} </td>
                        <td> <a title="جزییات" href="{{url("services/$object->id")}}"> <i class="fa fa-list"></i> </a> </td>
                        <td> <a title="ویرایش" href="{{url("services/$object->id/edit?kind=service_type")}}" class="text-success"> <i class="fa fa-edit"></i> </a> </td>
                        <td> @include('fragments.delete', ['name' => 'service', 'value'=>'service_type']) </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
