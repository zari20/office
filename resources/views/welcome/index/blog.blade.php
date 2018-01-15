<div class="row">
    <div class="col-xl-7 col-lg-7 col-md-7 col-xs-12">
        <h4><a href="#"> {{$blog->title}} </a></h4>
        <p> {!! nl2br($blog->passage) !!} </p>
    </div>
    <div class="col-xl-5 col-lg-5 col-md-5 col-xs-12">
        <img class="img-fluid" src="welcome/{{$blog->picture_path}}" alt="{{$blog->title}}">
    </div>
</div>
