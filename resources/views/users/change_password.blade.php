@extends('layouts.app')
@section('content')
    <form class="row" action="{{url("change_password/{$user->id}")}}" method="post">
        @csrf
        {{ method_field('PUT') }}

        @regular
            <div class="form-group col-md-4">
                <label for="current-password"> رمز عبور فعلی </label>
                <input type="password" class="form-control" name="current_password" id="current-password">
            </div>
        @endregular

        <div class="form-group col-md-4">
            <label for="password"> رمز عبور جدید </label>
            <input type="password" class="form-control" name="password" id="password">
        </div>

        <div class="form-group col-md-4">
            <label for="password-confirmation"> تکرار رمز عبور جدید </label>
            <input type="password" class="form-control" name="password_confirmation" id="password-confirmation">
        </div>


        @include('fragments.submit', ['text'=> 'تغییر رمز عبور'])

    </form>
@endsection
