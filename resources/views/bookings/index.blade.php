@extends('layouts.app')
@section('content')

    @if ( $type == 'all' )
        <p class="lead text-blue"> رزرو شده های روز های قبل </p>
        @include('fragments.bookings', ['bookings'=>$bookings['past'], 'type'=>'past','bg' => 'danger', 'color'=>'light'])
        <hr>

        <p class="lead text-blue"> رزرو شده های امروز </p>
        @include('fragments.bookings', ['bookings'=>$bookings['today'], 'type'=>'today','bg' => 'warning', 'color'=>'dark'])
        <hr>

        <p class="lead text-blue"> رزرو شده های روز های آتی </p>
        @include('fragments.bookings', ['bookings'=>$bookings['future'], 'type'=>'future','bg' => 'success', 'color'=>'light'])
    @else
        @include('partials.bookings_table')
    @endif

@endsection
