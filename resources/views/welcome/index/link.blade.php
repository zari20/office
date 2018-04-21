<section class="container mb-5">
    @php
        $links = $section->fragments();
    @endphp
    <div id="links-{{$section->id}}" class="carousel slide" data-ride="carousel" data-interval="false">
        @if (count($links) > $section->cols)
            <ol class="carousel-indicators carousel-indicators-numbers">
                @for ($i=0; $i <= carousel_indicators($links,$section->cols); $i++)
                    <li data-target="#links-{{$section->id}}" data-slide-to="{{$i}}" {!!$i==0 ? 'class="active"' : ''!!}>{{$i+1}}</li>
                @endfor
            </ol>
        @endif
        @if (count($links) > $section->cols) <div class="carousel-inner"> @endif
            @for ($i=0; $i <= carousel_indicators($links,$section->cols); $i++)
                <div class="carousel-item {!! $i==0 ? 'active' : '' !!}">
                    <div class="row">
                        <div class="btnshop">
                            @for ($j=($i*$section->cols); $j < ($i*$section->cols)+$section->cols && $j < count($links) ; $j++)
                                <div class="col-md-{{calculate_cols($section->cols)}} col-sm-12">
                                    <a href="{{$links[$j]->href}}" class="text-white"> {{$links[$j]->name}} </a>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            @endfor
        @if (count($links) > $section->cols) </div> @endif
    </div>
</section>
