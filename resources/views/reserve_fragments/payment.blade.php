<div class="collapse" id="collapsePayment" data-parent="#reserves-collapseable">
    <div class="alert alert-warning"> <h3 class="alert-heading"> خدمات ثبت نام </h3> </div>
    <hr>
    <p class="lead text-right"> اطلاعات تسویه حساب مشترکین خدمات رزرواسیون </p>
    <div class="row">
        <div class="col-md-6">
            <fieldset class="form-group with-border">
                <legend> شماره کارت </legend>
                <div class="text-center card-numbers" dir="ltr">
                    <input type="number" class="no-arrow form-control" maxlength="4" name="payment[card_number][]" value="{{old('payment')['card_number'][0] ?? ''}}">
                    <input type="number" class="no-arrow form-control" maxlength="4" name="payment[card_number][]" value="{{old('payment')['card_number'][1] ?? ''}}">
                    <input type="number" class="no-arrow form-control" maxlength="4" name="payment[card_number][]" value="{{old('payment')['card_number'][2] ?? ''}}">
                    <input type="number" class="no-arrow form-control" maxlength="4" name="payment[card_number][]" value="{{old('payment')['card_number'][3] ?? ''}}">
                </div>
            </fieldset>
        </div>
        <div class="col-md-3">
            <fieldset class="form-group with-border">
                <legend> نام صاحب حساب </legend>
                <input type="text" class="form-control" id="owner-name" name="payment[owner_name]" value="{{old('payment')['owner_name']}}">
            </fieldset>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <fieldset class="form-group with-border">
                <legend> شماره شبا </legend>
                <input type="text" dir="ltr" name="payment[shaba]" class="form-control" value="{{old('payment')['shaba'] ?? 'IR'}}">
            </fieldset>
        </div>
        <div class="col-md-8">
            <fieldset class="form-group with-border">
                <legend> اطلاعات بانک </legend>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="bank-name" class="col-md-4 col-form-label">نام بانک</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="bank-name" name="payment[bank_name]" value="{{old('payment')['bank_name']}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group row">
                            <label for="bank-branch" class="col-md-4 col-form-label">شعبه</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="bank-branch" name="payment[bank_branch]" value="{{old('payment')['bank_branch']}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group row">
                            <label for="bank-code" class="col-md-4 col-form-label">کد</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="bank-code" name="payment[bank_code]" value="{{old('payment')['bank_code']}}">
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>

    <hr>

</div>
