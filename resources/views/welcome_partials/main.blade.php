@extends('layouts.welcome')
@section('content')
    <div class="text-center bg-info p-4 text-white">
        <span class="h2 dinar">مدیریت کلی سایت</span>
        <a href="{{url('welcome_panel')}}" class="border-btn float-right"> <i class="fa fa-home m-1"></i> برگشت </a>
    </div>


    <div class="text-center">
      {{--  positions --}}
      <hr class="mt-0">
      <p class="h3 dinar bg-success text-white py-4"> <i class="fa fa-sort ml-1"></i> مدیریت ترتیب ها </p>
      <hr>
      @include('welcome.positions')

      {{-- colors --}}
      <hr class="mt-0">
      <p class="h3 dinar bg-success text-white py-4"> <i class="fa fa-dashboard ml-1"></i> مدیریت رنگ ها </p>
      <hr>
      @include('welcome.colors')

      {{-- website --}}
      <hr class="mt-0">
      <p class="h3 dinar bg-success text-white py-4"> <i class="fa fa-globe ml-1"></i> مدیریت وبسایت </p>
      <hr>
      @include('welcome.website')

    </div>
@endsection
