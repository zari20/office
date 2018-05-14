<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    public static function make($data)
    {
        $r = new self;
        $r->user_id = auth()->id();
        $r->room_id = $data['schedule']['room_id'];
        $r->zarin_pal_id = 0;
        $r->find_out_id = $data['find_out_id'] ?? 0;
        $r->discount_code_id = $data['discount']['id'] ?? 0;
        $r->room_cost = $data['schedule']['cost'];
        $r->payable_amount = $data['payable_amount'] ?? $data['total_cost'];
        $r->total_cost = $data['total_cost'];
        $r->save();
        return $r;

    }

    public function zarin()
    {
        return $this->belongsTo(ZarinPal::class,'zarin_pal_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function find_out()
    {
        return $this->belongsTo(FindOut::class);
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

    public function caterings()
    {
        return $this->hasMany(Catering::class);
    }

    public function graphics()
    {
        return $this->hasMany(Graphic::class);
    }

    public function informings()
    {
        return $this->hasMany(Informing::class);
    }

    public function media()
    {
        return $this->hasMany(Medium::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function hours()
    {
        $hours = 0;
        foreach ($this->bookings as $key => $booking) {
            $hours += time_difference($booking->period->from, $booking->period->till);
        }
        return $hours;
    }

}
