<div class="text-center">
    @foreach ($section->snippets as $key => $snippet)
        @if ($model == 1524)
            <figure class="snip1524">
                <img src="welcome/{{$snippet->picture_path}}" alt="{{$snippet->header}}" />
                <figcaption>
                    <h2>{{$snippet->header}}</h2>
                    <p>{{$snippet->body}}</p>
                </figcaption>
                <a href="{{$snippet->link}}">{{$snippet->button}}</a>
            </figure>
        @endif
        @if ($model == 1536)
            <figure class="snip1536">
                <img src="welcome/{{$snippet->picture_path}}" alt="{{$snippet->header}}" />
                <figcaption>
                    <p>{{$snippet->body}}</p>
                    <h3>{{$snippet->header}}</h3>
                </figcaption>
                <div class="hover"></div>
                <i class="fa fa-{{$snippet->icon}}"></i>
                <a href="{{$snippet->link}}">{{$snippet->button}}</a>
            </figure>
        @endif
        @if ($model == 1576)
            <figure class="snip1576">
                <img src="welcome/{{$snippet->picture_path}}" alt="{{$snippet->header}}" />
                <figcaption>
                    <h3>{{$snippet->body}} <span>{{$snippet->header}}</span></h3>
                </figcaption>
                <a href="{{$snippet->link}}">{{$snippet->button}}</a>
            </figure>
        @endif
        @if ($model == 1554)
            <figure class="snip1554">
                <img src="welcome/{{$snippet->picture_path}}" alt="{{$snippet->header}}" />
                <figcaption>
                    <h3>{{$snippet->header}}</h3>
                </figcaption>
                <a href="{{$snippet->link}}">{{$snippet->button}}</a>
            </figure>
        @endif
        @if ($model == 1557)
            <figure class="snip1557">
                <img src="welcome/{{$snippet->picture_path}}" alt="{{$snippet->header}}" />
                <i class="fa fa-{{$snippet->icon}}"></i>
                <h3>{{$snippet->header}}</h3>
                <a href="{{$snippet->link}}">{{$snippet->button}}</a>
            </figure>
        @endif
        @if ($model == 1561)
            <figure class="snip1561">
                <img src="welcome/{{$snippet->picture_path}}" alt="{{$snippet->header}}" />
                <a href="{{$snippet->link}}">{{$snippet->button}}</a>
            </figure>
        @endif
    @endforeach
</div>
