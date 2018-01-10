@extends('layouts.welcome')
@section('content')
    <nav class="bg-info text-center p-4 pb-5">
        <span class="h2 dinar text-white">پنل مدیریت</span>
        <a href="{{url('welcome_new_section')}}" class="border-btn float-left"> <i class="fa fa-plus m-1"></i> بخش جدید </a>
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
            @include('welcome_partials.map_options',['close'=>$header->visible, 'delete'=>false, 'partial'=>'header'])
        </div>
        <div class="text-white bg-lavender">
            <span class="text-black"> منو </span>
            @include('welcome_partials.map_options',['close'=>$header->menu_visible, 'delete'=>false, 'partial'=>'header'])
        </div>
        @foreach ($sections as $key => $section)
            <div class="welcome-sections">
                <span class="text-black"> {{$section->title ?? '[بدون عنوان]'}} </span>
                @include('welcome_partials.map_options',['close'=>$section->visible, 'delete'=>true, 'partial'=>$section->latin_id])
            </div>
        @endforeach
        <div style="background:{{ $contact_us->background_path ? 'url(../welcome/'.$contact_us->background_path.')' : 'url(../welcome_images/contact-bg.jpg)'}}">
            ارتباط با ما
            @include('welcome_partials.map_options',['close'=>$contact_us->visible, 'delete'=>false, 'partial'=>'contact_us'])
        </div>
        <div class="text-white" style="background-color:{{$colors->layout_background}}">
            فوتر
            @include('welcome_partials.map_options',['close'=>$footer->visible, 'delete'=>false, 'partial'=>'footer'])
        </div>
    </section>
@endsection
