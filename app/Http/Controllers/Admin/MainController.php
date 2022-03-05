<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\UserInfo;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Array_;

class MainController extends Controller
{
    public $info;
    public $user;

    public function __construct()
        {
            if (!Auth::user()) { return redirect('/'); }
            $this->user = array_filter(Auth::user()->getAttributes(), function($k) {
                return !array_keys(['email_verified_at', 'password', 'remember_token'], $k);
            }, ARRAY_FILTER_USE_KEY);

            $this->info = UserInfo::where('user_id', '=', $this->user['id'])->first();
            if ($this->info == null) {
                $this->info = (object)array() ;
                $this->info->pictures = "avatar1.png";
            }else if (empty($this->info->pictures)){
                $this->info->pictures = 'avatar1.png';
            }
        }
}
