<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [   //add this for updating
        'id', 'name', 'description', 'for_all',
    ];

    public function users(){
        return $this->belongsToMany('\App\User', 'service_user_table');
    }
}
