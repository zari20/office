@extends('layouts.welcome')
@section('content')
    <nav class="bg-info text-center p-4 pb-5">
        <span class="h2 dinar text-white">پنل مدیریت</span>
        <a href="{{url('welcome_new_section')}}" class="border-btn mx-1 float-left"> <i class="fa fa-plus m-1"></i> بخش جدید </a>
        <a href="{{url('welcome_new_tab')}}" class="border-btn mx-1 float-left"> <i class="fa fa-plus m-1"></i> مجموعه تب جدید </a>
        <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank" class="border-btn mx-1 float-right"> <i class="fa fa-font-awesome m-1"></i> لیست فونت ها </a>
        <a href="{{url('welcome_positions')}}" class="border-btn mx-1 float-right"> <i class="fa fa-sort-amount-asc m-1"></i> مدیریت کلی سایت </a>
    </nav>
    <section class="p-3 text-center map">

        {{-- map --}}
        <hr>
        <p class="h3 dinar bg-success text-white py-4"> <i class="fa fa-map ml-1"></i> نقشه سایت </p>
        <hr>

        <div class="text-white" style="background-color:{{$colors->layout_background}}">
            هدر
            @include('welcome_partials.map_options',['close'=>$header->visible, 'delete'=>false, 'id'=>0, 'class'=>true, 'partial'=>'header'])
        </div>
        <div class="text-white bg-lavender">
            <span class="text-black"> منو </span>
            @include('welcome_partials.map_options',['close'=>$header->menu_visible, 'delete'=>false, 'id'=>0, 'class'=>true, 'partial'=>'menu'])
        </div>
        @foreach ($layouts as $key => $layout)
            @if (rw($layout->puzzle_type) == 'section')
                <div class="welcome-sections">
                    <span class="text-black">
                        <small>[{{$layout->puzzle->latin_id}}]</small>
                        <span class="font-weight-bold">{{$layout->puzzle->title ?? '[بدون عنوان]'}}</span>
                        <small>[{{welcome_translate($layout->puzzle->type)}}]</small>
                    </span>
                    @include('welcome_partials.map_options',['close'=>$layout->visible, 'delete'=>true, 'id'=>$layout->puzzle->id, 'class'=>true, 'partial'=>'section'])
                    <small class="map-type"> بخش </small>
                </div>
            @elseif (rw($layout->puzzle_type) == 'contactus')
                <div style="background:{{ $contact_us->background_path ? 'url(../../welcome/'.$contact_us->background_path.')' : 'url(../../welcome_images/contact-bg.jpg)'}}">
                    ارتباط با ما
                    @include('welcome_partials.map_options',['close'=>$layout->visible, 'delete'=>false, 'id'=>0, 'class'=>true, 'partial'=>'contact_us'])
                </div>
            @else
                <div class="welcome-tabs row">
                    <div class="col-12">
                        <p>
                            <small>[{{$layout->puzzle->latin_id}}]</small>
                            <span class="font-weight-bold">{{$layout->puzzle->title}}</span>
                        </p>
                        <small class="map-type"> تب </small>
                        @include('welcome_partials.map_options',['close'=>$layout->visible, 'delete'=>true, 'id'=>$layout->puzzle->id, 'class'=>true, 'partial'=>'tab'])
                    </div>
                    <hr class="col-12">
                    @foreach ($layout->puzzle->sections as $key => $section)
                        <div class="col-md-{{calculate_cols(count($layout->puzzle->sections))}}">
                            {{$section->title}}
                            <br>
                            <small>[{{welcome_translate($section->type)}}]</small>
                            @include('welcome_partials.map_options',['close'=>$section->visible, 'delete'=>true, 'id'=>$section->id, 'class'=>false, 'partial'=>'section'])
                        </div>
                    @endforeach
                </div>
            @endif
        @endforeach
        <div class="text-white" style="background-color:{{$colors->layout_background}}">
            فوتر
            @include('welcome_partials.map_options',['close'=>$footer->visible, 'delete'=>false, 'id'=>0, 'class'=>true, 'partial'=>'footer'])
        </div>
    </section>
@endsection
