<div class="row">
    @foreach ($section->fragments() as $key => $image)
        <div class="col-md-{{calculate_cols($section->cols)}} col-sm-12 text-center abo">
            <img src="welcome/{{$image->picture_path}}" alt="{{$image->title}}">
            <h3> {{$image->title}} </h3>
            <p> {{$image->passage}} </p>
        </div>
    @endforeach
</div>
