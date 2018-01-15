<div id="blogs-{{$section->id}}" class="carousel slide" data-ride="carousel">
    @if (count($section->fragments()) > 1)
        <ol class="carousel-indicators">
            @foreach ($section->fragments() as $key => $blog)
                <li data-target="#blogs-{{$section->id}}" data-slide-to="{{$key}}" {!!$key==0 ? 'class="active"' : ''!!}></li>
            @endforeach
        </ol>
    @endif
    @if (count($section->fragments()) > 1) <div class="carousel-inner"> @endif
        @foreach ($section->fragments() as $key => $blog)
            <div class="carousel-item {{$key==0 ? 'active' : ''}}">
                <div class="row">
                    <div class="col-xl-7 col-lg-7 col-md-7 col-xs-12">
                        <h4><a href="#"> {{$blog->title}} </a></h4>
                        <p> {!! nl2br($blog->passage) !!} </p>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-5 col-xs-12">
                        <img class="img-fluid" src="welcome/{{$blog->picture_path}}" alt="{{$blog->title}}">
                    </div>
                </div>
            </div>
        @endforeach
    @if (count($section->fragments()) > 1) </div> @endif
</div>
