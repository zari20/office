@extends('layouts.app')
@section('content')


<div class="text-center">
    @guest
        <h4 class="r-title" data-toggle="collapse" data-target="#collapseNewUser"> <i class="fa fa-lock ml-1"></i> تعریف حساب کاربری  </h4>
        @include('reserve_fragments.new_user')
    @endguest

    <form id="reserves-collapseable" action="{{url('reserves')}}" method="post" enctype="multipart/form-data">

        @csrf

        <h4 class="r-title" data-toggle="collapse" data-target="#collapseCourse"> <i class="fa fa-sitemap ml-1"></i> اطلاعات شما </h4>
        @include('reserve_fragments.new_course')


        <h4 class="r-title" data-toggle="collapse" data-target="#collapseServices"> <i class="fa fa-lock ml-1"></i> خدمات سالن </h4>
        <div class="collapse show" id="collapseServices" data-parent="#reserves-collapseable">
            <div class="s-titles-container">
                <h4 data-toggle="collapse" data-target="#collapseSchedule" class="s-title" aria-expanded="true">
                     <i class="fa fa-bank ml-1"></i> رزرو سالن
                </h4>
                {{-- <h4 data-toggle="collapse" data-target="#collapseCatering" class="s-title">
                     <i class="fa fa-coffee ml-1"></i> خدمات پذیرایی
                </h4> --}}
            </div>

            @include('reserve_fragments.new_schedule')

        </div>

        <div class="pricing-box animated slideInUp @if(!old('schedule')['room_id']) d-none @endif" id="pricing-box">
            @include('fragments.pricing_box')
        </div>

        <div class="row" id="reserve-submit-box" @if(old('schedule')['room_id']) style="padding-bottom:100px" @endif id="pricing-box">
            @include('fragments.submit', ['text'=>'نهایی سازی عملیات', 'name'=>'step', 'value'=>'1'])
        </div>

    </form>
</div>


@endsection
