<div class="text-center">
    @foreach ($section->snippets as $key => $snippet)
        @if ($model == 1524)
            <figure class="snip1524">
                <img src="welcome/{{$snippet->picture_path}}" alt="{{$snippet->header}}" />
                <figcaption>
                    <h2>{{$snippet->header}}</h2>
                    <p>{{$snippet->body}}</p>
                </figcaption>
                <a @if($snippet->link) href="{{$snippet->link}}" @else data-toggle="modal" data-target="#lightbox{{$snippet->id}}" @endif >{{$snippet->button}}</a>
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
                <i class="{{$snippet->icon}}"></i>
                <a @if($snippet->link) href="{{$snippet->link}}" @else data-toggle="modal" data-target="#lightbox{{$snippet->id}}" @endif >{{$snippet->button}}</a>
            </figure>
        @endif
        @if ($model == 1576)
            <figure class="snip1576">
                <img src="welcome/{{$snippet->picture_path}}" alt="{{$snippet->header}}" />
                <figcaption>
                    <h3>{{$snippet->body}} <span>{{$snippet->header}}</span></h3>
                </figcaption>
                <a @if($snippet->link) href="{{$snippet->link}}" @else data-toggle="modal" data-target="#lightbox{{$snippet->id}}" @endif >{{$snippet->button}}</a>
            </figure>
        @endif
        @if ($model == 1554)
            <figure class="snip1554">
                <img src="welcome/{{$snippet->picture_path}}" alt="{{$snippet->header}}" />
                <figcaption>
                    <h3>{{$snippet->header}}</h3>
                </figcaption>
                <a @if($snippet->link) href="{{$snippet->link}}" @else data-toggle="modal" data-target="#lightbox{{$snippet->id}}" @endif >{{$snippet->button}}</a>
            </figure>
        @endif
        @if ($model == 1557)
            <figure class="snip1557">
                <img src="welcome/{{$snippet->picture_path}}" alt="{{$snippet->header}}" />
                <i class="{{$snippet->icon}}"></i>
                <h3>{{$snippet->header}}</h3>
                <a @if($snippet->link) href="{{$snippet->link}}" @else data-toggle="modal" data-target="#lightbox{{$snippet->id}}" @endif >{{$snippet->button}}</a>
            </figure>
        @endif
        @if ($model == 1561)
            <figure class="snip1561">
                <img src="welcome/{{$snippet->picture_path}}" alt="{{$snippet->header}}" />
                <a @if($snippet->link) href="{{$snippet->link}}" @else data-toggle="modal" data-target="#lightbox{{$snippet->id}}" @endif >{{$snippet->button}}</a>
            </figure>
        @endif
        @if ($model == 1581)
            <figure class="snip1581">
                <img src="welcome/{{$snippet->picture_path}}" alt="{{$snippet->header}}" />
                <figcaption>
                    {{-- <h3 class="title1"></h3> --}}
                    <h3 class="title2">{{$snippet->header}}</h3>
                    <h3 class="title3">{{$snippet->body}}</h3>
                </figcaption>
                <a @if($snippet->link) href="{{$snippet->link}}" @else data-toggle="modal" data-target="#lightbox{{$snippet->id}}" @endif >{{$snippet->button}}</a>
            </figure>
        @endif

        <div class="modal fade" id="lightbox{{$snippet->id}}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-full" role="document">
                <div class="modal-content bg-dark text-white">
                    <div class="modal-header">
                        <h5 class="modal-title">{{$snippet->header}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span class="text-white">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="welcome/{{$snippet->picture_path}}" alt="{{$snippet->header}}" />
                    </div>
                </div>
            </div>
        </div>

    @endforeach
</div>
