@extends('layouts.app')
@section('content')

    <form class="row" action="{{isset($code) ? url("discounts/$code->id") : url("discounts")}}" method="post">

        @csrf
        @isset($code)
            {{method_field('PUT')}}
        @endisset


        <div class="form-group col-md-4">
            <label for="title"> عنوان </label>
            <input type="text" class="form-control" id="title" name="title" value="{{$code->title ?? old('title')}}">
            <small> در این قسمت میتوانید یک عنوان برای این کدتخفیف انتخاب کنید. این فیلد الزامی نیست. </small>
        </div>

        <div class="form-group col-md-4">
            <label for="room-id"> سالن </label>
            <select class="form-control" name="room_id" id="room-id">
                <option value="0"> انتخاب کنید </option>
                @foreach ($rooms as $key => $room)
                    <option value="{{$room->id}}"
                        @if(isset($code) && !old('room_id') && $code->room_id == $room->id) selected @endif
                        @if(old('room_id') && old('room_id') == $room->id) selected @endif>
                            {{$room->name}}
                        </option>
                @endforeach
            </select>
            <small> درصورت تمایل میتوانید سالن مورد نطر را انتخاب کنید. مثلا تایین کنید که این کد تخفیف فقط برای فلان سالن قابل اعمال باشد. </small>
        </div>

        <div class="form-group col-md-4">
            <label for="code"> <i class="fa fa-asterisk ml-1 text-danger"></i> کد </label>
            <input type="text" class="form-control" id="code" name="code" value="{{$code->code ?? old('code')}}" required>
            <small> کد تخفیفی که متقاضیان میتوانند استفاده کنند را تایپ کنید. مثلا عباراتی مثل "نوروز97" یا "rooze-pedar" و یا هر عبارت دلخواه دیگر. </small>
        </div>

        <div class="form-group col-md-4">
            <label for="percent"> <i class="fa fa-asterisk ml-1 text-danger"></i> درصد تخفیف </label>
            <input type="number" class="form-control" id="percent" name="percent" value="{{$code->percent ?? old('percent')}}" required>
            <small> در این قسمت تایین کنید که متقاضی با وارد کردن این کد، از چند درصد تخفیف بهره مند شود. یک عدد به عنوان درصد تخفیف وارد کنید. </small>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="expire-date"> تاریخ انقضا </label>
                <input type="text" data-calendar="persian" readonly autocomplete="off" class="form-control" id="expire-date" name="expire_date"
                value="{{isset($code->expire_date) && $code->expire_date ? date_picker_date($code->expire_date) : old('expire_date')}}" required>
                <small> در این قسمت تاریخ انقضا این کد تخفیف را میتوانید تایین کنید. درصورت خالی گذاشتن این فیلد، این کد بدون تاریخ انتقضا خواهد شد و همواره برقرار است. </small>
            </div>
        </div>
        ‌
        <hr class="col-12">

        @include('fragments.submit', ['text'=> isset($code) ? 'ویرایش' : 'ایجاد'])

    </form>
@endsection
