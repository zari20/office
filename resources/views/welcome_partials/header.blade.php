<section class="topbar" id="home">
    <div class="row px-4">
        <div class="col-md-5">
            <div class="row">
                <div class="col-3 col-sm-2">
                    <img src="{{ $welcome_logo->logo_path ? asset('welcome/'.$welcome_logo->logo_path) : asset('welcome_images/logo.png') }}"
                    alt="{{$welcome_logo->title ?? ''}}" width="75px" height="75px">
                </div>
                <div class="col-9 col-sm-10 logo text-right">
                    <h1> {{$welcome_logo->title ?? ''}} </h1>
                    <h3> {{$welcome_logo->info ?? ''}} </h3>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="text-left ml-5 mb-1 my-md-0 my-4">
                <a class="text-white mx-3" href="tel:{{$header->telephone}}">
                    {{$header->telephone}}
                    <i class="fa fa-phone text-first mr-1"></i>
                </a>
                <div class="bl">&nbsp;</div>
                <a class="text-white mx-3" href="{{$header->link_href}}">
                    <i class="fa fa-{{$header->link_icon}} text-first ml-1"></i>
                    {{$header->link_name}}
                </a>
            </div>
            <div class="row header-center">
                <div class="col-md-1 text-center col-3">
                    <a target="_blank" href="http://t.me/{{$header->telegram_id ?? ''}}">
                        <i class="text-white fa fa-telegram fa-3x"></i>
                    </a>
                </div>
                <div class="bl"></div>
                <div class="col-md-1 text-center col-4">
                    <a target="_blank" href="http://instagram.com/{{$header->instagram_id ?? ''}}">
                        <i class="text-white fa fa-instagram fa-3x"></i>
                    </a>
                </div>
                <div class="bl"></div>
                <div class="col-md-1 text-center col-3">
                    <a target="_blank" href="{{url('/login')}}">
                        <i class="text-white fa fa-user fa-3x"></i>
                    </a>
                </div>
                <div class="bl d-none d-md-block"></div>
                <div class="col-md-7 mt-3 mt-md-1" dir="ltr">
                    <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-search fa-fw"></i></span>
                        <input class="form-control" type="text" placeholder="{{$header->search_placeholder ?? ''}}" dir="rtl">
                    </div>
                </div>
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
