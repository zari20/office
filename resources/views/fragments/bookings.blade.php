@if (count($bookings))
    <div class="row">
        @foreach ($bookings as $key => $booking)
            <div class="col-md-4 my-1">
                <div class="card bg-{{$bg}} text-{{$color}}">
                    <div class="card-body">
                        {{period_details($booking->period_id, $booking->date)}}
                        <hr>
                        سالن : {{$booking->period->room->name ?? '?'}}
                    </div>
                    <div class="card-footer">
                        <span class="float-right badge badge-pill badge-light py-2 px-3">
                            رزرو شده توسط :
                            @isset($booking->reserve->user)
                                <a href="{{url("users/{$booking->reserve->user->id}")}}">
                                     {{$booking->reserve->user->mobile}}
                                </a>
                            @else
                                 <a href="#">
                                      {{$booking->reserve_id == 0 ? 'ادمین' : '?'}}
                                 </a>
                            @endisset
                        </span>
                        <span class="float-left badge badge-pill badge-light py-2 px-3">
                            <a href="{{url("bookings/$booking->id/edit")}}" class="text-success none half-x mx-1" title="ویرایش">
                                 <i class="fa fa-edit"></i>
                            </a>
                            <a onclick="if(confirm('آیا این رزرو موردنظر لغو شود؟')) $('form#delete-booking-{{$booking->id}}').submit()" class="text-danger none half-x mx-1" title="لغو">
                                 <i class="fa fa-times"></i>
                            </a>
                            <form class="d-none" action="{{url("bookings/$booking->id")}}" method="post" id="delete-booking-{{$booking->id}}">
                                @csrf
                                {{method_field('DELETE')}}
                            </form>
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @if (count($bookings) == 6)
        <div class="text-left mt-2">
            <a href="{{url("bookings?type=$type")}}"> <i class="fa fa-list ml-1"></i> مشاهده همه </a>
        </div>
    @endif
@else
    <div class="alert alert-warning text-center">
        موردی یافت نشد.
    </div>
@endif
