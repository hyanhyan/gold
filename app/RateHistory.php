<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RateHistory extends Model
{
    protected $fillable = [   //add this for updating
        'rate_id', 'buy', 'sell','create_at',
    ];

    public $timestamps = false;



    public static function boot()

    {

        parent::boot();



        static::creating(function ($model) {

            $model->created_at = $model->freshTimestamp();

        });

    }

    public function rate ()
    {
        return $this->hasMany(Rate::class, 'id');
    }
}
