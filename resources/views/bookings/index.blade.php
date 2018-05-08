@extends('layouts.app')
@section('content')

    @if ( $type == 'all' )

        <p class="lead text-blue"> رزرو شده های امروز </p>
        @include('fragments.bookings', ['bookings'=>$bookings['today'], 'type'=>'today','bg' => 'warning', 'color'=>'dark'])
        <hr>

        <p class="lead text-blue"> رزرو شده های آتی </p>
        @include('fragments.bookings', ['bookings'=>$bookings['future'], 'type'=>'future','bg' => 'success', 'color'=>'light'])
        <hr>

        <p class="lead text-blue"> رزرو شده های قبلی </p>
        @include('fragments.bookings', ['bookings'=>$bookings['past'], 'type'=>'past','bg' => 'danger', 'color'=>'light'])

    @else
        @include('partials.bookings_table')
    @endif

@endsection
