<div class="collapse show" id="collapseCourse" data-parent="#reserves-collapseable">
    <div class="alert alert-info text-right">
        <i class="fa fa-info-circle fa-2x ml-2"></i>
        در این قسمت اطلاعات دوره آموزشی یا کنفرانس خود را وارد کنید.
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label for="name"> <i class="fa fa-pencil ml-1"></i> نام دوره / کارگاه / کنفرانس / جلسه<i class="fa fa-asterisk text-danger"></i></label>
            <input type="text" class="form-control" id="name" name="course[name]" value="{{old('course')['name']}}" required placeholder="*الزامی">
        </div>
        <div class="form-group col-md-4">
            <label for="performer"> <i class="fa fa-male ml-1"></i> نام موسسه / فرد برگزار کننده <i class="fa fa-asterisk text-danger"></i></label>
            <input type="text" class="form-control" id="performer" name="course[performer]" value="{{old('course')['performer']}}" required placeholder="*الزامی">
        </div>
        <div class="form-group col-md-4">
            <label for="teachers"> <i class="fa fa-group ml-1"></i> نام و نام خانوادگی اساتید </label>
            <input type="text" class="form-control" id="teachers" name="course[teachers]" value="{{old('course')['teachers']}}">
        </div>
        <div class="form-group col-md-4">
            <label for="code"> <i class="fa fa-id-card ml-1"></i> شماره مجوز / شماره ملی </label>
            <input type="text" class="form-control" id="code" name="course[code]" value="{{old('course')['code']}}">
        </div>
        <div class="form-group col-md-4">
            <label for="document"> <i class="fa fa-bank ml-1"></i> مرجع صدور مجوز / مدرک استاد </label>
            <input type="text" class="form-control" id="document" name="course[document]" value="{{old('course')['document']}}">
        </div>
        <div class="form-group col-md-4">
            <label for="course-file"> <i class="fa fa-file ml-1"></i> پیوست مجوز / مدرک تحصیلی </label>
            <input type="file" class="form-control" id="course-file" name="course_file" >
            <small> <i class="fa fa-asterisk ml-1"></i> ماکسیمم 2 مگابایت </small>
        </div>
        <div class="form-group col-md-12">
            <label for="course-description"> <i class="fa fa-pencil ml-1"></i> توضیحات ضروری در مورد دوره / سمینار / جلسه </label>
            <textarea name="course[description]" id="course-description" class="form-control" rows="6">{{old('course')['description']}}</textarea>
        </div>

        @if (count($find_outs))
            <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <label for="find-out-id"> <i class="fa fa-handshake-o ml-1"></i> نحوه شنایی با ما </label>
                <select class="form-control" name="find_out_id" id="find-out-id">
                    <option value=""> انتخاب کنید </option>
                    @foreach ($find_outs as $key => $fo)
                        <option value="{{$fo->id}}"> {{$fo->title}} </option>
                    @endforeach
                </select>
            </div>
        @endif

    </div>
    <hr>
</div>
