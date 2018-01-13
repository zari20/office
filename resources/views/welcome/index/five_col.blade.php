<section class="boxes">
    <div class="container">
        <div class="row">
            @foreach ($section->fragments() as $key => $col)
                <div class="box text-center">
                    <a href="{{$col->href}}">
                        <i class="fa fa-{{$col->icon}}" aria-hidden="true"></i>
                        <h3> {{$col->subject}} </h3>
                        <p> {{$col->info}} </p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
