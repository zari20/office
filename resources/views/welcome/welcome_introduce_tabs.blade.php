<p class="h3 dinar text-info">  مدیریت تب های {{$words->introduce}} </p>
    <div class="row p-3">

        <form class="col-sm-4" action="{{url('/welcome_page/introduce_tab')}}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="">
                <p class="h5 mt-3">
                    <a class="cloner pointer">
                        تب
                        <i class="fa fa-plus text-info mt-1 mr-2"></i>
                    </a>
                </p>
            </div>


            <div class="clone-box">
                @foreach ($tabs as $key => $tab)
                    <div class="row to-be-cloned">
                        <fieldset class="form-group col-md-1 p-3 text-center">
                            <a class="delete-cloned pointer"><i class="fa fa-trash fa-2x mt-4 text-danger"></i></a>
                        </fieldset>
                        <fieldset class="form-group col-md-3 p-3">
                            <label> شماره تب </label>
                            <input name="number[]" value="{{$tab->number}}" type="text" class="form-control">
                        </fieldset>
                        <fieldset class="form-group col-md-8 p-3">
                            <label> عنوان تب </label>
                            <input name="title[]" value="{{$tab->title}}" type="text" class="form-control">
                        </fieldset>
                    </div>
                @endforeach
            </div>
            <div class="row mt-4">
                <div class="col-md-5"></div>
                <button type="submit" class="btn btn-primary form-control col-md-2"> تایید </button>
            </div>
        </form>

        {{-- ---------------------------------------------- --}}

        <form class="col-sm-8" style="border-right: 2px solid grey" action="{{url('/welcome_page/introduce_blog')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="">
                <p class="h5 mt-3">
                    <a class="cloner-2 pointer">
                        مطلب
                        <i class="fa fa-plus text-info mt-1 mr-2"></i>
                    </a>
                </p>
            </div>


            <div class="clone-box-2">
                @foreach ($blogs as $key => $blog)
                    <div class="row to-be-cloned-2">
                        <fieldset class="form-group col-md-1 p-3 text-center">
                            <a class="delete-cloned-2 pointer"><i class="fa fa-trash fa-2x mt-4 text-danger"></i></a>
                        </fieldset>
                        <fieldset class="form-group col-md-4 p-3">
                            <label> عنوان مطلب </label>
                            <input name="title[]" value="{{$blog->title}}" type="text" class="form-control">
                        </fieldset>
                        <fieldset class="form-group col-md-2 p-3">
                            <label> شماره تب </label>
                            <input name="tab_number[]" value="{{$blog->tab_number}}" type="text" class="form-control">
                        </fieldset>
                        <fieldset class="form-group col-md-2 p-3">
                            <label> شماره مطلب </label>
                            <input name="number[]" value="{{$blog->number}}" type="text" class="form-control">
                        </fieldset>
                        <fieldset class="form-group col-md-3 p-3">
                            <label> تصویر مطلب <span dir="ltr">528*297</span> </label>
                            <input name="picture[]" type="file" class="custome-form-control">
                        </fieldset>
                        <fieldset class="col-12">
                            <textarea name="passage[]" rows="2" class="form-control">{{$blog->passage}}</textarea>
                        </fieldset>
                        <hr class="col-12">
                    </div>
                @endforeach
            </div>
            <div class="row mt-4">
                <div class="col-md-5"></div>
                <button type="submit" class="btn btn-primary form-control col-md-2"> تایید </button>
            </div>
        </form>

    </div>


</form>
