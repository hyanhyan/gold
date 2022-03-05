<?php
namespace App\Http\Controllers;
use App\Offer;
use App\Product;
use App\UserOffer;
use App\Rate;
use App\RateGlobal;
use App\RateGlobalHistory;
use App\RateHistory;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Service;
use App\User;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $productRepository;
    protected $fav;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        parent::__construct();
        $this->productRepository = $productRepository;
        if (isset($user->id)){
            $this->fav = $user->favorites()->get(['product_id'])->pluck('product_id')->toArray();
        } else {
            $this->fav = [];
        }
    }

    public function ajaxRequest()
    {
        return view('ajaxRequest');
    }

    /**
     * Create a new controller instance.
     *
     * @param Request $request
     * @return void
     */
    public function ajaxRequestPost(Request $request)
    {
        $productIDList = $request->all();

        foreach ($productIDList['orderList'] as $key=>$productId) {

            //\Log::info($key,$productId);
            //dd($key,$productId);
            $this->productRepository->updateOrdering($productId,$key);
        }

        return response()->json(['success'=>$productIDList]);
    }

    public function ajaxRequestDeletePhoto(Request $request){
        $photo = $request->all();
        $res = $this->productRepository->deleteImage($photo['img_id']);
        return response()->json(['success' => $res ]);
    }

    public function favoriteAjax(Request $request){
        $productID = $request->all();
        $user = auth()->user();
        $check =  $user->favorites()->where('product_id',$productID)->get();

        if(count($check)){
            $checkMsg = 0;
            $user->favorites()->detach($productID);
        } else {
            $user->favorites()->attach($productID);
            $checkMsg = 1;
        }


        return response()->json(['success'=> $checkMsg]);
    }

    public function getChart(Request $request){

        $res_path = resource_path('json_files');
        $fp = $string = file_get_contents($res_path . "/local.json");


        $res = json_decode($fp);

        $rates = json_decode($res->rates);
        $last_rates = json_decode($res->last_rates);

        foreach ($rates as $key => $rate):
            if ((time() - strtotime($rate->updated_at))/60>15) {
                $rates[$key]->updated_at = "-15 minutes";
            }
        endforeach;


        $rateTime = "01";
        if (strtotime($rates[0]->created_at) == 0 ) {
            $rateTime = "00";
        }

        return view('coming', compact('rates', 'last_rates', 'rateTime'));
    }

    public function getChartGlobal(Request $request){
        $res_path = resource_path('json_files');
        $fp = $string = file_get_contents($res_path . "/global.json");


        $res = json_decode($fp);
        $rates = json_decode($res->rates);
        $last_rates = json_decode($res->last_rates);

        foreach ($rates as $key => $rate):
            if ((time() - strtotime($rate->updated_at))/60>15) {
                $rates[$key]->updated_at = "-15 minutes";
            }
        endforeach;

        if (!count($last_rates)) {
            $last_rates=$rates;
        }

        return view('coming-global', compact('rates', 'last_rates'));
    }

    public function getLogin(Request $request){
        $all = $request->all();
        $arr = array();
        parse_str($all['formdata'],$arr);

        $user = DB::table('users')->where('email','=',$arr['email'])->first();


        $hasher = new BcryptHasher();

        if (isset($user) && $hasher->check($arr['password'],$user->password)){
            return 0;
        } else {
            return 1;
        }

    }

    public function getReg(Request $request){
        $all = $request->all();
        $arr = array();
        parse_str($all['formdata'],$arr);

        if (!isset($arr['password']) || strlen($arr['password']) < 8) {
            echo trans('lang.password_len');
            die();
        }

        if ($arr['password'] != $arr['password_confirmation']) {
            echo trans('lang.password');
            die();
        }

        $user = DB::table('users')->where('email','=',$arr['email'])->get()->all();

        if (count($user)>0) {
            echo trans('lang.user_exists');
            die();
        }
        echo 1;
        die();
    }

    public function productFilter(Request $request){
        $all = $request->all();
        $all = json_decode($all['filters'], true);

        list($products, $favorites, $query) =$this->filterProductsFront($all,1,$this->productRepository);

        echo view('filtering', compact('products', 'all', 'favorites','query'));
        die();
    }

    public function watchFilter(Request $request){
        $all = $request->all();
        $all = json_decode($all['filters'], true);

        list($products, $favorites, $query) =$this->filterProductsFront($all,4,$this->productRepository);

        //dd($products);
        echo view('filtering', compact('products', 'all', 'favorites','query'));
        die();
    }


    public function servicesFilter(Request $request){
        $all = $request->all();
        $all = json_decode($all['filters'], true);
        list($where, $query) = $this->filterServicesFront($all);



        $role_permission = 1;
        if (Auth::check()){
            $role_id = auth()->user()->role_id;
            if ($role_id !== 4){
                $role_permission = 0;
            }
        }

        $sql = "select `user_infos`.`user_id`, `user_infos`.`title`, `user_infos`.`pictures`, `user_infos`.`market`, `user_infos`.`address`".
            " from `service_user_table`".
            " inner join `user_infos` on `user_infos`.`id` = `service_user_table`.`user_id`".
            " inner join `services` on `services`.`id` = `service_user_table`.`service_id`".
            " where $where `services`.`for_all`='$role_permission' group by `user_infos`.`id`";

        $users = DB::select($sql);

        echo view('filter-service', compact('users', 'query'));
        die();
    }
    public function makeOffer(Request $request) {
        $price=$request->price;
        $product=Product::find($request->product);
        $offer=Offer::where('product_id',$product->id)->where('user_id',Auth::id())->first();

       if(!$offer) {
           $newOffer = new Offer();
           $newOffer->product_id = $product->id;
           $newOffer->price = $price;
           $newOffer->user_id=Auth::id();
           $newOffer->status="pending";
           $newOffer->offer_count = 1;
           $newOffer->save();
//           if(!Auth::user()->offers->contains($newOffer->id)) {
//               Auth::user()->offers()->attach($newOffer->id);
//           }
       }
            if($offer && $offer->offer_count !=3) {
                $offer->offer_count += 1;
                if($offer->offer_count !== 0) {
                    $offer->save();
                }
        } else {
            $offerRes=2;
        }
        return redirect()->back();
        //todo
    }



}
