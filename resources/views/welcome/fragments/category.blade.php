<section class="category">
    <div id="filters" class="text-center mb-4">
        <button class="btn px-4 py-2 mx-1 bg-first text-white" data-filter="*">همه</button>
        <button class="btn px-4 py-2 mx-1 bg-first text-white" data-filter=".metal">metal</button>
        <button class="btn px-4 py-2 mx-1 bg-first text-white" data-filter=".rrr">rrr</button>
    </div>
    <div class="container">
        <div class="row mb-3 mx-4 grid">
            @php
            $arr = [null,'rrr','metal','metal','rrr','metal','metal','rrr','rrr','metal','rrr','metal','metal']
            @endphp
            @for ($i=1; $i <= 12; $i++)
                <div class="col-md-3 element-item {{$arr[$i]}}" data-category="{{$arr[$i]}}">
                    <div class="my-1">
                        <a href="#">
                            <img src="{{asset('welcome_images/k'.$i.'.jpg')}}" alt="" width="256" height="217">
                            <p>
                                <span class="h2 dinar"> عنوان </span>
                                <br>
                                <span class="h6"> زیرعنوان زیرعنوان </span>
                            </p>
                        </a>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</section>
<div class="text-center p-3">
    <a href="#" class="bg-second ml-4 p-3 text-white animated pulse">مشاهده همه <i class="fa fa-arrow-left mr-1"></i></a>
</div>
<hr>
