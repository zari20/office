@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="card">
            <div class="card-header">داشبرد</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                You are logged in!
            </div>
        </div>
    </div>
@endsection
