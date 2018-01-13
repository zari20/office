<div class="row mb-5 px-5">
    <div class="btnshop">
        @foreach ($section->fragments() as $key => $link)
            <div class="col-xl-3 col-lg-3 col-md-6 col-xs-12">
                <a href="{{$link->href}}"> {{$link->name}} </a>
            </div>
        @endforeach
    </div>
</div>
