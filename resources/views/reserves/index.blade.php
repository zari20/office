@extends('layouts.app')
@section('content')
    <p class="h2 text-blue"> لیست رزرو ها </p>
    <hr>
    <div class="direct-x">
        <table class="table table-bordered table-hover table-striped text-center">
            <thead>
                <tr>
                    <th> ردیف </th>
                    <th> شماره تماس کاربر </th>
                    <th> اتاق </th>
                    <th> پذیرایی </th>
                    <th> خدمات صوتی تصویری </th>
                    <th> خدمات گرافیکی </th>
                    <th> خدمات اطلاع رسانی </th>
                    <th> هزینه نهایی </th>
                    <th colspan="3"> عملیات </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reserves as $key => $reserve)
                    <tr>
                        <th scope="row"> {{$key+1}} </th>
                        <td> {{$reserve->user->mobile ?? '?'}} </td>
                        <td> {{$reserve->schedule->room->name ?? '?'}} </td>
                        <td> @include('fragments.cor', ['var' => $reserve->catering]) </td>
                        <td> @include('fragments.cor', ['var' => $reserve->medium]) </td>
                        <td> @include('fragments.cor', ['var' => $reserve->graphic]) </td>
                        <td> @include('fragments.cor', ['var' => $reserve->informing]) </td>
                        <td> {{toman($reserve->total_cost)}} </td>
                        <td>
                            <a href="{{url("reserves/$reserve->id")}}" title="مشاهده"> <i class="fa fa-eye text-info"></i></a>
                        </td>
                        <td>
                            <a href="{{url("reserves/$reserve->id/edit")}}" title="ویرایش"> <i class="fa fa-edit text-success"></i></a>
                        </td>
                        <td>
                            <a onclick="" title="حذف"> <i class="fa fa-trash text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
