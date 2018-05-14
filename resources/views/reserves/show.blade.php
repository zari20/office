@extends('layouts.app')
@section('content')

    <p class="lead text-blue dinar my-3 jqprint"> اطلاعات دوره  </p>
    <div class="direct-x">
        <table class="table table-bordered table-hover table-striped text-center jqprint">
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

    <hr>
    <p class="lead text-blue dinar my-3"> اطلاعات سالن </p>
    <div class="card bg-light mb-3">
        <div class="card-header">{{$reserve->room->name}}</div>
        <div class="card-body">
            <div class="row text-center">
                <div class="col-md-4">
                    <h6 class="card-title"> ظرفیت : {{$reserve->room->capacity}} </h6>
                </div>
                <div class="col-md-4">
                    <h6 class="card-title"> هزینه در هر ساعت : {{toman($reserve->room->cost_pre_hour)}} </h6>
                </div>
                <div class="col-md-4">
                    <h6 class="card-title"> مدت استفاده از سالن: {{$reserve->hours()}} ساعت </h6>
                </div>
            </div>
            <hr>
            <p class="card-text">{{$reserve->room->description}}</p>
        </div>
        <div class="card-footer text-left">
            هزینه نهایی : {{toman($reserve->room_cost)}}
        </div>
    </div>


    <hr>
    <div class="jqprint">
        <p class="lead text-blue dinar my-3"> سانس های رزرو شده : ({{$reserve->room->name}}) </p>
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
    </div>

    <hr>
    <p class="lead text-blue dinar my-3 jqprint"> خدمات انتخاب شده :  </p>
    @if (count($reserve->services))
        <div class="card bg-light mb-3">
            <div class="card-header bg-info text-light">خدمات</div>
            <div class="card-body">
                <div class="direct-x">
                    <table class="table table-bordered table-hover table-striped text-center jqprint">
                        <thead>
                            <tr>
                                <th> ردیف </th>
                                <th> نوع </th>
                                <th> مدل </th>
                                <th> تعداد </th>
                                <th> هزینه </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reserve->services as $key => $service)
                                <tr>
                                    <td> {{$key+1}} </td>
                                    <td> {{$service->type_instance->title}} </td>
                                    <td> {{$service->model_instance->title}} </td>
                                    <td> {{$service->count}} </td>
                                    <td> {{toman($service->cost)}} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-left">
                مجموع هزینه ها : {{toman($reserve->services->sum('cost'))}}
            </div>
        </div>
    @else
        <div class="alert alert-danger jqprint">
            هیچ خدماتی انتخاب نشده است
        </div>
    @endif



    <hr>
    <p class="lead text-blue dinar my-3 jqprint"> اطلاعات کلی رزرو </p>
    <div class="direct-x">
        <table class="table table-bordered table-hover table-striped text-center jqprint">
            <thead>
                <tr>
                    <th>مجموع کل هزینه ها</th>
                    <th>درصد تخفیف</th>
                    <th>قابل پرداخت</th>
                    @if ($reserve->status==1)
                        <th> شناسه پرداخت </th>
                    @endif
                    <th> وضعیت </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{toman($reserve->total_cost)}}</td>
                    <td>{{$reserve->discount->percent ?? 0}}</td>
                    <td>{{toman(discount($reserve->total_cost,$reserve->discount->percent ?? 0))}}</td>
                    @if ($reserve->status==1)
                        <td> {{$reserve->zarin->uid ?? '?'}} </td>
                    @endif
                    <td class="bg-{{$reserve->status ? ( $reserve->status==1 ? 'success text-white' : 'danger text-white' ) : 'warning'  }}">
                        {{ $reserve->status ? ( $reserve->status==1 ? 'پرداخت شده' : 'کنسل شده' ) : 'معلق'  }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <hr>
    <p class="lead text-blue dinar my-3"> عملیات :  </p>
    @if ($reserve->status==0)
        <form class="d-inline" action="{{url("reserves/pay/$reserve->id")}}" method="post">
            @csrf
            <button type="submit" class="btn mx-1 px-3 bg-blue"> <i class="fa fa-credit-card ml-1"></i> پرداخت آنلاین </button>
        </form>
    @endif
    <button type="button" class="btn mx-1 btn-success" id="jq-print">
        <i class="fa fa-print ml-1"></i> پرینت
    </button>

@endsection
