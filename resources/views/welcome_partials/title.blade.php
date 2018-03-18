@unless($website->title_type)
    <div class="layout-title">
        <h2 class="my-4">{{$title}}</h2>
    </div>
@else
    <div class="text-center">
        <h2 class="snip{{$website->title_type}}">{{$title}}</h2>
    </div>
@endunless
