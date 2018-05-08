<div class="text-center">
    <a href="{{url("bookings?type=past")}}" class="btn bg-blue"> رزو شده های روز های قبلی </a>
    <a href="{{url("bookings?type=today")}}" class="btn bg-blue"> رزو شده های امروز </a>
    <a href="{{url("bookings?type=future")}}" class="btn bg-blue"> رزو شده های روز های بعدی </a>
</div>

<p class="lead text-blue">
    رزرو شده های
    @if ($type=='past')
         روز های قبلی
    @endif
    @if ($type=='today')
        امروز
    @endif
    @if ($type=='future')
         روز های آتی
    @endif
</p>

<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th scope="col">ردیف</th>
            <th scope="col">رزرو</th>
            <th scope="col">شخص رزرو کننده</th>
            <th scope="col">سانس</th>
            <th scope="col">عملیات</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bookings as $key => $booking)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>
                    @isset($booking->reserve->course->name)
                        <a href="{{url("reserves/$booking->reserve_id")}}"> {{$booking->reserve->course->name}} </a>
                    @elseif ($booking->reserve_id == 0)
                        ادمین
                    @else
                        ?
                    @endisset
                </td>
                <td>
                    @isset($booking->reserve->user->id)
                        <a href="{{url("users/{$booking->reserve->user->id}")}}"> {{$booking->reserve->user->mobile}} </a>
                    @elseif ($booking->reserve_id == 0)
                        ادمین
                    @else
                        ?
                    @endisset
                </td>
                <td> {{period_details($booking->period_id, $booking->date)}} </td>
                <td align="center">
                    <a onclick="if(confirm('آیا این رزرو موردنظر لغو شود؟')) $('form#delete-booking-{{$booking->id}}').submit()" class="text-danger none half-x mx-1" title="{{$type=='past' ? 'حذف' : 'لغو'}}">
                         <i class="fa fa-{{$type=='past' ? 'trash' : 'times'}}"></i>
                    </a>
                    <form class="d-none" action="{{url("bookings/$booking->id")}}" method="post" id="delete-booking-{{$booking->id}}">
                        @csrf
                        {{method_field('DELETE')}}
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
