<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MatchingWeekDay implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $data = request()->all();
        $carbon_date = persian_to_carbon($data['date']);
        $week_day = $carbon_date->format('N');
        $period = \App\Period::find($data['period_id']);

        return $period->day->latin_number == $week_day;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $data = request()->all();
        $carbon_date = persian_to_carbon($data['date']);
        $week_day = $carbon_date->format('N');
        $period = \App\Period::find($data['period_id']);
        return  "تاریخ انتخاب شده با ایام هفته سانس مورد نظر مطابقت ندارد. ".$data['date']." در تقویم ".latin_week_day($week_day)." میباشد درحالیکه سانس انتخاب شده در روز ".latin_week_day($period->day->latin_number)." است";
    }
}
