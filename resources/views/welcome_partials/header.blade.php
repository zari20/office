<section class="topbar" id="home">
    <div class="row px-4">
        <div class="col-md-6">
            <div class="row">
                <div class="col-4 text-left">
                    <img src="{{ $welcome_logo->logo_path ? asset('welcome/'.$welcome_logo->logo_path) : asset('welcome_images/logo.png') }}"
                    alt="{{$welcome_logo->title ?? ''}}" width="75px" height="75px">
                </div>
                <div class="col-8 logo text-right">
                    <h1> {{$welcome_logo->title ?? ''}} </h1>
                    <h3> {{$welcome_logo->info ?? ''}} </h3>
                </div>
            </div>
        </div>
        <div class="col-md-4 contact">
            <ul>
                <li class="phone">
                    <a href="tel:{{$header->telephone ?? ''}}">
                        <i class="fa fa-phone small"></i>
                        {{$header->telephone ?? ''}}
                    </a>
                </li>
                <li>
                    <a href="{{$header->link_href ?? '#'}}">
                        <i class="fa fa-{{$header->link_icon ?? ''}} small"></i>
                        {{$header->link_name ?? ''}}
                    </a>
                </li>
                <li>
                    <a target="_blank" href="http://t.me/{{$header->telegram_id ?? ''}}">
                        <i class="fa fa-telegram fa-2x"></i>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="http://instagram.com/{{$header->instagram_id ?? ''}}">
                        <i class="fa fa-instagram fa-2x"></i>
                    </a>
                </li>
            </ul>
            <div class="row">
                <div class="col-4">
                    <a href="{{url('/login')}}" class="user-box">
                        ورود
                    </a>
                </div>
                <form class="col-8">
                    <input id="filter" type="text" placeholder="{{$header->search_placeholder ?? ''}}" />
                    <i id="filtersubmit" class="fa fa-search mr-2"></i>
                </form>
            </div>
        </div>
        <div class="col-md-2 portal">
            <div class="flash-title">
                <img src="welcome_images/flash.png" alt="{{$header->top_links_topic ?? ''}}">
                <p>{{$header->top_links_topic ?? ''}}</p>
            </div>
            <ul>
                @foreach ($top_links as $link)
                    <li>
                        <a href="{{$link->href ?? '#'}}">
                            <img src="{{asset('welcome/'.($link->logo_path ?? ''))}}" width="33px" height="33px">
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
