<nav class="navbar navbar-expand-lg" id="top-menu">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ $welcome_logo->logo_path ? asset('welcome/'.$welcome_logo->logo_path) : asset('welcome_images/logo.png') }}" alt="">
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
                        <a class="nav-link goToByScroll" href="#{{$menu->target}}">
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
