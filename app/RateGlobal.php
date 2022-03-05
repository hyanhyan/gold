<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RateGlobal extends Model
{
    protected $fillable = [
        'id', 'metal_id', 'price'
    ];

    function getGlobalMetal(){

        $url = "https://metals-api.com/api/latest?access_key=" . env('METAL_API_KEY')."&symbols=" . env('METAL_API_CODE');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $head = curl_exec($ch);
        curl_close($ch);

        if(!$head)
            return FALSE;

//        $head = '{
//          "rates": {
//            "USD": 1,
//            "XAG": 0.0413811377,
//            "XAU": 0.00053406942,
//            "XPD": 0.000429422938,
//            "XPT": 0.0010551048014
//          }
//        }';



        return json_decode($head);
    }


    function rateHistory() {
        return $this->hasOne(RateGlobalHistory::class);
    }
}
