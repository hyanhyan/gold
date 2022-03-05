<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\MainController;
use App\Offer;
use App\Product;
use App\ProductOffer;
use App\Rate;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\UserInfo;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends MainController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $productRepository;
    private $fav;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        parent::__construct();
        $this->productRepository = $productRepository;
        $user = auth()->user();
        if (isset($user->id)){
            $this->fav = $user->favorites()->get(['product_id'])->pluck('product_id')->toArray();
        } else {
            $this->fav = [];
        }
    }

    /**
     * Show the application dashboard.
     *
     * @param $id
     * @return Renderable
     */
    public function index($id)
    {
        $services = $this->services;
        $info = UserInfo::findOrFail($id);
        $lang = app()->getLocale();
        $info->messengers = json_decode($info['messengers'], true);
        $products = $this->productRepository->allForFront($lang,$info->user_id)->get();
        foreach ($products as $key =>$product){
            $products[$key]->pictures = json_decode($product->pictures, true);

        }

        $products = collect($products)->sortBy('id')->reverse();
//dd($products);
        $favorites = $this->fav;

        return view('user.index', compact('services','products', 'info', 'favorites'));
    }
    public function my_account(){
        return view('user.account');
    }
    public function view_offer() {
        $info=$this->info;
        $products=Product::with('offers','users')->where('user_id',Auth::id())->get();
//        foreach ($offers as $offer) {
//            $id=$offer->product_id;
//            $product=Product::where('id',$id)->first();
//            dd($product);
//        }
        return view('user.my_offers',compact('products',$products,'info'));
    }
    public function acceptOffer(Request $request)
    {
        $offer=Offer::findOrFail($request->id);
        $offer->status="accepted";
        $offer->save();
        return response()->json($offer);

    }
    public function refuseOffer(Request $request)
    {
        $offer=Offer::findOrFail($request->id);
        $offer->status="pending";
        $offer->offer_count--;
        $offer->save();
        return response()->json($offer);

    }
    public function privacy() {
        $info=$this->info;
        $breadcrumb = [
            [
                'name' => 'About Us',
            ],
        ];
        return view('privacy.privacy',compact('breadcrumb', 'info'));

    }
}
