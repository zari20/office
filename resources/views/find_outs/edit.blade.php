@extends('layouts.app')
@section('content')

    <form class="row" action="{{url("find_outs/$find_out->id")}}" method="post">

        @csrf
        {{method_field('PUT')}}

        <div class="col-md-4 my-3"></div>
        <div class="col-md-4 my-3">
            <label for="title"> عنوان </label>
            <input type="text" name="title" class="form-control" value="{{$find_out->title}}">
        </div>


        @include('fragments.submit', ['text'=> 'ویرایش'])


    </form>
@endsection
