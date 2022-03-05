<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metal extends Model
{

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [   //add this for updating
        'id',
    ];

    function rate() {
        return $this->hasOne(Rate::class);
    }

}
