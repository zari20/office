@if(!isset($tab) && !isset($editable))
    <div class="text-center py-3 col-12">
        <img src="welcome_images/five_col.png" id="section-img">
    </div>
    <hr class="col-12">
@endif

<div class=" @if(!isset($editable)) clone-box @endif col-12">
    @foreach ( $sections as $key => $section)
        <div class="@if(!isset($editable)) to-be-cloned @endif col-12 row">
            @if (!isset($editable))
                <div class="form-group col-md-{{$array ? '4' : '3'}}">
                    <label> نوع ماژول </label>
                    <select class="form-control section-type" name="type{{$array ? '[]' : ''}}" onchange="changeSectionPhoto($(this).find(':selected').val())">
                        <option value="five_col" {{$section->type=='five_col' ? 'selected' : ''}}> {{welcome_translate('five_col')}} </option>
                        <option value="slider" {{$section->type=='slider' ? 'selected' : ''}}> {{welcome_translate('slider')}} </option>
                        <option value="blog" {{$section->type=='blog' ? 'selected' : ''}}> {{welcome_translate('blog')}} </option>
                        <option value="image" {{$section->type=='image' ? 'selected' : ''}}> {{welcome_translate('image')}} </option>
                        <option value="image_cadr" {{$section->type=='image_cadr' ? 'selected' : ''}}> {{welcome_translate('image_cadr')}} </option>
                        <option value="download" {{$section->type=='download' ? 'selected' : ''}}> {{welcome_translate('download')}} </option>
                        <option value="product" {{$section->type=='product' ? 'selected' : ''}}> {{welcome_translate('product')}} </option>
                        <option value="link" {{$section->type=='link' ? 'selected' : ''}}> {{welcome_translate('link')}} </option>
                        <option value="card" {{$section->type=='card' ? 'selected' : ''}}>  {{welcome_translate('card')}}  </option>
                        @foreach ([1524,1536,1554,1557,1561,1576] as $number)
                            <option value="model{{$number}}" {{$section->type=='model'.$number ? 'selected' : ''}}>
                                {{welcome_translate('model'.$number)}}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif
            <div class="form-group section-title col-md-{{$array ? '4' : '3'}}">
                <label for="title">عنوان</label>
                <input type="text" class="form-control" id="title" name="title{{$array ? '[]' : ''}}" value="{{$section->title}}">
            </div>
            <div class="form-group section-cols col-md-{{$array ? '4' : '3'}}">
                <label for="cols">تعداد ستون</label>
                <select class="form-control" id="cols" name="cols{{$array ? '[]' : ''}}">
                    <option value="1" {{$section->cols == 1 ? 'selected' : ''}}> 1 </option>
                    <option value="2" {{$section->cols == 2 ? 'selected' : ''}}> 2 </option>
                    <option value="3" {{$section->cols == 3 ? 'selected' : ''}}> 3 </option>
                    <option value="4" {{$section->cols == 4 || !$section->cols ? 'selected' : ''}}> 4 </option>
                    <option value="6" {{$section->cols == 6 ? 'selected' : ''}}> 6 </option>
                </select>
            </div>
            @if (!$array)
                <div class="form-group col-md-3">
                    <label for="latin_id">آیدی (لاتین)</label>
                    <input type="text" class="form-control" id="latin_id" name="latin_id{{$array ? '[]' : ''}}" lang="en" dir="ltr"
                    value="{{$section->latin_id ?? ''}}">
                </div>
            @endif
        </div>
    @endforeach
</div>
