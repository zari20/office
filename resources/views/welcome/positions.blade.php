<form class="container my-4 text-center" action="{{url('welcome_positions')}}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    @foreach ($layouts as $key => $layout)
        <div class="card my-1">
            <div class="card-block p-2 bx-blue">
                <div class="row my-2">
                    <div class="col-md-2">
                        <span class="font-weight-bold dinar lead">{{welcome_translate(rw($layout->puzzle_type))}}</span>
                    </div>
                    <div class="col-md-2">
                        {{$layout->puzzle->title}}
                        ({{$layout->puzzle->latin_id}})
                    </div>
                    <div class="col-md-2">
                        <label class="custom-control custom-checkbox">
                            <input type="hidden" name="container{{$key}}" value="0">
                            <input type="checkbox" class="custom-control-input" name="container{{$key}}" @if($layout->container) checked @endif value="1">
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description">فاصله از چپ و راست</span>
                        </label>
                    </div>
                    <div class="col-md-2">
                        <label> ترتیب </label>
                        <input type="number" name="position[]" value="{{$layout->position}}" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label> فاصله از بالا </label>
                        <input type="number" name="margin_top[]" value="{{$layout->margin_top}}" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label> فاصله از پایین </label>
                        <input type="number" name="margin_bottom[]" value="{{$layout->margin_bottom}}" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="row mt-4">
        <div class="col-md-5"></div>
        <div class="col-md-2">
            <button type="submit" class="form-control btn btn-primary">تایید</button>
        </div>
    </div>
</form>
