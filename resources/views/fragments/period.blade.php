@if ($type=='available')
    <div class="period alert-primary pointer" id="period-{{$period->id}}"
        onclick="book({{$period->id}})"
        style="width:{{floor(80/count($day->periods($current_room)))-1}}%;"
        data-date="{{$dates[$i]->format('Y-m-d')}}"
        data-time="{{time_difference($period->till,$period->from)}}">
        <span>
            از
            {{display_time($period->from)}}
            تا
            {{display_time($period->till)}}
        </span>
        <span class="period-type"> قابل رزرو </span>
        <i class="fa fa-square-o"></i>
    </div>
@endif

@if ($type=='picked')
    <div class="period alert-success pointer" id="period-{{$period->id}}"
        onclick="book({{$period->id}})"
        style="width:{{floor(80/count($day->periods($current_room)))-1}}%;"
        data-date="{{$dates[$i]->format('Y-m-d')}}"
        data-time="{{time_difference($period->till,$period->from)}}">
        <span>
            از
            {{display_time($period->from)}}
            تا
            {{display_time($period->till)}}
        </span>
        <span class="period-type"> انتخاب شده </span>
        <i class="fa fa-check-square-o"></i>
    </div>
@endif

@if ($type=='booked')
    <div class="period alert-danger not-allowed" id="period-{{$period->id}}"
        style="width:{{floor(80/count($day->periods($current_room)))-1}}%;">
        <span>
            از
            {{display_time($period->from)}}
            تا
            {{display_time($period->till)}}
        </span>
        <span class="period-type"> رزرو شده </span>
    </div>
@endif

@if ($type=='impossible')
    <div class="period alert-danger not-allowed" id="period-{{$period->id}}"
        style="width:{{floor(80/count($day->periods($current_room)))-1}}%;">
        <span>
            از
            {{display_time($period->from)}}
            تا
            {{display_time($period->till)}}
        </span>
        <span class="period-type"> غیرقابل رزرو </span>
    </div>
@endif
