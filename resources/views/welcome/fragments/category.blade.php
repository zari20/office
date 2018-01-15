<section class="category">
    <div class="container">
        <div class="row mb-3">
            @for ($i=1; $i <= 12; $i++)
                <div class="col-md-3 my-1 p-1">
                    <div class="card">
                        <img class="card-img-top" src="{{asset('welcome_images/k'.$i.'.jpg')}}" alt="عنوان">
                        <div class="card-block p-3 relative">
                            <h4 class="card-title">عنوان</h4>
                            <p class="card-text"> توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات توضیحات </p>
                            <span class="photo-sticker"> Sticker </span>
                            <div class="card-footer bg-white p-0 pt-2">
                                <span class="d-inline-block mt-1">
                                    <i class="fa fa-map ml-1"></i>
                                    شهر
                                </span>
                                <span class="text-sticker"> ٪10 الی 15٪ </span>
                            </div>
                        </div>
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
