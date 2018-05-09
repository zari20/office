@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card text-center">
                <i class="fa fa-user fa-5x mt-3"></i>
                <div class="card-body">
                    <h5 class="card-title">
                        @if ($user->username)
                            <strong> {{$user->username}} </strong>
                        @else
                            <em> [بدون نام کاربری] </em>
                        @endif
                    </h5>
                </div>
                <ul class="list-group list-group-flush p-0">
                    <li class="list-group-item"> نام کاربری : {{$user->username ?? '-'}}</li>
                    <li class="list-group-item"> ایمیل : {{$user->email ?? '-'}}</li>
                    <li class="list-group-item"> موبایل : {{$user->mobile ?? '-'}}</li>
                    <li class="list-group-item"> تلفن ثابت : {{$user->telephone ?? '-'}}</li>
                    <li class="list-group-item"> شهر : {{$user->city_id ? city($user->city_id) : '-'}}</li>
                    <li class="list-group-item"> منطقه شهری : {{$user->region ?? '-'}}</li>
                    <li class="list-group-item"> آدرس : {{$user->address ?? '-'}}</li>
                    <li class="list-group-item"> نوع کاربر : {{translate($user->type)}}</li>

                </ul>
                <div class="card-body text-left">
                    <a href="{{url("users/{$user->id}/edit")}}" class="card-link text-success none mx-1"> <i class="fa fa-edit ml-1"></i> ویرایش </a>
                    @if ($user->type != 'admin' && user_type() == 'admin')
                        <a onclick="if(confirm('ایا این آیتم پاک شود؟')) $('form#delete-user-{{$user->id}}').submit()" class="card-link text-danger none mx-1">
                            <i class="fa fa-trash ml-1"></i> حذف
                        </a>
                        <form class="d-none" action="{{url("users/$user->id")}}" method="post" id="delete-user-{{$user->id}}">
                            @csrf
                            {{method_field('DELETE')}}
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
