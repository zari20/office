<div class="collapse show" id="collapseNewUser" data-parent="#reserves-collapseable">
    <form class="row" action="{{url('new_user')}}" method="post">

        <div class="alert alert-info text-right col-12">
            <i class="fa fa-info-circle fa-2x ml-2"></i>
            برای رزرو سالن شما نیاز به ایجاد حساب کاربری دارید. در صورتی که قبلا حساب کاربری ایجاد کرده اید، از طریق
            <a href="{{url("reserve_logmein")}}"> این لینک </a>
            میتوانید وارد شوید.
        </div>

        @csrf
        <div class="form-group col-md-3">
            <label for="mobile"> <i class="fa fa-phone ml-1"></i> شماره همراه <i class="fa fa-asterisk text-danger"></i></label>
            <input type="text" class="form-control" id="mobile" name="mobile" value="{{old('mobile')}}" required placeholder="*الزامی">
        </div>
        <div class="form-group col-md-3">
            <label for="email"> <i class="fa fa-inbox ml-1"></i>  ایمیل </label>
            <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
        </div>
        <div class="form-group col-md-3">
            <label for="telephone"> <i class="fa fa-fax ml-1"></i> تلفن ثابت </label>
            <input type="text" class="form-control" id="telephone" name="telephone" value="{{old('telephone')}}">
        </div>
        <div class="form-group col-md-3">
            <label for="city_id"> <i class="fa fa-map ml-1"></i> شهر </label>
            <select id="city_id" class="select2" name="city_id">
                <option value=""></option>
                <option value="">-- هیچکدام --</option>
                @foreach (cities() as $key => $city)
                    <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="region"> <i class="fa fa-building ml-1"></i> منطقه شهری </label>
            <input type="text" class="form-control" id="region" name="region" value="{{old('region')}}">
        </div>
        <div class="form-group col-md-3">
            <label for="postal_code"> <i class="fa fa-envelope ml-1"></i> کدپستی </label>
            <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{old('postal_code')}}">
        </div>
        <div class="form-group col-md-3">
            <label for="password"> <i class="fa fa-key ml-1"></i> رمز عبور <i class="fa fa-asterisk text-danger"></i> </label>
            <input type="text" class="form-control" id="password" name="password" value="{{old('password')}}" required placeholder="*الزامی">
        </div>
        <div class="form-group col-md-3">
            <label for="password_confirmation"> <i class="fa fa-key ml-1"></i> تکرار رمز عبور <i class="fa fa-asterisk text-danger"></i></label>
            <input type="text" class="form-control" id="password_confirmation" name="password_confirmation" value="{{old('password_confirmation')}}" required placeholder="*الزامی">
        </div>
        <div class="form-group col-md-12">
            <label for="address"> <i class="fa fa-map-pin ml-1"></i> نشانی دقیق پستی </label>
            <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}">
        </div>

        @include('fragments.submit', ['text'=>'ایجاد حساب کاربری', 'icon'=>'user-plus'])

    </form>

</div>
