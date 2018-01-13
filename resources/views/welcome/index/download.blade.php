<div class="row">
    @foreach ($section->fragments() as $key => $download)
        <div class="col-xl-3 col-lg-3 col-md-6 col-xs-12 text-center">
            <div class="catalog">
                <img src="welcome/{{$download->picture_path}}" alt="{{$download->title}}">
                <div class="title">
                    <a href="{{asset('welcome/'.$download->file_path)}}" download>دانلود</a>
                    <h3> {{$download->title}} </h3>
                </div>
                <p> {{$download->passage}} </p>
            </div>
        </div>
    @endforeach
</div>
