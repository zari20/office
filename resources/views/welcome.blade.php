<!DOCTYPE html>
<html lang="fa">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
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

        @include('welcome_partials.header')
        @include('welcome_partials.menu')
        <div class="clear">.</div>
        @foreach ($layouts as $key => $layout)
            @if (rw($layout->puzzle_type) == 'section')
                @if ($title = $layout->puzzle->title)
                    <div class="layout-title">
                        <h4>{{$title}}</h4>
                    </div>
                @endif
                @include('welcome.index.'.$layout->puzzle->type,['section'=>$layout->puzzle])
            @else
                @include('welcome.index.tab', ['tab' => $layout->puzzle])
            @endif
        @endforeach
        @if ($contact_us->visible)
            @include('welcome_partials.contact_us')
        @endif
        @include('welcome_partials.footer')

        <script src="js/welcome.jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/contact_me.js"></script>
        <script src="js/jqBootstrapValidation.js"></script>
        <script>
            $(document).ready(function(e) {
                $('ul.menu li').hover(function()
                {
                    $(this).children('ul:first').slideDown(100);

                },function()
                {

                    $(this).children('ul:first').slideUp(100);

                });

                jQuery(window).scroll(function(){
                    sticky_menu();
                });

            });

            function sticky_menu(){
                var top = jQuery(window).scrollTop();
                var nav_top = jQuery('#top-menu').outerHeight();
                if (top > nav_top) {
                    jQuery('#top-menu').addClass('sticky').children().addClass('container');
                } else
                {
                    jQuery('#top-menu').removeClass('sticky');
                }
            }
        </script>
        <script>
            $(document).ready(function(){
                var goToByScroll = function(id) {
                    id = id.replace("link", "");
                    $("html, body").animate({scrollTop: $("#" + id).offset().top});
                }

                $('.goToByScroll').on("click", function(e){
                    e.preventDefault();
                    goToByScroll($(this).attr("id"));
                });
            });
        </script>
    </body>
</html>
