@php
    $downloads = $section->fragments();
@endphp
<div id="downloads-{{$section->id}}" class="carousel slide" data-ride="carousel" data-interval="false">
    @if (count($downloads) > $section->cols)
        <ol class="carousel-indicators carousel-indicators-numbers">
            @for ($i=0; $i <= carousel_indicators($downloads,$section->cols); $i++)
                <li data-target="#downloads-{{$section->id}}" data-slide-to="{{$i}}" {!!$i==0 ? 'class="active"' : ''!!}>{{$i+1}}</li>
            @endfor
        </ol>
    @endif
    @if (count($downloads) > $section->cols) <div class="carousel-inner"> @endif
        @for ($i=0; $i <= carousel_indicators($downloads,$section->cols); $i++)
            <div class="carousel-item {!! $i==0 ? 'active' : '' !!}">
                <div class="row">
                    @for ($j=($i*$section->cols); $j < ($i*$section->cols)+$section->cols && $j < count($downloads) ; $j++)
                        <div class="col-md-{{calculate_cols($section->cols)}} col-sm-12 text-center">
                            <div class="catalog">
                                <img src="welcome/{{$downloads[$j]->picture_path}}" alt="{{$downloads[$j]->title}}">
                                <div class="title">
                                    <a href="{{asset('welcome/'.$downloads[$j]->file_path)}}" download>دانلود</a>
                                    <h3> {{$downloads[$j]->title}} </h3>
                                </div>
                                <p> {{$downloads[$j]->passage}} </p>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        @endfor
    @if (count($downloads) > $section->cols) </div> @endif
</div>
