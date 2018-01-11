<div class="text-center py-3 col-12">
    <img src="welcome_images/five_col.png" id="section-img">
</div>
<hr class="col-12">

<div class="clone-box col-12">
    <div class="to-be-cloned col-12 row">
        <div class="form-group col-md-{{$array ? '6' : '4'}}">
            <label> نوع بخش </label>
            <select class="form-control section-type" name="type{{$array ? '[]' : ''}}" onchange="changeSectionPhoto($(this).find(':selected').val())">
                <option value="five_col">5 ستونه</option>
                <option value="slider">اسلایدر</option>
                <option value="blog">بلاگ</option>
                <option value="image">عکس چهارتایی</option>
                <option value="image_cadr">عکس چهارتایی با کادر</option>
                <option value="download">دانلود فایل 4 ستونه</option>
                <option value="product">محصول چهارتایی</option>
                <option value="link">لینک چهارتایی</option>
            </select>
        </div>
        <div class="form-group section-title col-md-{{$array ? '6' : '4'}}">
            <label for="title">عنوان</label>
            <input type="text" class="form-control" id="title" name="title{{$array ? '[]' : ''}}">
        </div>
        @if (!$array)
            <div class="form-group col-md-4">
                <label for="latin_id">آیدی (لاتین)</label>
                <input type="text" class="form-control" id="latin_id" name="latin_id{{$array ? '[]' : ''}}" lang="en" dir="ltr">
            </div>
        @endif
    </div>
</div>
