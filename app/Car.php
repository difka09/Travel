<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'type', 'plat', 'year',
    ];

    public function drivers()
    {
        return $this->hasMany(Driver::class);
    }
}
