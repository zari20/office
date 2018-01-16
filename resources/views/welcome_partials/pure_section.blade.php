@if(!isset($tab))
    <div class="text-center py-3 col-12">
        <img src="welcome_images/five_col.png" id="section-img">
    </div>
    <hr class="col-12">
@endif

<div class="clone-box col-12">
    @foreach ( $sections as $key => $section)
        <div class="to-be-cloned col-12 row">
            <div class="form-group col-md-{{$array ? '4' : '3'}}">
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
                    <option value="card" {{$section->type=='card' ? 'selected' : ''}}> آگهی </option>
                </select>
            </div>
            <div class="form-group section-title col-md-{{$array ? '4' : '3'}}">
                <label for="title">عنوان</label>
                <input type="text" class="form-control" id="title" name="title{{$array ? '[]' : ''}}" value="{{$section->title}}">
            </div>
            <div class="form-group section-title col-md-{{$array ? '4' : '3'}}">
                <label for="cols">تعداد ستون</label>
                <select class="form-control" id="cols" name="cols{{$array ? '[]' : ''}}">
                    <option value="1" {{$section->cols == 1 ? 'selected' : ''}}> 1 </option>
                    <option value="2" {{$section->cols == 2 ? 'selected' : ''}}> 2 </option>
                    <option value="3" {{$section->cols == 3 ? 'selected' : ''}}> 3 </option>
                    <option value="4" {{$section->cols == 4 || !$section->cols ? 'selected' : ''}}> 4 </option>
                    <option value="5" {{$section->cols == 5 ? 'selected' : ''}}> 5 </option>
                    <option value="6" {{$section->cols == 6 ? 'selected' : ''}}> 6 </option>
                </select>
            </div>
            @if (!$array)
                <div class="form-group col-md-3">
                    <label for="latin_id">آیدی (لاتین)</label>
                    <input type="text" class="form-control" id="latin_id" name="latin_id{{$array ? '[]' : ''}}" lang="en" dir="ltr">
                </div>
            @endif
        </div>
    @endforeach
</div>
