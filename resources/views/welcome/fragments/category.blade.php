<section class="category">
    <div id="filters" class="text-center mb-4">
        <button class="btn px-4 py-2 mx-1 bg-first text-white" data-filter="*">همه</button>
        <button class="btn px-4 py-2 mx-1 bg-first text-white" data-filter=".metal">metal</button>
        <button class="btn px-4 py-2 mx-1 bg-first text-white" data-filter=".rrr">rrr</button>
    </div>
    <div class="row mb-3 grid">
        @php
        $arr = [null,'rrr','metal','metal','rrr','metal','metal','rrr','rrr','metal','rrr','metal','metal']
        @endphp
        @for ($i=1; $i <= 12; $i++)
            <div class="col-md-3 element-item {{$arr[$i]}}" data-category="{{$arr[$i]}}">
                <div class="my-2">
                    <a href="#">
                        <img src="{{asset('welcome_images/c'.$i.'.jpg')}}" alt="" width="329" height="220">
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
</section>
<div class="text-left p-3">
    <a href="#" class="bg-second ml-4 p-3 text-white animated pulse">مشاهده همه <i class="fa fa-arrow-left mr-1"></i></a>
</div>
<hr>
