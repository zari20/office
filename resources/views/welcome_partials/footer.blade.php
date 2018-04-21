<footer class="footer-wrapper">
    <div class="container">
        <div class="footer">
            <div class="col-lg-9 col-md-9 col-sm-12">
                <h3>{{$footer->title ?? ''}}</h3>
                <p>{{$footer->passage ?? ''}}</p>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <h3> {{$footer->links_title}} </h3>
                <ul>
                    @if (isset($footer->links) && count($footer->links))
                        @foreach ($footer->links as $key => $link)
                            <li><a href="{{$link->href}}">{{$link->name}}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <div class="copyright">
            <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                <p class="copy">&copy; {{$footer->copy_right ?? ''}}</p>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
                <p class="royan">{{$footer->quote}}</p>
            </div>
        </div>
    </div>
</footer>
