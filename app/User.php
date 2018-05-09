<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [
        'id', 'type'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
