@extends('layouts.app')
@section('content')
    <div class="">
        <span class="h2 text-blue"> موارد موجود در لیست نحوه آشنایی با ما </span>
        <a href="{{url("find_outs/create")}}" class="float-left"> <i class="fa fa-plus ml-1"></i> اضافه کردن مورد جدید </a>
    </div>
    <hr>
    <div class="direct-x">
        <table class="table table-bordered table-hover table-striped text-center">
            <thead>
                <tr>
                    <th> ردیف </th>
                    <th> عنوان </th>
                    <th colspan="2"> عملیات </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($find_outs as $key => $find_out)
                    <tr>
                        <td> {{$key+1}} </td>
                        <td> {{$find_out->title ?? '-'}} </td>
                        <td> <a href="{{url("find_outs/$find_out->id/edit")}}"> <i class="fa fa-edit text-success"></i> </a> </td>
                        <td>
                             <a onclick="if(confirm('ایا این آیتم پاک شود؟')) $('form#delete-find-out-{{$find_out->id}}').submit()" >
                                 <i class="fa fa-trash text-danger"></i>
                             </a>
                             <form class="d-none" action="{{url("find_outs/$find_out->id")}}" method="post" id="delete-find-out-{{$find_out->id}}">
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
