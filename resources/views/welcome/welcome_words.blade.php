<p class="h3 dinar text-blue">  مدیریت کلمات </p>
<form class="p-3" action="{{url('/welcome_page/words')}}" method="post">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <hr>
    <p class="text-blue h5 dinar text-center mb-4">کلمات هدر</p>
    <div class="row">
        <div class="form-group col-md-3">
            <label class="text-primary" for="co"> لینک هدر </label>
            <input type="text" class="form-control" id="co" name="co" value="{{$words->co}}">
        </div>
        <div class="form-group col-md-3">
            <label class="text-primary" for="other"> سایر </label>
            <input type="text" class="form-control" id="other" name="other" value="{{$words->other}}">
        </div>
        <div class="form-group col-md-3">
            <label class="text-primary" for="product"> کلمه محصول </label>
            <input type="text" class="form-control" id="product" name="product" value="{{$words->product}}">
        </div>
        <div class="form-group col-md-3">
            <label class="text-primary" for="search"> کلمه جستجو </label>
            <input type="text" class="form-control" id="search" name="search" value="{{$words->search}}">
        </div>
    </div>

    <hr>
    <p class="text-blue h5 dinar text-center mb-4">سایر کلمات</p>
    <div class="row">
        <div class="form-group col-md-3">
            <label class="text-primary" for="online"> کلمه چت باکس </label>
            <input type="text" class="form-control" id="online" name="online" value="{{$words->online}}">
        </div>
        <div class="form-group col-md-3">
            <label class="text-primary" for="introduce"> عنوان سکشن تب دار </label>
            <input type="text" class="form-control" id="introduce" name="introduce" value="{{$words->introduce}}">
        </div>
        <div class="form-group col-md-3">
            <label class="text-primary" for="about_us"> سکشن در باره ما </label>
            <input type="text" class="form-control" id="about_us" name="about_us" value="{{$words->about_us}}">
        </div>
        <div class="form-group col-md-3">
            <label class="text-primary" for="our_team"> تب اول سکشن در باره ما </label>
            <input type="text" class="form-control" id="our_team" name="our_team" value="{{$words->our_team}}">
        </div>
        <div class="form-group col-md-3">
            <label class="text-primary" for="our_services"> تب دوم سکشن در باره ما </label>
            <input type="text" class="form-control" id="our_services" name="our_services" value="{{$words->our_services}}">
        </div>
        <div class="form-group col-md-3">
            <label class="text-primary" for="our_projects"> تب سوم سکشن در باره ما </label>
            <input type="text" class="form-control" id="our_projects" name="our_projects" value="{{$words->our_projects}}">
        </div>
        <div class="form-group col-md-3">
            <label class="text-primary" for="our_departments"> تب چهارم سکشن در باره ما </label>
            <input type="text" class="form-control" id="our_departments" name="our_departments" value="{{$words->our_departments}}">
        </div>
        <div class="form-group col-md-3">
            <label class="text-primary" for="our_views"> تب پنجم سکشن در باره ما </label>
            <input type="text" class="form-control" id="our_views" name="our_views" value="{{$words->our_views}}">
        </div>
        <div class="form-group col-md-3">
            <label class="text-primary" for="our_branches"> تب ششم سکشن در باره ما </label>
            <input type="text" class="form-control" id="our_branches" name="our_branches" value="{{$words->our_branches}}">
        </div>
        <div class="form-group col-md-3">
            <label class="text-primary" for="contact_us"> سکشن تماس با ما </label>
            <input type="text" class="form-control" id="contact_us" name="contact_us" value="{{$words->contact_us}}">
        </div>
        <div class="form-group col-md-3">
            <label class="text-primary" for="contact_information"> عنوان توضیحات تماس </label>
            <input type="text" class="form-control" id="contact_information" name="contact_information" value="{{$words->contact_information}}">
        </div>
        <div class="form-group col-md-3">
            <label class="text-primary" for="contact_main_branch"> عنوان تب ارتباط با شعبه اصلی </label>
            <input type="text" class="form-control" id="contact_main_branch" name="contact_main_branch" value="{{$words->contact_main_branch}}">
        </div>
        <div class="form-group col-md-3">
            <label class="text-primary" for="contact_branches"> عنوان تب ارتباط با شعب </label>
            <input type="text" class="form-control" id="contact_branches" name="contact_branches" value="{{$words->contact_branches}}">
        </div>
        <div class="form-group col-md-3">
            <label class="text-primary" for="contact_us_form"> عنوان تب فرم ارتباط با ما </label>
            <input type="text" class="form-control" id="contact_us_form" name="contact_us_form" value="{{$words->contact_us_form}}">
        </div>
        <div class="form-group col-md-3">
            <label class="text-primary" for="present"> عنوان سکشن پرزنت </label>
            <input type="text" class="form-control" id="present" name="present" value="{{$words->present}}">
        </div>
        <div class="form-group col-md-3">
            <label class="text-primary" for="catalogs"> عنوان تب اول پرزنت </label>
            <input type="text" class="form-control" id="catalogs" name="catalogs" value="{{$words->catalogs}}">
        </div>
        <div class="form-group col-md-3">
            <label class="text-primary" for="videos"> عنوان تب دوم پرزن </label>
            <input type="text" class="form-control" id="videos" name="videos" value="{{$words->videos}}">
        </div>
        <div class="form-group col-md-3">
            <label class="text-primary" for="latest_products"> عنوان سکشن محصولات </label>
            <input type="text" class="form-control" id="latest_products" name="latest_products" value="{{$words->latest_products}}">
        </div>
        <div class="form-group col-md-3">
            <label class="text-primary" for="buy"> کلمه خرید </label>
            <input type="text" class="form-control" id="buy" name="buy" value="{{$words->buy}}">
        </div>
    </div>


    <hr>
    <p class="text-blue h5 dinar text-center mb-4">کلمات فوتر</p>
    <div class="row">
        <div class="form-group col-md-6">
            <label class="text-primary" for="related_links"> عنوان لینک های فوتر </label>
            <input type="text" class="form-control" id="related_links" name="related_links" value="{{$words->related_links}}">
        </div>
        <div class="form-group col-md-6">
            <label class="text-primary" for="footer_owner"> مالک یا طراح </label>
            <input type="text" class="form-control" id="footer_owner" name="footer_owner" value="{{$words->footer_owner}}">
        </div>
    </div>


    <div class="row">
        <div class="col-md-5"></div>
        <button type="submit" class="btn btn-primary form-control col-md-2"> تایید </button>
    </div>
</form>
