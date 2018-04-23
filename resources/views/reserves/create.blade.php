@extends('layouts.app')
@section('content')


<div class="text-center">
    @guest
        <h4 class="r-title" data-toggle="collapse" data-target="#collapseNewUser"> <i class="fa fa-lock ml-1"></i> تعریف حساب کاربری  </h4>
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

    <form id="reserves-collapseable" action="{{url('reserves')}}" method="post">
        @csrf

        <h4 class="r-title" data-toggle="collapse" data-target="#collapseCourse"> <i class="fa fa-sitemap ml-1"></i> اطلاعات دوره آموزشی </h4>
        @include('reserve_fragments.new_course')


        <h4 class="r-title" data-toggle="collapse" data-target="#collapseServices"> <i class="fa fa-lock ml-1"></i> خدمات سالن </h4>
        <div class="collapse show" id="collapseServices" data-parent="#reserves-collapseable">
            <div class="alert alert-info text-right">
                <i class="fa fa-info-circle fa-2x ml-2"></i>
                پس از تکمیل اطلاعات مربوط به رزرو سالن میتوانید هرکدام از خدمات دیگر مانند پذیرایی یا خدمات سمعی بصری و ... را نیز انتخاب کنید
            </div>
            <div class="s-titles-container">
                <h4 data-toggle="collapse" data-target="#collapseSchedule" class="s-title" aria-expanded="true">
                     <i class="fa fa-bank ml-1"></i> رزرو سالن
                 </h4>
                <h4 data-toggle="collapse" data-target="#collapseCatering" class="s-title">
                     <i class="fa fa-coffee ml-1"></i> خدمات پذیرایی
                 </h4>
                <h4 data-toggle="collapse" data-target="#collapseMedium" class="s-title">
                     <i class="fa fa-film ml-1"></i> خدمات سمعی بصری
                 </h4>
                <h4 data-toggle="collapse" data-target="#collapseGraphic" class="s-title">
                     <i class="fa fa-gamepad ml-1"></i> خدمات گرافیک
                 </h4>
                <h4 data-toggle="collapse" data-target="#collapseInforming" class="s-title">
                     <i class="fa fa-headphones ml-1"></i> خدمات روابط عمومی
                 </h4>
                <h4 data-toggle="collapse" data-target="#collapseOnlineReserve" class="s-title">
                     <i class="fa fa-edge ml-1"></i> خدمات ثبت نام
                 </h4>
            </div>

            @include('reserve_fragments.new_schedule')
            @include('reserve_fragments.new_service',['type'=>'catering', 'next'=>'Medium', 'services'=>$caterings])
            @include('reserve_fragments.new_service',['type'=>'medium', 'next'=>'Graphic', 'services'=>$media])
            @include('reserve_fragments.new_service',['type'=>'graphic', 'next'=>'Informing', 'services'=>$graphics])
            @include('reserve_fragments.new_service',['type'=>'informing', 'next'=>'OnlineReserve', 'services'=>$informings])
            @include('reserve_fragments.online_reserve')
        </div>

        {{-- <h4 data-toggle="collapse" data-target="#collapseFinalize" class="reserve-title"> <i class="fa fa-check ml-1"></i> نهایی سازی و پرداخت آنلاین  </h4>
        @include('reserve_fragments.finalize') --}}

        <div class="row">
            @include('fragments.submit', ['text'=>'نهایی سازی عملیات', 'icon'=>'check'])
        </div>

    </form>
</div>


@endsection
