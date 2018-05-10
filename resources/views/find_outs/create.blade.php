@extends('layouts.app')
@section('content')

    <div class="alert alert-info">
        در پروسه رزرو از کاربر نحوه آشنایی پرسیده میشود. کاربر از طریق منوی کشویی یکی از موارد آشنایی را از بین لیست انتخاب میکند. در این قسمت میتوانید یک یا چند مورد به این لیست اضافه کنید.
    </div>

    <form class="row" action="{{url("find_outs")}}" method="post">

        @csrf

        <div class="col-md-1 my-3"></div>
        <div class="col-md-10 my-3">
            <label for="title" class="d-block"> موارد </label>
            <small class="d-block my-3 text-danger">
                <i class="fa fa-asterisk ml-1"></i>
                برای ایجاد چند مورد به طور همزمان میتوانید موارد را با Enter از هم جدا کنید.
            </small>
            <textarea name="title" class="form-control" rows="8"></textarea>
        </div>

        @include('fragments.submit', ['text'=> 'ایجاد'])

    </form>
@endsection
