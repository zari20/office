@extends('layouts.app')
@section('content')

    <form class="row" action="{{isset($code) ? url("discounts/$code->id") : url("discounts")}}" method="post">

        @csrf
        @isset($code)
            {{method_field('PUT')}}
        @endisset

        <div class="form-group col-md-4">
            <label for="room-id"> اتاق </label>
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
            <small> درصورت تمایل میتوانید اتاق مورد نطر را انتخاب کنید. مثلا تایین کنید که این کد تخفیف فقط برای فلان اتاق قابل اعمال باشد. </small>
        </div>

        <div class="form-group col-md-4">
            <label for="code"> کد </label>
            <input type="text" class="form-control" id="code" name="code" value="{{$code->code ?? old('code')}}" required>
            <small> کد تخفیفی که متقاضیان میتوانند استفاده کنند را تایپ کنید. مثلا عباراتی مثل "نوروز97" یا "rooze-pedar" و یا هر عبارت دلخواه دیگر. </small>
        </div>

        <div class="form-group col-md-4">
            <label for="percent"> درصد تخفیف </label>
            <input type="number" class="form-control" id="percent" name="percent" value="{{$code->percent ?? old('percent')}}" required>
            <small> در این قسمت تایین کنید که متقاضی با وارد کردن این کد، از چند درصد تخفیف بهره مند شود. یک عدد به عنوان درصد تخفیف وارد کنید. </small>
        </div>
        ‌
        <hr class="col-12">

        @include('fragments.submit', ['text'=> isset($code) ? 'ویرایش' : 'ایجاد'])

    </form>
@endsection
