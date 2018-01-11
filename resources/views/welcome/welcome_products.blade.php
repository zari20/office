<p class="h3 dinar text-info">  مدیریت محصول ها </p>
<form class="p-3" action="{{url('/welcome_page/products')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="">
        <p class="h5 mt-3">
            <a class="cloner pointer">
                محصول
                <i class="fa fa-plus text-info mt-1 mr-2"></i>
            </a>
        </p>
    </div>


    <div class="clone-box">
        @foreach ($products as $key => $product)
            <div class="row to-be-cloned">
                <fieldset class="form-group col-md-1 p-3 text-center">
                    <a class="delete-cloned pointer"><i class="fa fa-trash fa-2x mt-4 text-danger"></i></a>
                </fieldset>
                <fieldset class="form-group col-md-1 p-3 text-center">
                    <label> شماره </label>
                    <input name="number[]" value="{{$product->number}}" type="text" class="form-control">
                </fieldset>
                <fieldset class="form-group col-md-2 p-3">
                    <label> عنوان </label>
                    <input name="title[]" value="{{$product->title}}" type="text" class="form-control">
                </fieldset>
                <fieldset class="form-group col-md-2 p-3">
                    <label> قیمت </label>
                    <input name="price[]" value="{{$product->price}}" type="text" class="form-control">
                </fieldset>
                <fieldset class="form-group col-md-4 p-3">
                    <label> متن </label>
                    <input name="body[]" value="{{$product->body}}" type="text" class="form-control">
                </fieldset>
                <fieldset class="form-group col-md-2 p-3">
                    <label> تصویر </label>
                    <input name="picture[]" type="file" class="form-control-file">
                </fieldset>
            </div>
        @endforeach
    </div>


    <div class="row">
        <div class="col-md-5"></div>
        <button type="submit" class="btn btn-primary form-control col-md-2"> تایید </button>
    </div>
</form>
