<div class="collapse show" id="collapseSchedule" data-parent="#reserves-collapseable">
    <div class="alert alert-warning"> <h3 class="alert-heading"> رزرو سالن </h3> </div>
    <hr>

    <div class="row">
        <div class="form-group col-md-4">
            <label for="room"> <i class="fa fa-hotel ml-1"></i> نوع اتاق </label>
            <select class="form-control" name="schedule[room_id]" id="room-type">
                @foreach ($rooms as $key => $room)
                    <option value="{{$room->id}}" data-cost="{{$room->cost_pre_hour}}" @if(old('schedule')['room_id'] == $room->id) selected @endif>
                        {{$room->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="room-count"> <i class="fa fa-hourglass-1 ml-1"></i> تعداد ساعات </label>
            <input type="number" class="form-control" id="room-hours" name="schedule[hours]" value="{{old('schedule')['hours'] ?? 0}}" readonly>
        </div>
        <div class="form-group col-md-4">
            <label for="room-final-cost"> <i class="fa fa-money ml-1"></i> هزینه نهایی به تومان </label>
            <input type="text" class="form-control" id="room-final-cost" name="schedule[cost]" value="{{old('schedule')['cost'] ?? 0}}" readonly>
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

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-1">
            <button type="button" class="btn bg-blue d-md-block d-none"> <i class="fa fa-arrow-right ml-1"></i> هفته قبل </button>
        </div>
        <div class="col-md-4">
            <div class="form-group row">
                <label for="schedule-date" class="col-md-3 col-form-label"> <i class="fa fa-calendar ml-1"></i> تاریخ </label>
                <div class="col-md-9">
                    <input type="text" data-calendar="persian" readonly autocomplete="off" class="form-control" id="schedule-date" name="schedule[date]"
                    value="{{old('schedule')['date'] ?? date_picker_date(date('Y-m-d'))}}" required>
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <button type="button" class="btn btn-block text-white bg-green shadow d-md-block d-none" onclick="getCalendar()">
                <i class="fa fa-search ml-1"></i> بگرد
            </button>
        </div>
        <div class="col-md-1">
            <button type="button" class="btn bg-blue d-md-block d-none"> هفته بعد <i class="fa fa-arrow-left mr-1"></i> </button>
        </div>
    </div>
    <div class="mb-3 d-md-none d-block">
        <button type="button" class="btn bg-blue"> <i class="fa fa-arrow-right ml-1"></i> هفته قبل </button>
        <button type="button" class="btn text-white bg-green shadow" onclick="getCalendar()">
            <i class="fa fa-search ml-1"></i> بگرد
        </button>
        <button type="button" class="btn bg-blue"> هفته بعد <i class="fa fa-arrow-left mr-1"></i> </button>
    </div>
    <div id="schedule-calendar">
        @include('partials.calendar')
    </div>

    <hr>
    <button type="button" class="btn bg-blue" data-toggle="collapse" data-target="#collapseCatering">
         مرحله بعدی <i class="fa fa-arrow-left mr-1"></i>
     </button>

    <hr>
</div>
