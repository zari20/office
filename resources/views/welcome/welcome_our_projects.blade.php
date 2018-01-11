<p class="h3 dinar text-info">  {{$words->our_projects}} </p>
<form class="p-3" action="{{url('/welcome_page/our_projects')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="">
        <p class="h5 mt-3">
            <a class="cloner pointer">
                {{$words->our_projects}}
                <i class="fa fa-plus text-info mt-1 mr-2"></i>
            </a>
        </p>
    </div>


    <div class="clone-box">
        @foreach ($projects as $key => $project)
            <div class="row to-be-cloned">
                <fieldset class="form-group col-md-1 p-3 text-center">
                    <a class="delete-cloned pointer"><i class="fa fa-trash fa-2x mt-4 text-danger"></i></a>
                </fieldset>
                <fieldset class="form-group col-md-1 p-3 text-center">
                    <label> شماره </label>
                    <input name="number[]" value="{{$project->number}}" type="text" class="form-control">
                </fieldset>
                <fieldset class="form-group col-md-2 p-3">
                    <label> عنوان </label>
                    <input name="title[]" value="{{$project->title}}" type="text" class="form-control">
                </fieldset>
                <fieldset class="form-group col-md-6 p-3">
                    <label> متن </label>
                    <input name="body[]" value="{{$project->body}}" type="text" class="form-control">
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
