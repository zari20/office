<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-1">
        <button type="button" class="btn bg-blue d-md-block d-none" onclick="getCalendar('prev')">
            <i class="fa fa-arrow-right ml-1"></i> هفته قبل
        </button>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label for="schedule-date" class="col-md-3 col-form-label"> <i class="fa fa-calendar ml-1"></i> تاریخ </label>
            <div class="col-md-9">
                <input type="text" data-calendar="persian" readonly autocomplete="off" class="form-control" id="schedule-date" name="schedule[date]"
                value="{{$calendar_date ?? old('schedule')['date'] ?? date_picker_date(date('Y-m-d'))}}" required>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <button type="button" class="btn btn-block text-white bg-green shadow d-md-block d-none" onclick="getCalendar('current')">
            <i class="fa fa-search ml-1"></i> بگرد
        </button>
    </div>
    <div class="col-md-1">
        <button type="button" class="btn bg-blue d-md-block d-none" onclick="getCalendar('next')">
            هفته بعد <i class="fa fa-arrow-left mr-1"></i>
        </button>
    </div>
</div>
<div class="mb-3 d-md-none d-block">
    <button type="button" class="btn bg-blue" onclick="getCalendar('prev')">
        <i class="fa fa-arrow-right ml-1"></i> هفته قبل
    </button>
    <button type="button" class="btn text-white bg-green shadow" onclick="getCalendar('current')">
        <i class="fa fa-search ml-1"></i> بگرد
    </button>
    <button type="button" class="btn bg-blue" onclick="getCalendar('next')">
        هفته بعد <i class="fa fa-arrow-left mr-1"></i>
    </button>
</div>
<div id="schedule-calendar">
    @if (isset($past_date) && $past_date)
        @include('fragments.error', ['message' => 'تاریخ انتخاب شده در گذشته میباشد'])
    @else
        @include('partials.calendar')
    @endif
</div>
