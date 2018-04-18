@extends('layouts.app')
@section('content')
    @guest
        <h4 class="reserve-title badge mb-md-4 my-2"> <i class="fa fa-lock ml-1"></i> تعریف حساب کاربری </h4>
        @include('reserve_fragments.new_user')
    @else
        <div class="alert alert-success">
            <i class="fa fa-check ml-1"></i>
            شما وارد حساب کاربری خود شدید.
            <br>
            <i class="fa fa-user ml-1"></i>
            نام کاربری یا شماره موبایل شما :
            <span class="text-dark"> {{auth()->user()->username ?? auth()->user()->mobile}} </span>
        </div>
        @if (admin())
            <div class="alert alert-warning">
                <i class="fa fa-warning ml-1"></i>
                توجه داشته باشید که شما با دسترسی ادمین وارد شده اید.
            </div>
        @endif
    @endguest
    <hr>
    <form class="" action="{{'reserves'}}" method="post">
        @csrf

        <h4 data-toggle="collapse" href="#collapseCourse" class="reserve-title badge"> <i class="fa fa-sitemap ml-1"></i> اطلاعات دوره آموزشی / کنفرانس </h4>
        @include('reserve_fragments.new_course')
        <br>

        <h4 data-toggle="collapse" href="#collapseSchedule" class="reserve-title badge"> <i class="fa fa-bank ml-1"></i> اطلاعات رزرو سالن </h4>
        @include('reserve_fragments.new_schedule')
        <br>

        <h4 data-toggle="collapse" href="#collapseCatering" class="reserve-title badge"> <i class="fa fa-coffee ml-1"></i> خدمات پذیرایی را انتخاب نمایید </h4>
        @include('reserve_fragments.new_service',['type'=>'catering', 'services'=>$caterings])
        <br>

        <h4 data-toggle="collapse" href="#collapseMedium" class="reserve-title badge"> <i class="fa fa-film ml-1"></i> خدمات سمعی بصری را انتخاب نمایید. </h4>
        @include('reserve_fragments.new_service',['type'=>'medium', 'services'=>$media])
        <br>

        <h4 data-toggle="collapse" href="#collapseGraphic" class="reserve-title badge"> <i class="fa fa-gamepad ml-1"></i> خدمات گرافیکی را انتخاب نمایید. </h4>
        @include('reserve_fragments.new_service',['type'=>'graphic', 'services'=>$graphics])
        <br>

        <h4 data-toggle="collapse" href="#collapseInforming" class="reserve-title badge"> <i class="fa fa-headphones ml-1"></i> خدمات روابط عمومی و اطلاع رسانی را انتخاب نمایید. </h4>
        @include('reserve_fragments.new_service',['type'=>'informing', 'services'=>$informings])
        <br>

        <h4 data-toggle="collapse" href="#collapseOnlineReserve" class="reserve-title badge"> <i class="fa fa-edge ml-1"></i> خدمات رزرواسیون آنلاین را انتخاب نمایید. </h4>
        @include('reserve_fragments.online_reserve')
        <br>

        <h4 data-toggle="collapse" href="#collapseFinalize" class="reserve-title badge"> <i class="fa fa-check ml-1"></i> نهایی سازی و پرداخت آنلاین را انتخاب نمایید </h4>
        @include('reserve_fragments.finalize')
    </form>


@endsection
