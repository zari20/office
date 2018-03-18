@extends('layouts.welcome_page')
@section('main')
    <div class="cnfix">
        <a href="http://t.me/{{$website->telegram_chat}}" target="_blank">
            <i class="fa fa-comments"></i> چت تلگرام
        </a>
    </div>

    @if ($header->visible)
        @include('welcome_partials.header')
    @endif
    @if ($header->menu_visible)
        @include('welcome_partials.menu')
    @endif
    @foreach ($layouts as $key => $layout)
        @if (rw($layout->puzzle_type) == 'section')
            <section id="{{$layout->puzzle->latin_id}}">
                @if ($title = $layout->puzzle->title)
                    <div class="layout-title">
                        <h2 class="my-4">{{$title}}</h2>
                    </div>
                @endif
                @if (substr( $layout->puzzle->type, 0, 5 ) === "model")
                    @include('welcome.index.model',['section'=>$layout->puzzle, 'model' => str_replace("model", "", $layout->puzzle->type) ])
                @else
                    @include('welcome.index.'.$layout->puzzle->type,['section'=>$layout->puzzle])
                @endif
            </section>
        @elseif(rw($layout->puzzle_type) == 'contactus')
            @include('welcome_partials.contact_us')
        @elseif(rw($layout->puzzle_type) == 'tab')
            <section id="{{$layout->puzzle->latin_id}}">
                @include('welcome.index.tab', ['tab' => $layout->puzzle])
            </section>
        @endif
    @endforeach
    @if ($footer->visible)
        @include('welcome_partials.footer')
    @endif
@endsection
