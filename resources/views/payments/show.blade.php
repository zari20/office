@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card text-center">
                <ul class="list-group list-group-flush p-0">

                    @admin
                        <li class="list-group-item">
                            نام کاربری یا شماره تماس :
                            <a href="{{url("users/$payment->user_id")}}"> {{$payment->user->username ?? $payment->user->mobile ?? '-'}} </a>
                        </li>
                    @endadmin
                    <li class="list-group-item"> شماره کارت : <span dir="ltr"> {{$payment->card_number ?? '-'}} </span> </li>
                    <li class="list-group-item"> نام صاحب حساب : {{$payment->owner_name ?? '-'}}</li>
                    <li class="list-group-item"> شماره شبا : {{$payment->shaba ?? '-'}}</li>
                    <li class="list-group-item"> نام بانک : {{$payment->bank_name ?? '-'}}</li>
                    <li class="list-group-item"> شعبه : {{$payment->banck_branch ?? '-'}}</li>
                    <li class="list-group-item"> کد شعبه : {{$payment->bank_code ?? '-'}}</li>

                </ul>
                @regular
                    <div class="card-body text-left">
                        <a href="{{url("payments/{$payment->id}/edit")}}" class="card-link text-success none mx-1"> <i class="fa fa-edit ml-1"></i> ویرایش </a>
                    </div>
                @endregular
            </div>
        </div>
    </div>
@endsection
