@foreach ($days as $i => $day)
    <div class="schedule animated fadeIn">
        <div class="day-heading">
            <span> {{latin_week_day($day->latin_number)}} </span>
            <span> {{date_picker_date($dates[$i])}} </span>
        </div>
        <div class="periods">
            @foreach ($day->periods($current_room) as $key => $period)
                @if (is_array(old('period')['id']) && in_array($period->id,old('period')['id']))
                    @include('fragments.period', ['type' => 'picked'])
                @elseif($period->booked($dates[$i]))
                    @include('fragments.period', ['type' => 'booked'])
                @else
                    @include('fragments.period', ['type' => 'available'])
                @endif
            @endforeach
        </div>
    </div>
@endforeach
<div id="schedule-inputs">
    @if (is_array(old('period')['id']))
        @foreach (old('period')['id'] as $key => $id)
            <input type="hidden" name="period[id][]" value="{{$id}}" id="period-id-input-{{$id}}">
            <input type="hidden" name="period[date][]" value="{{old('period')['date'][$key]}}" id="period-date-input-{{$id}}">
            <input type="hidden" name="period[hours][]" class="hidden-hours" value="{{old('period')['hours'][$key]}}" id="period-time-input-{{$id}}">
        @endforeach
    @endif
</div>
