<div class="container">
    <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($section->fragments() as $key => $slider)
                <li data-target="#carouselIndicators" data-slide-to="{{$key}}" {!! $key==0 ? 'class="active"' : '' !!} ></li>
            @endforeach
        </ol>
        <div class="carousel-inner" role="listbox">
            @foreach ($section->fragments() as $key => $slider)
                <div class="carousel-item {{$key==0 ? 'active' : ''}}">
                    <img class="d-block img-fluid" src="welcome/{{$slider->picture_path}}" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h3> {{$slider->title}} </h3>
                        <p> {{$slider->passage}} </p>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
            {{-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> --}}
            <span class="sr-only">قبلی</span>
        </a>
        <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
            {{-- <span class="carousel-control-next-icon" aria-hidden="true"></span> --}}
            <span class="sr-only">بعدی</span>
        </a>
    </div>
</div>



{{--

<section class="srsl">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="slider">
                    <div id="slide-show" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($section->fragments() as $key => $slider)
                                <div class="carousel-item {{$key==0 ? 'active' : null}}" class="bg" style="background-image: url(../../welcome/{{$slider->picture_path}})">
                                    @if ($slider->title)
                                        <h4> {{$slider->title}} </h4>
                                    @endif
                                    @if ($slider->body)
                                        <p> {{$slider->body}} </p>
                                    @endif
                                    @if ($slider->button_name)
                                        <div class="btn"><a href="{{$slider->button_link}}"> {{$slider->button_name}} </a></div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#slide-show" role="button" data-slide="prev">
                            <span class="sr-only">قبلی</span>
                        </a>
                        <a class="carousel-control-next" href="#slide-show" role="button" data-slide="next">
                            <span class="sr-only">بعدی</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
