<nav class="navbar navbar-expand-lg sticky-top bg-white" id="top-menu">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                @foreach ($menus as $key => $menu)
                    <li class="nav-item">
                        <a class="nav-link smooth" href="{{$menu->link ?? '#'.$menu->target}}" @if($menu->link) target="_blank" @endif>
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
