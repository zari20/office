<div class="row text-center">

    <div class="col-md-4">
        <h4 class="text-green dinar mb-4"> <i class="fa fa-bank ml-1"></i> رزرو سالن </h4>
        <a href="{{url("reserves/create")}}" class="btn d-md-inline-block d-block my-1 btn-success"> <i class="fa fa-bookmark ml-1"></i> رزرو سالن </a>
        <a href="{{url("reserves")}}" class="btn d-md-inline-block d-block my-1 btn-info"> <i class="fa fa-list ml-1"></i> مشاهده لیست رزرو ها </a>
    </div>

    <div class="col-md-4">
        <h4 class="text-green dinar mb-4"> <i class="fa fa-users ml-1"></i> مدیریت حساب کاربری </h4>
        <a href="{{url("users/".auth()->id())}}" class="btn d-md-inline-block d-block my-1 btn-info"> <i class="fa fa-user ml-1"></i> تغییر مشخصات </a>
        <a href="{{url("change_password".auth()->id())}}" class="btn d-md-inline-block d-block my-1 btn-warning"> <i class="fa fa-lock ml-1"></i> تغییر رمز عبور </a>
    </div>

</div>
