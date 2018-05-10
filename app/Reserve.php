<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    public static function make($data)
    {
        $r = new self;
        $r->user_id = auth()->id();
        $r->zarin_pal_id = $data['zarin_pal_id'];
        $r->find_out_id = $data['find_out_id'];
        $r->discount_code_id = $data['discount']['id'] ?? 0;
        $r->payable_amount = $data['payable_amount'] ?? $data['total_cost'];
        $r->total_cost = $data['total_cost'];
        $r->save();
        return $r;

    }

    public function user()
    {
        return $this->belongsTo(User::class);
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

    public function schedule()
    {
        return $this->hasOne(Schedule::class);
    }

    public function services_groups()
    {
        $service_types = Service::$ptypes;
        $services = [];
        foreach ($service_types as $key => $ptype) {
            $services[$ptype] = $this->$ptype;
        }
        return $services;
    }

    public function no_service()
    {
        $no_service = true;
        foreach ($this->services_groups() as $ptype => $services) {
            if(count($services)){
                $no_service = false;
                break;
            }
        }
        return $no_service;
    }

    public function services_total_cost()
    {
        $total = 0;
        foreach ($this->services_groups() as $ptype => $services) {
            foreach ($services as $key => $service) {
                $total += $service->cost;
            }
        }
        return $total;
    }
}
