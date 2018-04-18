<div class="collapse show" id="collapseCourse">
    <div class="row">
        <div class="form-group col-md-4">
            <label for="name"> <i class="fa fa-pencil ml-1"></i> نام دوره / کارگاه / کنفرانس <i class="fa fa-asterisk text-danger"></i></label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" required placeholder="*الزامی">
        </div>
        <div class="form-group col-md-4">
            <label for="teachers"> <i class="fa fa-group ml-1"></i> نام و نام خانوادگی اساتید <i class="fa fa-asterisk text-danger"></i></label>
            <input type="text" class="form-control" id="teachers" name="teachers" value="{{old('teachers')}}" required placeholder="*الزامی">
        </div>
        <div class="form-group col-md-4">
            <label for="performer"> <i class="fa fa-male ml-1"></i> نام موسسه / فرد برگزار کننده <i class="fa fa-asterisk text-danger"></i></label>
            <input type="text" class="form-control" id="performer" name="performer" value="{{old('performer')}}" required placeholder="*الزامی">
        </div>
        <div class="form-group col-md-4">
            <label for="code"> <i class="fa fa-id-card ml-1"></i> شماره مجوز / شماره ملی <i class="fa fa-asterisk text-danger"></i></label>
            <input type="text" class="form-control" id="code" name="code" value="{{old('code')}}" required placeholder="*الزامی">
        </div>
        <div class="form-group col-md-4">
            <label for="document"> <i class="fa fa-bank ml-1"></i> مرجع صدور مجوز / مدرک استاد <i class="fa fa-asterisk text-danger"></i></label>
            <input type="text" class="form-control" id="document" name="document" value="{{old('document')}}" required placeholder="*الزامی">
        </div>
        <div class="form-group col-md-4">
            <label for="file_path"> <i class="fa fa-file ml-1"></i> پیوست مجوز / مدرک تحصیلی <i class="fa fa-asterisk text-danger"></i></label>
            <input type="file" class="form-control" id="file_path" name="file_path" value="{{old('file_path')}}" required >
        </div>
    </div>
    <hr>
</div>
