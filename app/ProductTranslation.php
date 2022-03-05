<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{

    public $lang;

    //use Translateable;
    protected $fillable = ['title', 'content', 'language', 'product_id'];

    public function translation ()
    {

        return $this->hasMany(Product::class, 'id');
    }
}
