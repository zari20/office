<div class="collapse show" id="collapseSchedule" data-parent="#reserves-collapseable">

    <div class="alert alert-info">
        @foreach ($rooms as $key => $room)
            <p class="room-description" id="room-description-{{$room->id}}" @if($key>0) style="display:none" @endif> {{$room->description}} </p>
        @endforeach
        <p class="d-inline mx-2">
            هزینه هر ساعت :
            @foreach ($rooms as $key => $room)
                <span class="room-cost" id="room-cost-{{$room->id}}" @if($key>0) style="display:none" @endif> {{$room->cost_pre_hour}} </span>
            @endforeach
            تومان
        </p>
        -
        <p class="d-inline mx-2">
            ظرفیت :
            @foreach ($rooms as $key => $room)
                <span class="room-capacity" id="room-capacity-{{$room->id}}" @if($key>0) style="display:none" @endif> {{$room->capacity}} </span>
            @endforeach
            نفر
        </p>
    </div>

    <div class="row my-3">
        <div class="form-group col-md-4">
            <label for="room"> <i class="fa fa-hotel ml-1"></i> نوع سالن </label>
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

    <div id="schedule-section">
        @include('partials.schedule')
    </div>

    <hr>
    <button type="button" class="btn bg-blue" data-toggle="collapse" data-target="#collapseCatering">
         مرحله بعدی <i class="fa fa-arrow-left mr-1"></i>
     </button>

    <hr>
</div>
