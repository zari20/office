@extends('layouts.app')
@section('content')

    <p class="lead text-blue dinar my-3"> اطلاعات دوره  </p>
    <div class="direct-x">
        <table class="table table-bordered table-hover table-striped text-center">
            <thead>
                <tr>
                    <th> نام دوره / کارگاه / کنفرانس </th>
                    <th> نام موسسه / فرد برگزار کننده </th>
                    <th> نام و نام خانوادگی اساتید  </th>
                    <th> شماره مجوز / شماره ملی  </th>
                    <th> مرجع صدور مجوز / مدرک استاد </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {{$reserve->course->name ?? '-'}} </td>
                    <td> {{$reserve->course->performer ?? '-'}} </td>
                    <td> {{$reserve->course->teachers ?? '-'}} </td>
                    <td> {{$reserve->course->code ?? '-'}} </td>
                    <td> {{$reserve->course->document ?? '-'}} </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="alert alert-info">
        {{$reserve->course->description ?? '[بدون توضیحات]'}}
    </div>
    <div class="alert alert-info">
        <strong> نحوه آشنایی : </strong> {{$reserve->find_out->title ?? '[نامشخص]'}}
    </div>
    {{-- <div class="text-left">
        <a href="#" class="text-green none"> <i class="fa fa-edit ml-1"></i> ویرایش </a>
    </div> --}}

    <hr>
    <p class="lead text-blue dinar my-3"> اطلاعات سالن </p>
    <div class="card bg-light mb-3">
        <div class="card-header">{{$reserve->schedule->room->name}}</div>
        <div class="card-body">
            <div class="row text-center">
                <div class="col-md-4">
                    <h6 class="card-title"> ظرفیت : {{$reserve->schedule->room->capacity}} </h6>
                </div>
                <div class="col-md-4">
                    <h6 class="card-title"> هزینه در هر ساعت : {{toman($reserve->schedule->room->cost_pre_hour)}} </h6>
                </div>
                <div class="col-md-4">
                    <h6 class="card-title"> مدت استفاده از سالن: {{$reserve->schedule->hours}} ساعت </h6>
                </div>
            </div>
            <hr>
            <p class="card-text">{{$reserve->schedule->room->description}}</p>
        </div>
        <div class="card-footer text-left">
            هزینه نهایی : {{toman($reserve->schedule->cost)}}
        </div>
    </div>


    <hr>
    <p class="lead text-blue dinar my-3"> سانس های رزرو شده :  </p>
    <div class="row">
        @foreach ($reserve->bookings as $key => $booking)
            <div class="col-md-4">
                <div class="card bg-light my-1">
                    <div class="card-body">
                        {{period_details($booking->period_id,$booking->date)}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <hr>
    <p class="lead text-blue dinar my-3"> خدمات انتخاب شده :  </p>
    @if ($reserve->no_service())
        <div class="alert alert-danger">
            @admin
                این شخص هیچ خدماتی انتخاب نکرده است.
            @else
                شما هیچ خدماتی انتخاب نکرده اید.
            @endadmin
        </div>
        {{-- <div class="text-left">
            <a href="#"> <i class="fa fa-plus ml-1"></i> اضافه کردن خدمات </a>
        </div> --}}
    @endif
    @foreach ($reserve->services_groups() as $type => $services)
        @if (count($services))
            <div class="card bg-light mb-3">
                <div class="card-header bg-info text-light">{{translate($type)}}</div>
                <div class="card-body">
                    <div class="direct-x">
                        <table class="table table-bordered table-hover table-striped text-center">
                            <thead>
                                <tr>
                                    <th> ردیف </th>
                                    <th> نام </th>
                                    <th> فی </th>
                                    <th> تعداد </th>
                                    <th> هزینه </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $key => $service)
                                    <tr>
                                        <td> {{$key+1}} </td>
                                        <td> {{$service->mother->name}} </td>
                                        <td> {{toman($service->mother->cost)}} </td>
                                        <td> {{$service->count}} </td>
                                        <td> {{toman($service->cost)}} </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-left">
                    مجموع هزینه ها : {{toman($services->sum('cost'))}}
                </div>
            </div>
        @endif

    @endforeach


    <hr>
    <p class="lead text-blue dinar my-3"> اطلاعات کلی رزرو </p>
    <div class="direct-x">
        <table class="table table-bordered table-hover table-striped text-center">
            <thead>
                <tr>
                    <th>مجموع کل هزینه ها</th>
                    <th>درصد تخفیف</th>
                    <th>قابل پرداخت</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{toman($reserve->total_cost)}}</td>
                    <td>{{$reserve->discount->percent ?? 0}}</td>
                    <td class="bg-yellow">
                        {{toman(discount($reserve->total_cost,$reserve->discount->percent ?? 0))}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <hr>
    <p class="lead text-blue dinar my-3"> عملیات :  </p>
    @if ($reserve->status==0)
    <form class="" action="{{url("reserves/pay/$reserve->id")}}" method="post">
        @csrf
        <button type="submit" class="btn mx-1 px-3 bg-blue"> <i class="fa fa-credit-card ml-1"></i> پرداخت آنلاین </button>
    </form>
    @endif
    {{-- <button type="button" class="btn mx-1 btn-danger"> <i class="fa fa-thumbs-down ml-1"></i> لغو رزرو </button> --}}
    {{-- <button type="button" class="btn mx-1 btn-info"> <i class="fa fa-cogs ml-1"></i> مدیریت </button>
    <button type="button" class="btn mx-1 btn-success"> <i class="fa fa-edit ml-1"></i> ویرایش </button> --}}
@endsection
