<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','to_id','message','product_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'to_id');
    }
    public function sender()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
