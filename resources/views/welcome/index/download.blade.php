<div class="row">
    @foreach ($section->fragments() as $key => $download)
        <div class="col-md-{{calculate_cols($section->cols)}} col-sm-12 text-center">
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
