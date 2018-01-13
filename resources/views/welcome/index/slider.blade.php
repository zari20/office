<section class="srsl">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="slider">
                    <div id="slider1" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($section->fragments() as $key => $slider)
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
