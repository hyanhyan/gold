<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'message', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function userService(): BelongsToMany
    {
        $pivotTable = 'service_user_table';

        $relatedModel = new Service();

        return $this->belongsToMany($relatedModel, $pivotTable, 'user_id', 'service_id');
    }

    public function services(){
        return $this->belongsToMany('\App\Service', 'service_user_table');
    }

    public function favorites(){
        return $this->belongsToMany('\App\Product', 'favorite_user_table');
    }
    public function offers(): BelongsToMany
    {
        return $this->belongsToMany(Offer::class, 'user_offers',  'user_id','offer_id');
    }
    public function messages() {
        return $this->hasMany('App\Message', 'to_id');
    }
//    public function offers(): HasMany
//    {
//        return $this->hasMany(Product::class,'user_id','id');
//    }


}
