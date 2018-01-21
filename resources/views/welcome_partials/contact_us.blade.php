<section class="introduction contact mt-5" id="{{$contact_us->latin_id}}">
    <div class="container">
        <div class="row">
            <div class="title">
                <h4>{{$contact_us->title}}</h4>
            </div>
            <div class="tabs">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-77-tab" data-toggle="pill" href="#pills-77" role="tab" aria-controls="pills-77" aria-selected="true">{{$contact_us->main_branch_title}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-88-tab" data-toggle="pill" href="#pills-88" role="tab" aria-controls="pills-88" aria-selected="false">{{$contact_us->other_branches_title}}</a>
                    </li>
                    @if ($contact_us->form_visible)
                        <li class="nav-item">
                            <a class="nav-link" id="pills-99-tab" data-toggle="pill" href="#pills-99" role="tab" aria-controls="pills-99" aria-selected="false">{{$contact_us->form_title}}</a>
                        </li>
                    @endif
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-77" role="tabpanel" aria-labelledby="pills-77-tab">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12 contactinfo">
                                <h3>{{$main_branch->title}}</h3>
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
                    @if (count($contact_branches))
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
                                                    <h3>{{$branch->title}}</h3>
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
                    @endif
                    @if ($contact_us->form_visible)
                        <div class="tab-pane fade" id="pills-99" role="tabpanel" aria-labelledby="pills-99-tab">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12">
                                    <h3>{{$contact_us->form_title}}</h3>
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
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
