<!DOCTYPE html>
<html lang="fa">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title> {{$header->website_title ?? '-'}} </title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->

        @include('welcome_partials.styles')

        <link href="css/responsive.css" rel="stylesheet">
        <link href="css/fonts.css" rel="stylesheet">

    </head>
    <body>
        <div class="cnfix"><a href="#"><i class="fa fa-comments"></i> گفتگوی آنلاین </a></div>
        <section class="topbar" id="home">
            <div class="container">
                <div class="col-xl-4 col-lg-4 col-md-6 col-xs-12 contact">
                    <div class="row">
                        <ul>
                            <li class="phone"><a href="tel:{{$header->telephone ?? ''}}"><i class="fa fa-phone"></i>{{$header->telephone ?? ''}}</a></li>
                            <li><a href="{{$header->co_link ?? '#'}}"><i class="fa fa-handshake-o"></i>دعوت به همکاری</a></li>
                        </ul>
                    </div>
                    <div class="row">
                        <form>
                            <input type="text" name="search" placeholder="{{$words->search}}">
                            <button type="submit" class="btn btn-default"><span class="fa-search"></span></button>
                        </form>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-xs-12 portal">
                    <div class="flash-title">
                        <img src="images/flash.png" alt="">
                        <p>{{$words->other}}</p>
                    </div>
                    <ul>
                        @foreach ($top_links as $link)
                            <li><a href="{{$link->href}}"><img src="{{asset('welcome/'.$link->logo_path)}}" width="33px" height="33px"></a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 col-xs-12 user">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-xs-12">
                            <div class="social">
                                <ul>
                                    <li><a target="_blank" href="http://t.me/{{$header->telegram_id ?? ''}}"><i class="fa fa-telegram"></i></a></li>
                                    <li><a target="_blank" href="http://instagram.com/{{$header->instagram_id ?? ''}}"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-xs-12">
                            <div class="cart">
                                <i class="fa fa-shopping-cart"></i>
                                <p><span><a href="#">0</a></span> {{$words->product}} </p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-xs-12">
                            <div class="user-box">
                                @guest
                                    <a href="{{url('/home')}}" class="btn btn-default mt-2">
                                        ورود
                                    </a>
                                @else
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">
                                            <i class="fa fa-user"></i>
                                            ادمین
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{url('/login')}}" class="dropdown-item text-primary">
                                                    داشبورد
                                                </a>
                                            </li>
                                            <li>
                                                <form class="d-inline" action="{{url('logout')}}" method="post">
                                                    {{csrf_field()}}
                                                    <a href="javascript:void(0)" class="dropdown-item text-primary" onclick="jQuery(this).parent().submit()">
                                                        خروج
                                                    </a>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg" id="top-menu">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{asset('welcome/'.($welcome_logo->logo_path ?? ''))}}" alt="">
                    <span class="title">
                        <h1> {{$welcome_logo->title ?? ''}} </h1>
                        <h2> {{$welcome_logo->info ?? ''}} </h2>
                    </span>
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        @foreach ($menus as $key => $menu)
                            <li class="nav-item">
                                <a class="nav-link goToByScroll" href="#" id="{{$menu->target}}link">
                                    <i class="fa fa-{{$menu->icon}}" aria-hidden="true"></i>
                                    {{$menu->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
        <div class="clear">.</div>
        <section class="boxes">
            <div class="container">
                <div class="row">
                    @foreach ($cols as $key => $col)
                        <a href="{{$col->href}}" class="d-block col-md-3">
                            <div class="box text-center">
                                <i class="fa fa-{{$col->icon}}" aria-hidden="true"></i>
                                <h3> {{$col->subject}} </h3>
                                <p> {{$col->info}} </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="srsl">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="slider">
                            <div id="slider1" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($sliders as $key => $slider)
                                        <div class="carousel-item {{$key==0 ? 'active' : null}}">
                                            <h4> {{$slider->title}} </h4>
                                            <p> {{$slider->body}} </p>
                                            <div class="btn"><a href="{{$slider->button_link}}"> {{$slider->button_name}} </a></div>
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#slider1" role="button" data-slide="prev">
                                <span class="sr-only">قبلی</span>
                                </a>
                                <a class="carousel-control-next" href="#slider1" role="button" data-slide="next">
                                <span class="sr-only">بعدی</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="introduction" id="moarefi">
            <div class="container">
                <div class="row">
                    <div class="title">
                        <h4>{{$words->introduce}}</h4>
                    </div>
                    <div class="tabs">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            @foreach ($introduce_tabs as $key => $tab)
                                <li class="nav-item">
                                    <a class="nav-link {{$key==0 ? 'active' : ''}}" id="pills-{{$key+1}}-tab" data-toggle="pill" href="#pills-{{$key+1}}" role="tab" aria-controls="pills-{{$key+1}}" aria-selected="true">
                                        {{$tab->title}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            @foreach ($introduce_tabs as $key => $tab)
                                <div class="tab-pane fade show {{$key==0 ? 'active' : ''}}" id="pills-{{$key+1}}" role="tabpanel" aria-labelledby="pills-{{$key+1}}-tab">
                                    <div id="introduce{{$key+1}}" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            @foreach ($tab->blogs() as $key => $blog)
                                                <li data-target="#introduce{{$key+1}}" data-slide-to="{{$key}}" {!!$key==0 ? 'class="active"' : ''!!}></li>
                                            @endforeach
                                        </ol>
                                        <div class="carousel-inner">
                                            @foreach ($tab->blogs() as $key => $blog)
                                                <div class="carousel-item {{$key==0 ? 'active' : ''}}">
                                                    <div class="row">
                                                        <div class="col-xl-7 col-lg-7 col-md-7 col-xs-12">
                                                            <h4><a href="#"> {{$blog->title}} </a></h4>
                                                            <p> {{$blog->passage}} </p>
                                                        </div>
                                                        <div class="col-xl-5 col-lg-5 col-md-5 col-xs-12">
                                                            <img class="img-fluid" src="welcome/{{$blog->picture_path}}" alt="{{$blog->title}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="introduction about" id="about">
            <div class="container">
                <div class="row">
                    <div class="title">
                        <h4>{{$words->about_us}}</h4>
                    </div>
                    <div class="tabs">
                        <ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-11-tab" data-toggle="pill" href="#pills-11" role="tab" aria-controls="pills-11" aria-selected="true">{{$words->our_team}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-22-tab" data-toggle="pill" href="#pills-22" role="tab" aria-controls="pills-22" aria-selected="false">{{$words->our_services}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-33-tab" data-toggle="pill" href="#pills-33" role="tab" aria-controls="pills-33" aria-selected="false">{{$words->our_projects}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-44-tab" data-toggle="pill" href="#pills-44" role="tab" aria-controls="pills-44" aria-selected="false">{{$words->our_departments}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-55-tab" data-toggle="pill" href="#pills-55" role="tab" aria-controls="pills-55" aria-selected="false">{{$words->our_views}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-66-tab" data-toggle="pill" href="#pills-66" role="tab" aria-controls="pills-66" aria-selected="false">{{$words->our_branches}}</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-11" role="tabpanel" aria-labelledby="pills-11-tab">
                                @if(count($team_members) > 4) <div id="slider7" class="carousel slide" data-ride="carousel"> @endif
                                    @if ( count($team_members) > 4 )
                                        <ol class="carousel-indicators">
                                            @for ($i=0; $i <= carousel_indicators($team_members); $i++)
                                                <li data-target="#slider7" data-slide-to="{{$i}}" {!! $i==0 ? 'class="active"' : '' !!}></li>
                                            @endfor
                                        </ol>
                                    @endif
                                    @if(count($team_members) > 4) <div class="carousel-inner"> @endif
                                        @for ($i=0; $i <= carousel_indicators($team_members); $i++)
                                            <div class="carousel-item {!! $i==0 ? 'active' : '' !!}">
                                                <div class="row">
                                                    @for ($j=($i*4); $j < ($i*4)+4 && $j < count($team_members) ; $j++)
                                                        <div class="col-xl-3 col-lg-3 col-md-6 col-xs-12 text-center abo">
                                                            <img src="welcome/{{$team_members[$j]->picture_path}}" alt="{{$team_members[$j]->title}}">
                                                            <h3> {{$team_members[$j]->title}} </h3>
                                                            <p> {{$team_members[$j]->body}} </p>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                        @endfor
                                    @if(count($team_members) > 4) </div> @endif
                                @if(count($team_members) > 4) </div> @endif
                            </div>
                            <div class="tab-pane fade" id="pills-22" role="tabpanel" aria-labelledby="pills-22-tab">
                                @if(count($our_services) > 1) <div id="slider8" class="carousel slide" data-ride="carousel"> @endif
                                    @if ( count($our_services) > 1 )
                                        <ol class="carousel-indicators">
                                            @foreach ($our_services as $key => $service)
                                                <li data-target="#slider8" data-slide-to="{{$key}}" {!! $key==0 ? 'class="active"' : '' !!}></li>
                                            @endforeach
                                        </ol>
                                    @endif
                                    @if(count($our_services) > 1) <div class="carousel-inner"> @endif
                                        @foreach ($our_services as $key => $service)
                                            <div class="carousel-item {!! $key==0 ? 'active' : '' !!}">
                                                <div class="row">
                                                    <div class="col-xl-7 col-lg-7 col-md-7 col-xs-12">
                                                        <h4><a href="#">{{$service->title}}</a></h4>
                                                        <p>{{$service->passage}}</p>
                                                    </div>
                                                    <div class="col-xl-5 col-lg-5 col-md-5 col-xs-12">
                                                        <img class="img-fluid" src="welcome/{{$service->picture_path}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @if(count($our_services) > 1) </div> @endif
                                @if(count($our_services) > 1) </div> @endif
                            </div>
                            <div class="tab-pane fade" id="pills-33" role="tabpanel" aria-labelledby="pills-33-tab">
                                @if(count($our_projects) > 4) <div id="slider9" class="carousel slide" data-ride="carousel"> @endif
                                    @if ( count($our_projects) > 4 )
                                        <ol class="carousel-indicators">
                                            @for ($i=0; $i <= carousel_indicators($our_projects); $i++)
                                                <li data-target="#slider9" data-slide-to="{{$i}}" {!! $i==0 ? 'class="active"' : '' !!}></li>
                                            @endfor
                                        </ol>
                                    @endif
                                    @if(count($our_projects) > 4) <div class="carousel-inner"> @endif
                                        @for ($i=0; $i <= carousel_indicators($our_projects); $i++)
                                            <div class="carousel-item {!! $i==0 ? 'active' : '' !!}">
                                                <div class="row">
                                                    @for ($j=($i*4); $j < ($i*4)+4 && $j < count($our_projects) ; $j++)
                                                        <div class="col-xl-3 col-lg-3 col-md-6 col-xs-12 text-center">
                                                            <div class="project">
                                                                <img src="welcome/{{$our_projects[$j]->picture_path}}" alt="{{$our_projects[$j]->title}}">
                                                                <h3> {{$our_projects[$j]->title}} </h3>
                                                                <p> {{$our_projects[$j]->body}} </p>
                                                            </div>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                        @endfor
                                    @if(count($our_projects) > 4) </div> @endif
                                @if(count($our_projects) > 4) </div> @endif
                            </div>
                            <div class="tab-pane fade" id="pills-44" role="tabpanel" aria-labelledby="pills-44-tab">
                                @if(count($our_departments) > 4) <div id="slider10" class="carousel slide" data-ride="carousel"> @endif
                                    @if ( count($our_departments) > 4 )
                                        <ol class="carousel-indicators">
                                            @for ($i=0; $i <= carousel_indicators($our_departments); $i++)
                                                <li data-target="#slider10" data-slide-to="{{$i}}" {!! $i==0 ? 'class="active"' : '' !!}></li>
                                            @endfor
                                        </ol>
                                    @endif
                                    @if(count($our_departments) > 4) <div class="carousel-inner"> @endif
                                        @for ($i=0; $i <= carousel_indicators($our_departments); $i++)
                                            <div class="carousel-item {!! $i==0 ? 'active' : '' !!}">
                                                <div class="row">
                                                    @for ($j=($i*4); $j < ($i*4)+4 && $j < count($our_departments) ; $j++)
                                                        <div class="col-xl-3 col-lg-3 col-md-6 col-xs-12 text-center">
                                                            <div class="project">
                                                                <img src="welcome/{{$our_departments[$j]->picture_path}}" alt="{{$our_departments[$j]->title}}">
                                                                <h3> {{$our_departments[$j]->title}} </h3>
                                                                <p> {{$our_departments[$j]->body}} </p>
                                                            </div>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                        @endfor
                                    @if(count($our_departments) > 4) </div> @endif
                                @if(count($our_departments) > 4) </div> @endif
                            </div>
                            <div class="tab-pane fade" id="pills-55" role="tabpanel" aria-labelledby="pills-55-tab">
                                @if(count($our_views) > 1) <div id="slider8" class="carousel slide" data-ride="carousel"> @endif
                                    @if ( count($our_views) > 1 )
                                        <ol class="carousel-indicators">
                                            @foreach ($our_views as $key => $view)
                                                <li data-target="#slider8" data-slide-to="{{$key}}" {!! $key==0 ? 'class="active"' : '' !!}></li>
                                            @endforeach
                                        </ol>
                                    @endif
                                    @if(count($our_views) > 1) <div class="carousel-inner"> @endif
                                        @foreach ($our_views as $key => $view)
                                            <div class="carousel-item {!! $key==0 ? 'active' : '' !!}">
                                                <div class="row">
                                                    <div class="col-xl-7 col-lg-7 col-md-7 col-xs-12">
                                                        <h4><a href="#">{{$view->title}}</a></h4>
                                                        <p>{{$view->passage}}</p>
                                                    </div>
                                                    <div class="col-xl-5 col-lg-5 col-md-5 col-xs-12">
                                                        <img class="img-fluid" src="welcome/{{$view->picture_path}}" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @if(count($our_views) > 1) </div> @endif
                                @if(count($our_views) > 1) </div> @endif
                            </div>
                            <div class="tab-pane fade" id="pills-66" role="tabpanel" aria-labelledby="pills-66-tab">
                                @if(count($our_branches) > 4) <div id="slider12" class="carousel slide" data-ride="carousel"> @endif
                                    @if ( count($our_branches) > 4 )
                                        <ol class="carousel-indicators">
                                            @for ($i=0; $i <= carousel_indicators($our_branches); $i++)
                                                <li data-target="#slider12" data-slide-to="{{$i}}" {!! $i==0 ? 'class="active"' : '' !!}></li>
                                            @endfor
                                        </ol>
                                    @endif
                                    @if(count($our_branches) > 4) <div class="carousel-inner"> @endif
                                        @for ($i=0; $i <= carousel_indicators($our_branches); $i++)
                                            <div class="carousel-item {!! $i==0 ? 'active' : '' !!}">
                                                <div class="row">
                                                    @for ($j=($i*4); $j < ($i*4)+4 && $j < count($our_branches) ; $j++)
                                                        <div class="col-xl-3 col-lg-3 col-md-6 col-xs-12 text-center">
                                                            <div class="project">
                                                                <img src="welcome/{{$our_branches[$j]->picture_path}}" alt="{{$our_branches[$j]->title}}">
                                                                <h3> {{$our_branches[$j]->title}} </h3>
                                                                <p> {{$our_branches[$j]->body}} </p>
                                                            </div>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                        @endfor
                                    @if(count($our_branches) > 4) </div> @endif
                                @if(count($our_branches) > 4) </div> @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="introduction contact" id="contact">
            <div class="container">
                <div class="row">
                    <div class="title">
                        <h4>{{$words->ontact_us}}</h4>
                    </div>
                    <div class="tabs">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-77-tab" data-toggle="pill" href="#pills-77" role="tab" aria-controls="pills-77" aria-selected="true">{{$words->contact_main_branch}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-88-tab" data-toggle="pill" href="#pills-88" role="tab" aria-controls="pills-88" aria-selected="false">{{$words->contact_branches}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-99-tab" data-toggle="pill" href="#pills-99" role="tab" aria-controls="pills-99" aria-selected="false">{{$words->contact_us_form}}</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-77" role="tabpanel" aria-labelledby="pills-77-tab">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12 contactinfo">
                                        <h3>{{$words->contact_information}}</h3>
                                        <p>
                                            {!! isset($main_branch->passage) ? nl2br($main_branch->passage) : '' !!}
                                        </p>
                                        <div class="social">
                                            <ul>
                                                <li>
                                                    <a href="http://t.me/{{$main_branch->telegram_id ?? ''}}">
                                                        <i class="fa fa-telegram"></i>
                                                        {{isset($main_branch->telegram_id) ? '@'.$main_branch->telegram_id: ''}}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="http://instagram.com/{{$main_branch->instagram_id ?? ''}}">
                                                        <i class="fa fa-instagram"></i>
                                                        {{isset($main_branch->instagram_id) ? '@'.$main_branch->instagram_id: ''}}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    @if (isset($main_branch->x_direction) && isset($main_branch->y_direction))
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                                            <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll={{$main_branch->x_direction}}, {{$main_branch->y_direction}}&amp;spn={{$main_branch->x_direction}},{{$main_branch->y_direction}}&amp;t=m&amp;z={{$main_branch->map_zoom ?? 1}}&amp;output=embed"></iframe>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-88" role="tabpanel" aria-labelledby="pills-88-tab">
                                <div id="slider13" class="carousel slide" data-ride="carousel">
                                    @if ( count($contact_branches) > 1 )
                                        <ol class="carousel-indicators">
                                            @foreach ($contact_branches as $key => $branch)
                                                <li data-target="#slider13" data-slide-to="{{$key}}" {!! $key==0 ? 'class="active"' : '' !!}></li>
                                            @endforeach
                                        </ol>
                                    @endif
                                    <div class="carousel-inner">
                                        @foreach ($contact_branches as $key => $branch)
                                            <div class="carousel-item {!! $key==0 ? 'active' : '' !!}">
                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12 contactinfo">
                                                        <h3>{{$words->contact_information}}</h3>
                                                        <p>
                                                            {!! $branch->passage ? nl2br($branch->passage) : '' !!}
                                                        </p>
                                                        <div class="social">
                                                            <ul>
                                                                <li>
                                                                    <a href="http://t.me/{{$branch->telegram_id ?? ''}}">
                                                                        <i class="fa fa-telegram"></i>
                                                                        {{$branch->telegram_id ? '@'.$branch->telegram_id: ''}}
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="http://instagram.com/{{$branch->instagram_id ?? ''}}">
                                                                        <i class="fa fa-instagram"></i>
                                                                        {{$branch->instagram_id ? '@'.$branch->instagram_id: ''}}
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    @if ($branch->x_direction && $branch->y_direction)
                                                        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                                                            <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll={{$branch->x_direction}}, {{$branch->y_direction}}&amp;spn={{$branch->x_direction}},{{$branch->y_direction}}&amp;t=m&amp;z={{$branch->map_zoom ?? 1}}&amp;output=embed"></iframe>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-99" role="tabpanel" aria-labelledby="pills-99-tab">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12">
                                        <h3>فرم تماس با ما</h3>
                                        <form name="sentMessage" id="contactForm" novalidate>
                                            <div class="control-group form-group">
                                                <div class="controls">
                                                    <label>نام و نام خانوادگی:</label>
                                                    <input type="text" class="form-control" id="name" required data-validation-required-message="نام خود را وارد کنید.">
                                                    <p class="help-block"></p>
                                                </div>
                                            </div>
                                            <div class="control-group form-group">
                                                <div class="controls">
                                                    <label>شماره تماس:</label>
                                                    <input type="tel" class="form-control" id="phone" required data-validation-required-message="شماره تماس خود را وارد کنید.">
                                                </div>
                                            </div>
                                            <div class="control-group form-group">
                                                <div class="controls">
                                                    <label>آدرس ایمیل:</label>
                                                    <input type="email" class="form-control" id="email" required data-validation-required-message="آدرس ایمیل خود را وارد کنید.">
                                                </div>
                                            </div>
                                            <div class="control-group form-group">
                                                <div class="controls">
                                                    <label>پیام شما:</label>
                                                    <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="پیام خود را وارد کنید" maxlength="999" style="resize:none"></textarea>
                                                </div>
                                            </div>
                                            <div id="success"></div>
                                            <button type="submit" class="btn">ارسال</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="introduction about">
            <div class="container">
                <div class="row">
                    <div class="title">
                        <h4>{{$words->present}}</h4>
                    </div>
                    <div class="tabs">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-111-tab" data-toggle="pill" href="#pills-111" role="tab" aria-controls="pills-111" aria-selected="true">{{$words->catalogs}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-222-tab" data-toggle="pill" href="#pills-222" role="tab" aria-controls="pills-222" aria-selected="false">{{$words->videos}}</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-111" role="tabpanel" aria-labelledby="pills-111-tab">
                                @if(count($catalogs) > 4) <div id="slider15" class="carousel slide" data-ride="carousel"> @endif
                                    @if ( count($catalogs) > 4 )
                                        <ol class="carousel-indicators">
                                            @for ($i=0; $i <= carousel_indicators($catalogs); $i++)
                                                <li data-target="#slider15" data-slide-to="{{$i}}" {!! $i==0 ? 'class="active"' : '' !!}></li>
                                            @endfor
                                        </ol>
                                    @endif
                                    @if(count($catalogs) > 4) <div class="carousel-inner"> @endif
                                        @for ($i=0; $i <= carousel_indicators($catalogs); $i++)
                                            <div class="carousel-item {!! $i==0 ? 'active' : '' !!}">
                                                <div class="row">
                                                    @for ($j=($i*4); $j < ($i*4)+4 && $j < count($catalogs) ; $j++)
                                                        <div class="col-xl-3 col-lg-3 col-md-6 col-xs-12 text-center">
                                                            <div class="catalog">
                                                                <img src="welcome/{{$catalogs[$j]->picture_path}}" alt="{{$catalogs[$j]->title}}">
                                                                <div class="title">
                                                                    <a href="{{asset('welcome/'.$catalogs[$j]->picture_path)}}" download>دانلود</a>
                                                                    <h3> {{$catalogs[$j]->title}} </h3>
                                                                </div>
                                                                <p> {{$catalogs[$j]->body}} </p>
                                                            </div>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                        @endfor
                                    @if(count($catalogs) > 4) </div> @endif
                                @if(count($catalogs) > 4) </div> @endif
                            </div>
                            <div class="tab-pane fade" id="pills-222" role="tabpanel" aria-labelledby="pills-222-tab">
                                @if(count($videos) > 4) <div id="slider15" class="carousel slide" data-ride="carousel"> @endif
                                    @if ( count($videos) > 4 )
                                        <ol class="carousel-indicators">
                                            @for ($i=0; $i <= carousel_indicators($videos); $i++)
                                                <li data-target="#slider15" data-slide-to="{{$i}}" {!! $i==0 ? 'class="active"' : '' !!}></li>
                                            @endfor
                                        </ol>
                                    @endif
                                    @if(count($videos) > 4) <div class="carousel-inner"> @endif
                                        @for ($i=0; $i <= carousel_indicators($videos); $i++)
                                            <div class="carousel-item {!! $i==0 ? 'active' : '' !!}">
                                                <div class="row">
                                                    @for ($j=($i*4); $j < ($i*4)+4 && $j < count($videos) ; $j++)
                                                        <div class="col-xl-3 col-lg-3 col-md-6 col-xs-12 text-center">
                                                            <div class="catalog">
                                                                <img src="welcome/{{$videos[$j]->picture_path}}" alt="{{$videos[$j]->title}}">
                                                                <div class="title">
                                                                    <a href="{{$videos[$j]->aparat_link}}" target="_blank">مشاهده در آپارات</a>
                                                                    <h3> {{$videos[$j]->title}} </h3>
                                                                </div>
                                                                <p> {{$videos[$j]->body}} </p>
                                                            </div>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                        @endfor
                                    @if(count($videos) > 4) </div> @endif
                                @if(count($videos) > 4) </div> @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="introduction shop" id="shop">
            <div class="container">
                <div class="row">
                    <div class="title mb-4">
                        <h4> {{$words->latest_products}} </h4>
                    </div>
                    {{-- <div class="desc">
                        <p>لورم ایپسوم یک متن بی مفهوم است که طراح برای پرکردن صفحات از آن استفاده می کند. لورم ایپسوم یک متن بی مفهوم است که طراح برای پرکردن صفحات از آن استفاده می کند. لورم ایپسوم یک متن بی مفهوم است که طراح برای پرکردن صفحات از آن استفاده می کند. </p>
                    </div> --}}
                    <div class="row">
                        @if(count($latest_products) > 4) <div id="slider18" class="carousel slide" data-ride="carousel"> @endif
                            @if ( count($latest_products) > 4 )
                                <ol class="carousel-indicators">
                                    @for ($i=0; $i <= carousel_indicators($latest_products); $i++)
                                        <li data-target="#slider18" data-slide-to="{{$i}}" {!! $i==0 ? 'class="active"' : '' !!}></li>
                                    @endfor
                                </ol>
                            @endif
                            @if(count($latest_products) > 4) <div class="carousel-inner"> @endif
                                @for ($i=0; $i <= carousel_indicators($latest_products); $i++)
                                    <div class="carousel-item {!! $i==0 ? 'active' : '' !!}">
                                        @for ($j=($i*4); $j < ($i*4)+4 && $j < count($latest_products) ; $j++)
                                            <div class="col-xl-3 col-lg-3 col-md-6 col-xs-12">
                                                <div class="card h-100">
                                                    <a href="#">
                                                        <img class="card-img-top" src="welcome/{{$latest_products[$j]->picture_path}}" alt="{{$latest_products[$j]->title}}">
                                                    </a>
                                                    <div class="card-body">
                                                        <p class="card-text"> {{$latest_products[$j]->body}} </p>
                                                    </div>
                                                    <div class="card-footer">
                                                        <a href="#" class="btn btn-primary blue">{{$words->buy}}</a>
                                                        <p>{{toman($latest_products[$j]->price)}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endfor
                                    </div>
                                @endfor
                            @if(count($latest_products) > 4) </div> @endif
                        @if(count($latest_products) > 4) </div> @endif
                    </div>
                </div>
            </div>
        </section>
        <div class="row mb-5 px-5">
            <div class="btnshop">
                @foreach ($links as $key => $link)
                    <div class="col-xl-3 col-lg-3 col-md-6 col-xs-12">
                        <a href="{{$link->href}}"> {{$link->name}} </a>
                    </div>
                @endforeach
            </div>
        </div>
        <footer class="footer-wrapper">
            <div class="container">
                <div class="footer">
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <h3>{{$footer->title ?? ''}}</h3>
                        <p>{{$footer->passage ?? ''}}</p>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <h3> {{$words->related_links}} </h3>
                        <ul>
                            @if (isset($footer->links) && count($footer->links))
                                @foreach ($footer->links as $key => $link)
                                    <li><a href="{{$link->href}}">{{$link->name}}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="copyright">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                        <p class="copy">&copy; {{$footer->copy_right ?? ''}}</p>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                        <p class="royan">{{$words->footer_owner}}</p>
                    </div>
                </div>
            </div>
        </footer>
        <script src="js/jquery.min.js"></script>
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
