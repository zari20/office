<div class="collapse show" id="collapseSchedule" data-parent="#reserves-collapseable">
    <div class="alert alert-warning"> <h3 class="alert-heading"> رزرو سالن </h3> </div>
    <hr>
    <div class="row">
        <div class="form-group col-md-4 styled-select slate">
            <label for="room"> <i class="fa fa-hotel ml-1"></i> نوع اتاق <i class="fa fa-asterisk text-danger"></i></label>
            <select class="form-control" name="room_id" id="room" onchange="changeService($(this))">
                @foreach ($rooms as $key => $room)
                    <option value="{{$room->id}}" data-cost="{{$room->cost_pre_hour}}">{{$room->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="room-count"> <i class="fa fa-hourglass-1 ml-1"></i> تعداد ساعات <i class="fa fa-asterisk text-danger"></i></label>
            <input type="number" step="0.5" class="form-control" id="room-count" name="hours" value="{{old('hours') ?? 1}}" required placeholder="*الزامی" onchange="changeCount($(this))" data-type="room">
        </div>
        <div class="form-group col-md-4">
            <label for="date"> <i class="fa fa-calendar ml-1"></i> تاریخ <i class="fa fa-asterisk text-danger"></i></label>
            <input type="text" data-calendar="persian" readonly autocomplete="off" class="form-control" id="date" name="date" value="{{old('date')}}" required placeholder="*الزامی">
        </div>
        <div class="form-group col-md-4">
            <label for="time"> <i class="fa fa-clock-o ml-1"></i> ساعت <i class="fa fa-asterisk text-danger"></i></label>
            <input type="time" class="form-control" id="time" name="time" value="{{old('time')}}" required placeholder="*الزامی" step="1800" value="13:30">
        </div>
        <div class="form-group col-md-4">
            <label for="room-final-cost"> <i class="fa fa-money ml-1"></i> هزینه نهایی به تومان </label>
            <input type="text" class="form-control" id="room-final-cost" name="room_cost" value="{{$rooms->first()->cost_pre_hour ?? 0}}" disabled>
        </div>
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
    </div>

    <hr>
</div>
