<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'day', 'time', 'driver_id',
    ];

    public function driver()
    {
        return $this->hasOne(Driver::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
