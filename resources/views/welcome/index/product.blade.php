@php
    $products = $section->fragments();
@endphp
<div id="products-{{$section->id}}" class="carousel slide" data-ride="carousel" data-interval="false">
    @if (count($products) > $section->cols)
        <ol class="carousel-indicators carousel-indicators-numbers">
            @for ($i=0; $i <= carousel_indicators($products,$section->cols); $i++)
                <li data-target="#products-{{$section->id}}" data-slide-to="{{$i}}" {!!$i==0 ? 'class="active"' : ''!!}>{{$i+1}}</li>
            @endfor
        </ol>
    @endif
    @if (count($products) > $section->cols) <div class="carousel-inner"> @endif
        @for ($i=0; $i <= carousel_indicators($products,$section->cols); $i++)
            <div class="carousel-item {!! $i==0 ? 'active' : '' !!}">
                <div class="row">
                    @for ($j=($i*$section->cols); $j < ($i*$section->cols)+$section->cols && $j < count($products) ; $j++)
                        <div class="col-md-{{calculate_cols($section->cols)}} col-sm-12 shop">
                            <div class="card h-100">
                                <a href="#">
                                    <img class="card-img-top" src="welcome/{{$products[$j]->picture_path}}" alt="{{$products[$j]->title}}">
                                </a>
                                <div class="card-body">
                                    <p class="card-text"> {{$products[$j]->passage}} </p>
                                </div>
                                <div class="card-footer">
                                    <a href="#" class="btn btn-primary blue">{{$products[$j]->button_name}}</a>
                                    <p>{{$products[$j]->price}} تومان</p>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        @endfor
    @if (count($products) > $section->cols) </div> @endif
</div>
