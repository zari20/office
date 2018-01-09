@extends('layouts.welcome')
@section('content')
    <nav class="bg-info text-center p-4 pb-5">
        <span class="h2 dinar text-white">پنل مدیریت</span>
        <a href="" class="border-btn float-left"> <i class="fa fa-plus m-1"></i> بخش جدید </a>
        <a href="http://fontawesome.io/icons/" target="_blank" class="border-btn float-right"> <i class="fa fa-font-awesome m-1"></i> لیست فونت ها </a>
    </nav>
    <section class="p-3 text-center map">

        {{-- colors --}}
        <hr class="mt-0">
        <p class="h3 dinar text-info"> <i class="fa fa-dashboard ml-1"></i> مدیریت رنگ ها </p>
        <hr>
        @include('welcome.welcome_colors')

        {{-- map --}}
        <hr>
        <p class="h3 dinar text-info mb-4"> <i class="fa fa-map ml-1"></i> نقشه سایت </p>
        <hr>

        <div class="text-white" style="background-color:{{$colors->layout_background}}">
            هدر
            @include('welcome_partials.map_options',['open'=>false, 'partial'=>'header'])
        </div>
        <div style="background:{{ $contact_us->background_path ? 'url(../welcome/'.$contact_us->background_path.')' : 'url(../welcome_images/contact-bg.jpg)'}}">
            ارتباط با ما
            @include('welcome_partials.map_options',['open'=>false, 'partial'=>'contact_us'])
        </div>
        <div class="text-white" style="background-color:{{$colors->layout_background}}">
            فوتر
            @include('welcome_partials.map_options',['open'=>false, 'partial'=>'footer'])
        </div>
    </section>
@endsection
