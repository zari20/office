@extends('layouts.app')
@section('content')
    <form class="row" action="{{url("users/$user->id")}}" method="post">
        @csrf
        {{ method_field('PUT') }}

        <div class="form-group col-md-3">
            <label for="username"> نام کاربری </label>
            <input type="text" class="form-control" name="username" id="username" value="{{$user->username}}">
        </div>

        <div class="form-group col-md-3">
            <label for="email"> ایمیل </label>
            <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}">
        </div>

        <div class="form-group col-md-3">
            <label for="mobile"> موبایل </label>
            <input type="text" class="form-control" name="mobile" id="mobile" value="{{$user->mobile}}">
        </div>

        <div class="form-group col-md-3">
            <label for="telephone"> تلفن ثابت </label>
            <input type="text" class="form-control" name="telephone" id="telephone" value="{{$user->telephone}}">
        </div>

        <div class="form-group col-md-3">
            <label for="city-id"> شهر </label>
            <select class="select2" name="city_id" id="city-id">
                <option value=""></option>
                @foreach (cities() as $key => $city)
                    <option value="{{$city->id}}" @if($city == $user->city_id) selected @endif>{{$city->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-md-3">
            <label for="region"> منظقه شهری </label>
            <input type="text" class="form-control" name="region" id="region" value="{{$user->region}}">
        </div>

        <div class="form-group col-md-3">
            <label for="postal-code"> کدپستی </label>
            <input type="text" class="form-control" name="postal_code" id="postal-code" value="{{$user->postal_code}}">
        </div>

        {{-- @admin
            <div class="form-group col-md-3">
                <label for="type"> نوع کاربر </label>
                <select class="form-control" name="type">
                    <option value="regular" @if($user->type=='regular') selected @endif> {{translate('regular')}} </option>
                    <option value="admin" @if($user->type=='admin') selected @endif> {{translate('admin')}} </option>
                </select>
            </div>
        @endadmin --}}

        <div class="form-group col-md-12">
            <label for="address"> آدرس </label>
            <input type="text" class="form-control" name="address" id="address" value="{{$user->address}}">
        </div>

        @include('fragments.submit', ['text'=> 'ویرایش'])

    </form>
@endsection
