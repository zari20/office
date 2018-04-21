@php
    $images = $section->fragments();
@endphp
<div id="images-{{$section->id}}" class="carousel slide" data-ride="carousel" data-interval="false">
    @if (count($images) > $section->cols)
        <ol class="carousel-indicators carousel-indicators-numbers">
            @for ($i=0; $i <= carousel_indicators($images,$section->cols); $i++)
                <li data-target="#images-{{$section->id}}" data-slide-to="{{$i}}" {!!$i==0 ? 'class="active"' : ''!!}>{{$i+1}}</li>
            @endfor
        </ol>
    @endif
    @if (count($images) > $section->cols) <div class="carousel-inner"> @endif
        @for ($i=0; $i <= carousel_indicators($images,$section->cols); $i++)
            <div class="carousel-item {!! $i==0 ? 'active' : '' !!}">
                <div class="row">
                    @for ($j=($i*$section->cols); $j < ($i*$section->cols)+$section->cols && $j < count($images) ; $j++)
                        <div class="col-md-{{calculate_cols($section->cols)}} col-sm-12 text-center abo">
                            <img src="welcome/{{$images[$j]->picture_path}}" alt="{{$images[$j]->title}}">
                            <h3> {{$images[$j]->title}} </h3>
                            <p> {{$images[$j]->passage}} </p>
                        </div>
                    @endfor
                </div>
            </div>
        @endfor
    @if (count($images) > $section->cols) </div> @endif
</div>
