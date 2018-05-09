@extends('layouts.app')
@section('content')

    @if (!$payment->id)
        <div class="alert alert-info">
            شما هنوز اطلاعات مالی خود را ثبت نکرده اید. لطفا فرم زیر را پرکنید.
        </div>
    @endif

    <form action="{{ $payment->id ? url("payments/$payment->id") : url("payments") }}" method="post">

        @csrf
        @if($payment->id)
            {{method_field('PUT')}}
        @endif

        <p class="lead text-right"> اطلاعات تسویه حساب مشترکین خدمات رزرواسیون </p>
        <div class="row">
            <div class="col-md-6">
                <fieldset class="form-group with-border">
                    <legend> شماره کارت (الزامی)</legend>
                    <div class="text-center card-numbers" dir="ltr">
                        <input type="number" class="no-arrow form-control" maxlength="4" name="card_number[]" value="{{old('card_number')[0] ?? $card_number[0]}}">
                        <input type="number" class="no-arrow form-control" maxlength="4" name="card_number[]" value="{{old('card_number')[1] ?? $card_number[1]}}">
                        <input type="number" class="no-arrow form-control" maxlength="4" name="card_number[]" value="{{old('card_number')[2] ?? $card_number[2]}}">
                        <input type="number" class="no-arrow form-control" maxlength="4" name="card_number[]" value="{{old('card_number')[3] ?? $card_number[3]}}">
                    </div>
                </fieldset>
            </div>
            <div class="col-md-3">
                <fieldset class="form-group with-border">
                    <legend> نام صاحب حساب (الزامی) </legend>
                    <input type="text" class="form-control" id="owner-name" name="owner_name" value="{{old('owner_name') ?? $payment->owner_name}}">
                </fieldset>
            </div>
            <div class="col-md-3">
                <fieldset class="form-group with-border">
                    <legend> شماره شبا </legend>
                    <input type="text" dir="ltr" name="shaba" class="form-control" value="{{old('shaba') ?? $payment->shaba}}">
                </fieldset>
            </div>
        </div>
        <fieldset class="form-group with-border text-center">
            <legend> اطلاعات بانک </legend>
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group row">
                        <label for="bank-name" class="col-md-4 col-form-label">نام بانک</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="bank-name" name="bank_name" value="{{old('bank_name') ?? $payment->bank_name}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group row">
                        <label for="bank-branch" class="col-md-4 col-form-label">شعبه</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="bank-branch" name="bank_branch" value="{{old('bank_branch') ?? $payment->bank_branch}}">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label for="bank-code" class="col-md-4 col-form-label">کد شعبه</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="bank-code" name="bank_code" value="{{old('bank_code') ?? $payment->bank_code}}">
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>


        <div class="row">
            @include('fragments.submit', ['text'=> $payment->id ? 'ویرایش' : 'ایجاد'])
        </div>

    </form>
@endsection
