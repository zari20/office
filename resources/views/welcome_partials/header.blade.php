<section class="topbar" id="home">
    <div class="container">
        <div class="col-xl-4 col-lg-4 col-md-6 col-xs-12 contact">
            <div class="row">
                <ul>
                    <li class="phone">
                        <a href="tel:{{$header->telephone ?? ''}}">
                            <i class="fa fa-phone"></i>
                            {{$header->telephone ?? ''}}
                        </a>
                    </li>
                    <li>
                        <a href="{{$header->link_href ?? '#'}}">
                            <i class="fa fa-{{$header->link_icon ?? ''}}"></i>
                            {{$header->link_name ?? ''}}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <form>
                    <input type="text" name="search" placeholder="{{$header->search_placeholder ?? ''}}">
                    <button type="submit" class="btn btn-default"><span class="fa-search"></span></button>
                </form>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-xs-12 portal">
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
                        <p><span><a href="#">0</a></span> محصول </p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-xs-12">
                    <div class="user-box">
                        <a href="{{url('/login')}}" class="btn btn-default mt-2">
                            ورود
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
