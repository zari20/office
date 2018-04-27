@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <p class="lead text-blue my-3"> <i class="fa fa-check-circle"></i>  اطلاعات دوره آموزشی </p>
            <ul class="list-group">
                <li class="list-group-item"> <strong> نام دوره / کارگاه / کنفرانس : </strong> {{$reserve_data['course']['name'] ?? '-'}} </li>
                <li class="list-group-item"> <strong> نام موسسه / فرد برگزار کننده : </strong> {{$reserve_data['course']['performer'] ?? '-'}} </li>
                <li class="list-group-item"> <strong> نام و نام خانوادگی اساتید : </strong> {{$reserve_data['course']['teachers'] ?? '-'}} </li>
                <li class="list-group-item"> <strong> شماره مجوز / شماره ملی : </strong> {{$reserve_data['course']['code'] ?? '-'}} </li>
                <li class="list-group-item"> <strong> مرجع صدور مجوز / مدرک استاد : </strong> {{$reserve_data['course']['document'] ?? '-'}} </li>
            </ul>
        </div>
        <div class="col-md-3">
            <p class="lead text-blue my-3"> <i class="fa fa-check-circle"></i> اطلاعات تسویه حساب </p>
            <ul class="list-group">
                <li class="list-group-item"> <strong> شماره کارت : </strong> <br> <span dir="ltr"> {{implode($reserve_data['payment']['card_number'],'-')}} </span> </li>
                <li class="list-group-item"> <strong> نام صاحب حساب : </strong> {{$reserve_data['payment']['owner_name']}} </li>
                <li class="list-group-item"> <strong> شماره شبا : </strong> {{$reserve_data['payment']['shaba']}} </li>
                <li class="list-group-item">
                    <strong> اطلاعات بانک : </strong> <br>
                    بانک
                    {{$reserve_data['payment']['bank_name'] ?? '?'}}
                    شعبه
                    {{$reserve_data['payment']['bank_branch'] ?? '?'}}
                    کد
                    {{$reserve_data['payment']['bank_code'] ?? '?'}}
                </li>
            </ul>
        </div>
        <div class="col-md-5">
            <p class="lead text-blue my-3"> <i class="fa fa-check-circle"></i> سانس های انتخاب شده </p>
            <ul class="list-group">
                @foreach ($reserve_data['period']['id'] as $key => $id)
                    <li class="list-group-item"> <strong> {{$key+1}} - </strong> {{period_details($id,$reserve_data['period']['date'][$key])}} </li>
                @endforeach
            </ul>
        </div>
    </div>

    <p class="lead text-blue my-3"> <i class="fa fa-check-circle"></i> هزینه نهایی </p>
    <div class="direct-x">
        <table class="table table-bordered table-hover table-striped text-center">
            <thead>
                <tr>
                    <th>هزینه رزرو سالن</th>
                    <th>هزینه پذیرایی</th>
                    <th>هزینه خدمات سمعی بصری</th>
                    <th>هزینه خدمات گرافیکی</th>
                    <th>هزینه خدمات روابط عمومی</th>
                    <th>تخفیف</th>
                    <th>مجموع</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{toman($reserve_data['schedule']['cost'])}}</td>
                    <td>{{toman($reserve_data['catering']['cost'])}}</td>
                    <td>{{toman($reserve_data['medium']['cost'])}}</td>
                    <td>{{toman($reserve_data['graphic']['cost'])}}</td>
                    <td>{{toman($reserve_data['informing']['cost'])}}</td>
                    <td>{{toman($reserve_data['discount_amount'] ?? 0)}}</td>
                    <td class="bg-yellow">
                        {{toman($reserve_data['total_cost'])}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <p class="lead text-blue my-3"> <i class="fa fa-check-circle"></i> عملیات </p>
    <form class="row" action="{{url('reserves')}}" method="post">
        @csrf
        <div class="form-group col-md-3">
            <label for="discount_code"> <i class="fa fa-percent ml-1"></i> کد تخفیف</label>
            <input type="text" name="discount_code" id="discount_code" class="form-control" value="{{old('discount_code')}}">
        </div>
        <div class="form-group col-md-3 mt-md-4">
            <button type="submit" name="step" value="2" class="btn btn-block btn-warning bg-yellow"> <i class="fa fa-balance-scale ml-1"></i> اعمال کد تخفیف </button>
        </div>
        <div class="form-group col-md-3 mt-md-4">
            <button type="submit" name="step" value="0" class="btn btn-block btn-success bg-green"> <i class="fa fa-edit ml-1"></i> ویرایش اطلاعات </button>
        </div>
        <div class="form-group col-md-3 mt-md-4">
            <button type="submit" name="step" value="3" class="btn btn-block btn-primary bg-blue-no-hover"> <i class="fa fa-check ml-1"></i> تایید و ادامه </button>
        </div>
    </form>
@endsection
