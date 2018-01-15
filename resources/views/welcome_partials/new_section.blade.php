@extends('layouts.welcome')
@section('content')
    @include('welcome_partials.banner', ['title' => 'ایجاد بخش جدید'])
    <hr>
    <form class="row p-4" action="{{url('/welcome_sections')}}" method="post">
        {{ csrf_field() }}

        @include('welcome_partials.pure_section',['array'=>false, 'sections'=> isset($section) ? [$section] : [new \App\Welcome\WelcomeSection]])

        <div class="col-md-5"></div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary form-control">تایید</button>
        </div>
    </form>
@endsection
