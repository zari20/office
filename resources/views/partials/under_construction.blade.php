@extends('layouts.app')
@section('content')
    <div class="alert alert-info m-2 p-5" role="alert">
        <h4 class="alert-heading dinar font-weight-bold mb-3">در دست ساخت</h4>
        <p> این بخش در دست ساخت است </p>
        <hr>
        <p class="mb-0">
            <a href="{{url('home')}}" class="btn bg-blue mx-1"> <i class="fa fa-dashboard ml-1"></i> رفتن به داشبرد </a>
            <a onclick="history.back()" class="btn bg-blue mx-1"> <i class="fa fa-arrow-right ml-1"></i> برگشت به صفحه قبل </a>
        </p>
    </div>
@endsection
