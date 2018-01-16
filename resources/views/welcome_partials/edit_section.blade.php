<p class="h2 mt-5 dinar text-info mr-5 mb-4"> <i class="fa fa-circle"></i> مدیریت بخش</p>
<form class="" action="{{url('welcome_sections/'.$section->id)}}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    @include('welcome_partials.pure_section',['sections'=>[$section], 'array'=>false, 'editable'=>true])
    <div class="row">
        <div class="col-md-5"></div>
        <div class="col-md-2"> <button type="submit" class="btn btn-primary"> ذخیره </button> </div>
    </div>
</form>
<hr>
