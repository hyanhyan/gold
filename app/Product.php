<?php

    namespace App;

    use Illuminate\Support\Facades\App;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Auth;
    use \Illuminate\Database\Eloquent\Relations\BelongsToMany;


    class Product extends Model
    {

        protected $fillable = [
            'user_id',
            'product_type_id',
            'published',
            'loc_glob',
            'm_w_c',
            'price',
            'weight',
            'code',
            'city_id',
            'brand_id',
            'metal_id',
            'rate_id',
            'pictures',
            'color',
            'used',
            'videoURL',
            'addresses',
            'status'
        ];

        public function product()
        {
            return $this->hasOne(ProductTranslation::class, 'product_id', 'id');
        }

        public function users(){
            return $this->belongsToMany('\App\User', 'favorite_user_table');
        }

        public function offers(): \Illuminate\Database\Eloquent\Relations\HasMany
        {
            return $this->hasMany(Offer::class,'product_id','id');
        }

//        public function countOffers(){
//          return  $this->hasMany('\App\Product', 'product_id')->where('product_id',$this->id)
//                   ->where('user_id',Auth::id());
//         }
    }
