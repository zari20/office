<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    public static function make($data)
    {
        $r = new self;
        $r->user_id = auth()->id();
        $r->discount_code_id = $data['discount_code_id'] ?? 0;
        $r->total_cost = $data['total_cost'];
        $r->save();
        return $r;

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function discount_code()
    {
        return $this->belongsTo(DiscountCode::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function courses()
    {
        return $this->hasOne(Course::class);
    }

    public function graphics()
    {
        return $this->hasOne(Graphic::class);
    }

    public function informings()
    {
        return $this->hasOne(Informing::class);
    }

    public function media()
    {
        return $this->hasOne(Medium::class);
    }

    public function payments()
    {
        return $this->hasOne(Payment::class);
    }

    public function schedule()
    {
        return $this->hasOne(Schedule::class);
    }
}
