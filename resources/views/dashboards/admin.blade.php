<h4 class="text-green dinar mb-4"> <i class="fa fa-cogs ml-1"></i> مدیریت سرویس ها </h4>
<div class="text-center">
    @php
        $icons = ['hotel','coffee','film','gamepad','headphones'];
    @endphp
    @foreach (services() as $key => $service)
        <div class="col5">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-header text-center"> <i class="fa fa-{{$icons[$key]}} ml-1"></i> {{translate($service)}}</div>
                <div class="card-body">
                    <a href="{{url("services/index/".$service)}}" class="btn btn-block text-light white-shadow bg-blue-no-hover"> <i class="fa fa-eye ml-1"></i> مشاهد همه </a>
                    <a href="{{url("services/create/".$service)}}" class="btn btn-block text-light white-shadow bg-green"> <i class="fa fa-plus ml-1"></i> تعریف مورد جدید </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<hr>

<div class="row text-center">

    <div class="col-md-6 my-3">
        <h4 class="text-green dinar mb-4"> <i class="fa fa-map-signs ml-1"></i> مدیریت سانس ها </h4>
        <div class="">
            <a href="{{url("/periods")}}" class="btn d-md-inline-block my-md-0 my-1 d-block btn-info"> <i class="fa fa-eye ml-1"></i> مشاهده همه </a>
            <a href="{{url("/periods/create")}}" class="btn d-md-inline-block my-md-0 my-1 d-block btn-success"> <i class="fa fa-plus ml-1"></i> تعریف سانس جدید </a>
        </div>
    </div>

    <div class="col-md-6 my-3">
        <h4 class="text-green dinar mb-4"> <i class="fa fa-percent ml-1"></i> مدیریت کدهای تخفیف </h4>
        <div class="">
            <a href="{{url("/discounts")}}" class="btn d-md-inline-block my-md-0 my-1 d-block btn-info"> <i class="fa fa-eye ml-1"></i> مشاهده همه </a>
            <a href="{{url("/discounts/create")}}" class="btn d-md-inline-block my-md-0 my-1 d-block btn-success"> <i class="fa fa-plus ml-1"></i> تعریف مورد جدید </a>
        </div>
    </div>
    <div class="col-md-3"></div>
    <div class="col-md-6 my-3">
        <h4 class="text-green dinar mb-4"> <i class="fa fa-flash ml-1"></i> مدیریت رزرو ها </h4>
        <div class="">
            <a href="{{url("/reserves")}}" class="btn d-md-inline-block my-md-0 my-1 d-block btn-info"> <i class="fa fa-eye ml-1"></i> مشاهده همه </a>
            <a href="{{url("/bookings")}}" class="btn d-md-inline-block my-md-0 my-1 d-block btn-warning"> <i class="fa fa-calendar ml-1"></i> مدیریت تقویم </a>
            <a href="{{url("/bookings/create")}}" class="btn d-md-inline-block my-md-0 my-1 d-block btn-danger"> <i class="fa fa-bookmark ml-1"></i> اشغال سانس </a>
        </div>
    </div>
</div>
