@php
    $five_cols = $section->fragments();
@endphp

<section class="boxes">
    <div class="container">
        <div id="five-cols-{{$section->id}}" class="carousel slide" data-ride="carousel" data-interval="false">
            @if (count($five_cols) > 5)
                <ol class="carousel-indicators carousel-indicators-numbers">
                    @for ($i=0; $i <= carousel_indicators($five_cols,5); $i++)
                        <li data-target="#five-cols-{{$section->id}}" data-slide-to="{{$i}}" {!!$i==0 ? 'class="active"' : ''!!}>{{$i+1}}</li>
                    @endfor
                </ol>
            @endif
            @if (count($five_cols) > 5) <div class="carousel-inner"> @endif
            @for ($i=0; $i <= carousel_indicators($five_cols,5); $i++)
                <div class="carousel-item {!! $i==0 ? 'active' : '' !!}">
                    <div class="row">
                        @for ($j=($i*5); $j < ($i*5)+5 && $j < count($five_cols) ; $j++)
                            <div class="box text-center">
                                <a href="{{$five_cols[$j]->href}}">
                                    <i class="fa fa-{{$five_cols[$j]->icon}}" aria-hidden="true"></i>
                                    <h3> {{$five_cols[$j]->subject}} </h3>
                                    <p> {{$five_cols[$j]->info}} </p>
                                </a>
                            </div>
                        @endfor
                    </div>
                </div>
            @endfor
            @if (count($five_cols) > 5) </div> @endif
        </div>
    </div>
</section>
