<section class="srsl">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="slider">
                    <div id="slide-show" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($section->fragments() as $key => $slider)
                                <div class="carousel-item {{$key==0 ? 'active' : null}}" class="bg" style="background-image: url(../welcome/{{$slider->picture_path}})">
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
</section>
