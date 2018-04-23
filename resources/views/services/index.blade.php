@extends('layouts.app')
@section('content')
    <div class="">
        <span class="h2 text-blue"> {{translate($type)}} </span>
        <a href="{{url("services/create/$type")}}" class="float-left"> <i class="fa fa-plus ml-1"></i> اضافه کردن مورد جدید </a>
    </div>
    <hr>
    <div class="direct-x">
        <table class="table table-bordered table-hover table-striped text-center">
            <thead>
                <tr>
                    <th> ردیف </th>
                    <th> نام </th>
                    @if ($type=='room')
                        <th> ظرفیت </th>
                        <th> هزینه در هر ساعت </th>
                        <th> حداقل ساعت اجاره </th>
                    @else
                        <th> فی </th>
                    @endif
                    <th> توضیحات </th>
                    <th colspan="2"> عملیات </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $key => $object)
                    <tr>
                        <td> {{$key+1}} </td>
                        <td> {{$object->name}} </td>
                        @if ($type=='room')
                            <td> {{$object->capacity}} </td>
                            <td> {{toman($object->cost_pre_hour)}} </td>
                            <td> {{$object->min_hour}} </td>
                        @else
                            <td> {{toman($object->cost)}} </td>
                        @endif
                        <td> {{$object->description ? str_with_dots($object->description) : '-'}} </td>
                        <td> <a href="{{url("services/edit/$type/$object->id")}}"> <i class="fa fa-edit text-success"></i> </a> </td>
                        <td> <a href="{{url("services/destroy/$type/$object->id")}}" onclick="return confirm('ایا این آیتم پاک شود؟')" > <i class="fa fa-trash text-danger"></i> </a> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
