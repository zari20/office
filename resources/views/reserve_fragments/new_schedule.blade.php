<div class="collapse show" id="collapseSchedule" data-parent="#reserves-collapseable">
    <div class="alert alert-warning"> <h3 class="alert-heading"> رزرو سالن </h3> </div>
    <hr>
    <div class="row">
        <div class="form-group col-md-3">
            <label for="room"> <i class="fa fa-hotel ml-1"></i> نوع اتاق </label>
            <select class="form-control" name="room_id" id="room" onchange="changeService($(this))">
                @foreach ($rooms as $key => $room)
                    <option value="{{$room->id}}" data-cost="{{$room->cost_pre_hour}}">{{$room->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="date"> <i class="fa fa-calendar ml-1"></i> تاریخ </label>
            <input type="text" data-calendar="persian" readonly autocomplete="off" class="form-control" id="date" name="date" value="{{old('date') ?? date_picker_date(date('Y-m-d'))}}" required>
        </div>
        <div class="form-group col-md-3">
            <label for="room-count"> <i class="fa fa-hourglass-1 ml-1"></i> تعداد ساعات </label>
            <input type="number" class="form-control" id="room-count" name="hours" value="{{old('hours') ?? 0}}" disabled>
        </div>
        <div class="form-group col-md-3">
            <label for="room-final-cost"> <i class="fa fa-money ml-1"></i> هزینه نهایی به تومان </label>
            <input type="text" class="form-control" id="room-final-cost" name="room_cost" value="0" disabled>
        </div>
    </div>

    <div class="">
        
    </div>

    <div class="alert alert-info">
        <h4 class="alert-heading">توضیحات اتاق</h4>
        <hr>
        @foreach ($rooms as $key => $room)
            <p class="room-description" id="room-description-{{$room->id}}" @if($key>0) style="display:none" @endif> {{$room->description}} </p>
        @endforeach
        <p>
            هزینه هر ساعت :
            @foreach ($rooms as $key => $room)
                <span class="room-cost" id="room-cost-{{$room->id}}" @if($key>0) style="display:none" @endif> {{$room->cost_pre_hour}} </span>
            @endforeach
            تومان
        </p>
        <p>
            ظرفیت :
            @foreach ($rooms as $key => $room)
                <span class="room-capacity" id="room-capacity-{{$room->id}}" @if($key>0) style="display:none" @endif> {{$room->capacity}} </span>
            @endforeach
            نفر
        </p>
        <p>
            حداقل ساعت اجاره :
            @foreach ($rooms as $key => $room)
                <span class="room-min-hour" id="room-min-hour-{{$room->id}}" @if($key>0) style="display:none" @endif> {{$room->min_hour}} </span>
            @endforeach
            ساعت
        </p>
    </div>

    <button type="button" class="btn bg-blue" data-toggle="collapse" data-target="#collapseCatering">
         مرحله بعدی <i class="fa fa-arrow-left mr-1"></i>
     </button>

    <hr>
</div>
