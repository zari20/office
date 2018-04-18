@extends('layouts.app')

@section('content')
    <div class="p-2">
        <div class="card">
            <div class="card-header h5 text-blue">
                <strong> داشبرد @lang('messages.'.user_type())  </strong>
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @include('dashboards.'.user_type())
            </div>
        </div>
    </div>
@endsection
