<section class="category">
    @if($layout->container) <div class="container"> @endif
        <div class="row mb-3">
            @foreach ($section->fragments() as $key => $card)
                <div class="col-md-{{calculate_cols($section->cols)}} my-1 p-1">
                    <div class="card">
                        <a href="{{$card->link}}">
                            <img class="card-img-top" src="{{asset('welcome/'.$card->picture_path)}}" alt="{{$card->title}}">
                        </a>
                        <div class="card-block p-3 relative">
                            <h4 class="card-title">{{$card->title}}</h4>
                            <p class="card-text"> {{$card->passage}} </p>
                            <span class="photo-sticker"> {{$card->picture_sticker}} </span>
                            <div class="card-footer bg-white p-0 pt-2">
                                <span class="d-inline-block mt-1">
                                    <i class="fa fa-{{$card->icon}} ml-1"></i>
                                    {{$card->word}}
                                </span>
                                <span class="text-sticker"> {{$card->text_sticker}} </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @if($layout->container) </div> @endif
</section>
<hr>
