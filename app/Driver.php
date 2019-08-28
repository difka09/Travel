<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'name', 'address', 'identity', 'phone', 'born', 'car_id',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
