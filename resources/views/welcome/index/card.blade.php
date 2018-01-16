<section class="category">
    <div class="container">
        <div class="row mb-3">
            @foreach ($section->fragments() as $key => $card)
                <div class="col-md-3 my-1 p-1">
                    <div class="card">
                        <img class="card-img-top" src="{{asset('welcome/'.$card->picture_path)}}" alt="{{$card->title}}">
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
    </div>
</section>
<div class="text-center p-3">
    <a href="#" class="bg-second ml-4 p-3 text-white animated pulse">مشاهده همه <i class="fa fa-arrow-left mr-1"></i></a>
</div>
<hr>
