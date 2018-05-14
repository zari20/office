@extends('layouts.app')
@section('content')
    <div class="">
        <span class="h2 text-blue"> لیست سالن ها </span>
        <a href="{{url("rooms/create")}}" class="float-left"> <i class="fa fa-plus ml-1"></i> اضافه کردن مورد جدید </a>
    </div>
    <hr>
    <div class="direct-x">
        <table class="table table-bordered table-hover table-striped text-center">
            <thead>
                <tr>
                    <th> ردیف </th>
                    <th> نام </th>
                    <th> ظرفیت </th>
                    <th> هزینه در هر ساعت </th>
                    <th> توضیحات </th>
                    <th colspan="2"> عملیات </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $key => $room)
                    <tr>
                        <td> {{$key+1}} </td>
                        <td> {{$room->name}} </td>
                        <td> {{$room->capacity}} </td>
                        <td> {{toman($room->cost_pre_hour)}} </td>
                        <td> {{$room->description ? str_with_dots($room->description) : '-'}} </td>
                        <td> <a href="{{url("rooms/$room->id/edit")}}"> <i class="fa fa-edit text-success"></i> </a> </td>
                        <td> @include('fragments.delete', ['name' => 'room', 'object' => $room]) </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
