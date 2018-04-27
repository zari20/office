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
    <div class="text-left">
        <a href="#" class="text-green none"> <i class="fa fa-edit ml-1"></i> ویرایش </a>
    </div>

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
    @if (!count(array_filter($reserve->services())))
        <div class="alert alert-danger">
            @admin
                این شخص هیچ خدماتی انتخاب نکرده است.
            @else
                شما هیچ خدماتی انتخاب نکرده اید.
            @endadmin
        </div>
        <div class="text-left">
            <a href="#"> <i class="fa fa-plus ml-1"></i> اضافه کردن خدمات </a>
        </div>
    @endif
    @foreach ($reserve->services() as $type => $service)
        @if ($service)
            <div class="card bg-light mb-3">
                <div class="card-header">{{translate($type)}}</div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h6 class="card-title"> نام : {{$service->mother->name}} </h6>
                        </div>
                        <div class="col-md-4">
                            <h6 class="card-title"> فی : {{toman($service->mother->cost)}} </h6>
                        </div>
                        <div class="col-md-4">
                            <h6 class="card-title"> تعداد : {{$service->count}} </h6>
                        </div>
                    </div>
                    <hr>
                    <p class="card-text">{{$service->mother->description ?? '[بدون توضیحات]'}}</p>
                </div>
                <div class="card-footer text-left">
                    هزینه نهایی : {{toman($service->cost)}}
                </div>
            </div>
        @endif
    @endforeach

    <hr>
    <p class="lead text-blue dinar my-3"> اطلاعات تسویه حساب مشترکین خدمات رزرواسیون :  </p>
    <div class="direct-x">
        <table class="table table-bordered table-hover table-striped text-center">
            <thead>
                <tr>
                    <th> شماره کارت </th>
                    <th> نام صاحب حساب </th>
                    <th> شماره شبا  </th>
                    <th> اطلاعات بانک </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td dir="ltr"> {{$reserve->payment->card_number ?? '-'}} </td>
                    <td> {{$reserve->payment->owner_name ?? '-'}} </td>
                    <td> {{$reserve->payment->shaba ?? '-'}} </td>
                    <td>
                        بانک
                        {{$reserve->payment->bank_name ?? '-'}}
                        شعبه
                        {{$reserve->payment->bank_branch ?? '-'}}
                        کد
                        {{$reserve->payment->bank_code ?? '-'}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="text-left">
        <a href="#" class="text-green none"> <i class="fa fa-edit ml-1"></i> ویرایش </a>
    </div>

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
    <button type="button" class="btn mx-1 btn-info"> <i class="fa fa-cogs ml-1"></i> مدیریت </button>
    <button type="button" class="btn mx-1 btn-success"> <i class="fa fa-edit ml-1"></i> ویرایش </button>
    <button type="button" class="btn mx-1 btn-danger"> <i class="fa fa-thumbs-down ml-1"></i> لغو رزرو </button>
@endsection
