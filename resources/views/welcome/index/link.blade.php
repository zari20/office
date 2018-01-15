<div class="row mb-5 px-5">
    <div class="btnshop">
        @foreach ($section->fragments() as $key => $link)
            <div class="col-md-{{calculate_cols($section->cols)}} col-sm-12">
                <a href="{{$link->href}}"> {{$link->name}} </a>
            </div>
        @endforeach
    </div>
</div>
