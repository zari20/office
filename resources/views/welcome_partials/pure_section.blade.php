@if(!isset($tab))
    <div class="text-center py-3 col-12">
        <img src="welcome_images/five_col.png" id="section-img">
    </div>
    <hr class="col-12">
@endif

<div class="clone-box col-12">
    @foreach ( $sections as $key => $section)
        <div class="to-be-cloned col-12 row">
            <div class="form-group col-md-{{$array ? '6' : '4'}}">
                <label> نوع ماژول </label>
                <select class="form-control section-type" name="type{{$array ? '[]' : ''}}" onchange="changeSectionPhoto($(this).find(':selected').val())">
                    <option value="five_col" {{$section->type=='five_col' ? 'selected' : ''}}>5 ستونه</option>
                    <option value="slider" {{$section->type=='slider' ? 'selected' : ''}}>اسلایدر</option>
                    <option value="blog" {{$section->type=='blog' ? 'selected' : ''}}>بلاگ</option>
                    <option value="image" {{$section->type=='image' ? 'selected' : ''}}>عکس چهارتایی</option>
                    <option value="image_cadr" {{$section->type=='image_cadr' ? 'selected' : ''}}>عکس چهارتایی با کادر</option>
                    <option value="download" {{$section->type=='download' ? 'selected' : ''}}>دانلود فایل 4 ستونه</option>
                    <option value="product" {{$section->type=='product' ? 'selected' : ''}}>محصول چهارتایی</option>
                    <option value="link" {{$section->type=='link' ? 'selected' : ''}}>لینک چهارتایی</option>
                </select>
            </div>
            <div class="form-group section-title col-md-{{$array ? '6' : '4'}}">
                <label for="title">عنوان</label>
                <input type="text" class="form-control" id="title" name="title{{$array ? '[]' : ''}}" value="{{$section->title}}">
            </div>
            @if (!$array)
                <div class="form-group col-md-4">
                    <label for="latin_id">آیدی (لاتین)</label>
                    <input type="text" class="form-control" id="latin_id" name="latin_id{{$array ? '[]' : ''}}" lang="en" dir="ltr">
                </div>
            @endif
        </div>
    @endforeach
</div>
