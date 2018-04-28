@extends('layouts.app')
@section('content')
    <div class="">
        <span class="h2 text-blue"> سانس های ثبت شده در سیستم </span>
        <a href="{{url("periods/create")}}" class="float-left"> <i class="fa fa-plus ml-1"></i> اضافه کردن سانس جدید </a>
    </div>
    <hr>
    <div class="direct-x">
        <table class="table table-bordered table-hover table-striped text-center">
            <thead>
                <tr>
                    <th> ردیف </th>
                    <th> روز هفته </th>
                    <th> اتاق </th>
                    <th> ساعت شروع </th>
                    <th> ساعت پایان </th>
                    <th colspan="2"> عملیات </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($periods as $key => $period)
                    <tr>
                        <td> {{$key+1}} </td>
                        <td> {{week_day($period->day->number)}} </td>
                        <td> <a href="{{url("services/index/room")}}">{{$period->room->name ?? '-'}}</a> </td>
                        <td> {{display_time($period->from)}} </td>
                        <td> {{display_time($period->till)}} </td>
                        <td> <a href="{{url("periods/$period->id/edit")}}"> <i class="fa fa-edit text-success"></i> </a> </td>
                        <td>
                             <a onclick="if(confirm('ایا این آیتم پاک شود؟')) $('form#delete-period-{{$period->id}}').submit()" >
                                 <i class="fa fa-trash text-danger"></i>
                             </a>
                             <form class="d-none" action="{{url("periods/$period->id")}}" method="post" id="delete-period-{{$period->id}}">
                                 @csrf
                                 {{method_field('DELETE')}}
                             </form>
                         </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
