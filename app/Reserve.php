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

    public function discount()
    {
        return $this->belongsTo(DiscountCode::class,'discount_code_id');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function course()
    {
        return $this->hasOne(Course::class);
    }

    public function graphic()
    {
        return $this->hasOne(Graphic::class);
    }

    public function informing()
    {
        return $this->hasOne(Informing::class);
    }

    public function medium()
    {
        return $this->hasOne(Medium::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function schedule()
    {
        return $this->hasOne(Schedule::class);
    }

    public function services()
    {
        $service_types = Service::$types;
        $services = [];
        foreach ($service_types as $key => $type) {
            $services[$type] = $this->$type;
        }
        return $services;
    }
}
