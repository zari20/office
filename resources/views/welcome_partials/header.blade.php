<section class="topbar" id="home">
    <div class="row">
        <div class="col-md-4 @if($header->type == 2) white-logo @endif">
            <div class="row mt-2">
                <div class="col-3 col-sm-2">
                    <img src="{{ $welcome_logo->picture_path ? asset('welcome/'.$welcome_logo->picture_path) : asset('welcome_images/logo.png') }}"
                    alt="{{$welcome_logo->title ?? ''}}" width="85px" height="85px" class="mx-md-3 mx-2">
                </div>
                <div class="col-9 col-sm-10 logo text-righ">
                    <div class="mr-md-5 mr-2">
                        <h1> {{$welcome_logo->title ?? ''}} </h1>
                        <h3> {!! $welcome_logo->info ? nl2br($welcome_logo->info) : '' !!} </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 mt-2">
            <div class="text-md-left text-center ml-md-5 ml-0 mb-1 my-md-0 my-4">
                <div class="@if($header->type == 2) ml-md-5 @endif">
                    <a class="text-white mx-md-3 mx-1" href="tel:{{$header->telephone}}">
                        {{$header->telephone}}
                        <i class="fa fa-phone text-second mr-1"></i>
                    </a>
                    <div class="bl d-none d-md-inline-block">&nbsp;</div>
                    <a class="text-white mx-md-3 mx-1" href="{{$header->link_href}}">
                        <i class="fa fa-{{$header->link_icon}} text-second ml-1"></i>
                        {{$header->link_name}}
                    </a>
                </div>
            </div>
            <div class="row header-center">
                <div class="col-md-1 text-center {{$header->type == 2 ? 'col-5' : 'col-3'}}">
                    <a target="_blank" href="http://t.me/{{$header->telegram_id ?? ''}}">
                        <i class="text-white fa fa-telegram fa-2x mt-2 mr-2 hover-text-second"></i>
                    </a>
                </div>
                <div class="bl"></div>
                <div class="col-md-1 text-center {{$header->type == 2 ? 'col-5' : 'col-4'}}">
                    <a target="_blank" href="http://instagram.com/{{$header->instagram_id ?? ''}}">
                        <i class="text-white fa fa-instagram fa-2x mt-2 mr-2 hover-text-second"></i>
                    </a>
                </div>
                @if ($header->type != 2)
                    <div class="bl"></div>
                    <div class="col-md-1 text-center col-3">
                        <a target="_blank" href="{{url('/login')}}">
                            <i class="text-white fa fa-user fa-2x mt-2 mr-2 hover-text-second"></i>
                        </a>
                    </div>
                @endif
                <div class="col-md-7 mt-3 mt-md-1 @if($header->type == 2) mr-md-5 @endif" dir="ltr">
                    <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-search fa-fw"></i></span>
                        <input class="form-control" type="text" placeholder="{{$header->search_placeholder ?? ''}}" dir="rtl">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-2 portal">
            @if ($header->type == 2)
                <div class="second-header-portal mt-md-4">
                    <a href="#" class="badge bg-first"> رزرو آنلاین </a>
                    <div class="devider"></div>
                    <a href="#">ورود</a>
                    <div class="devider"></div>
                    <a href="#">ثبت نام</a>
                </div>
            @else
                <div class="flash-title">
                    <img src="welcome_images/cursor.png" alt="{{$header->top_links_topic ?? ''}}">
                    <p>{{$header->top_links_topic ?? ''}}</p>
                </div>
                <ul>
                    @foreach ($top_links as $link)
                        <li>
                            <a href="{{$link->href ?? '#'}}" title="{{$link->name}}" data-toggle="tooltip">
                                <img src="{{asset('welcome/'.($link->picture_path ?? ''))}}" width="33px" height="33px">
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</section>
