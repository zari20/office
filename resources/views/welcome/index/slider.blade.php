@if($layout->container) <div class="container"> @endif
    <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
        @if ( count($section->fragments()) > 1 )
            <ol class="carousel-indicators carousel-indicators-circles">
                @foreach ($section->fragments() as $key => $slider)
                    <li data-target="#carouselIndicators" data-slide-to="{{$key}}" {!! $key==0 ? 'class="active"' : '' !!} ></li>
                @endforeach
            </ol>
        @endif
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
@if($layout->container) </div> @endif
