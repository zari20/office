<section class="introduction about">
    <div class="container">
        <div class="row">
            @if ($tab->title)
                <div class="layout-title">
                    <h4>{{$tab->title}}</h4>
                </div>
            @endif
            <div class="tabs">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    @foreach ($tab->sections as $i => $section)
                        <li class="nav-item">
                            <a class="nav-link {{ $i==0 ? 'active' : '' }}" id="{{$tab->id}}-{{$i}}-tab" data-toggle="pill" href="#{{$tab->id}}-{{$i}}" role="tab">
                                {{$section->title}}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    @foreach ($tab->sections as $i => $section)
                        <div class="tab-pane fade show {{ $i==0 ? 'active' : '' }}" id="{{$tab->id}}-{{$i}}" role="tabpanel">
                            @if(false) <div id="slider-{{$section->id}}" class="carousel slide" data-ride="carousel"> @endif
                                @if ( false )
                                    <ol class="carousel-indicators">
                                        @for ($i=0; $i <= carousel_indicators(null); $i++)
                                            <li data-target="#slider-{{$section->id}}" data-slide-to="{{$i}}" {!! $i==0 ? 'class="active"' : '' !!}></li>
                                        @endfor
                                    </ol>
                                @endif
                                @if(false) <div class="carousel-inner"> @endif
                                    @for ($i=0; $i <= 0; $i++)
                                        <div class="carousel-item {!! $i==0 ? 'active' : '' !!}">
                                            @if ($section->type == 'blog')
                                                @include('welcome.index.blog',[ 'blog' => $section->fragments()[$i] ])
                                            @else
                                                @include('welcome.index.'.$section->type,compact('section'))
                                            @endif
                                        </div>
                                    @endfor
                                @if(false) </div> @endif
                            @if(false) </div> @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
