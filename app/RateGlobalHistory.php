<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RateGlobalHistory extends Model
{
    protected $fillable = [
        'id', 'rate_id', 'price'
    ];

    public function rate ()
    {
        return $this->hasMany(RateGlobal::class, 'id');
    }
}
