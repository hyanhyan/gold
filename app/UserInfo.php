<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = 'user_infos';
    protected $fillable = [
        'title', 'description', 'pictures', 'phone', 'optional_phone', 'market',
        'address', 'optional_address', 'email', 'user_id'
    ];
}
