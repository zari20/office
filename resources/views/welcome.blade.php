<!DOCTYPE html>
<html lang="fa">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="{{$website->description ?? ''}}">
        <meta name="author" content="{{$website->author ?? ''}}">
        <meta name="keywords" content="{{$website->keywords ?? ''}}">
        <title> {{$website->title ?? '-'}} </title>
        <!-- Bootstrap core CSS -->
        <link href="css/welcome.bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->

        @include('welcome_partials.styles')

        <link href="css/welcome.responsive.css" rel="stylesheet">
        <link href="css/welcome.fonts.css" rel="stylesheet">

    </head>
    <body>

        <div class="cnfix"><a href="#"><i class="fa fa-comments"></i> گفتگوی آنلاین </a></div>

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
                            <h4>{{$title}}</h4>
                        </div>
                    @endif
                    @include('welcome.index.'.$layout->puzzle->type,['section'=>$layout->puzzle])
                </section>
            @elseif(rw($layout->puzzle_type) == 'contactus')
                @include('welcome_partials.contact_us')
            @else
                <section id="{{$layout->puzzle->latin_id}}">
                    @include('welcome.index.tab', ['tab' => $layout->puzzle])
                </section>
            @endif
        @endforeach
        @if ($footer->visible)
            @include('welcome_partials.footer')
        @endif

        <script src="js/welcome.jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/contact_me.js"></script>
        <script src="js/jqBootstrapValidation.js"></script>
        <script src="js/welcome-smooth-scroll.js"></script>
    </body>
</html>
