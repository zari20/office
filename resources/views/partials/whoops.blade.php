@extends('layouts.app')
@section('content')
    <div class="alert alert-danger text-center">
        <i class="fa fa-warning ml-1"></i>
        {{$message ?? 'سیستم با خطا مواجه شد'}}
        <br>
        {{$extra ?? ''}}
    </div>
@endsection
