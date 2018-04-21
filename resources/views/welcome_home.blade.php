@extends('layouts.app')

@section('content')
    @isset($partial)
        @include("welcome.$partial")
    @else
        <div class="alert alert-info text-center">
            <h2 class="dinar"> به پنل مدیریت خوش آمدید </h2>
        </div>
    @endisset
@endsection
