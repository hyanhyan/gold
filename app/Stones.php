<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stones extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'stone_name', 'carat', 'pcs', 'color','clarity', 'cut','product_id'
    ];

    public function stone()
    {

        return $this->hasMany(Product::class, 'id');
    }
}
