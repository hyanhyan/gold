<?php

namespace App\Http\Controllers;

use App\Offer;
use App\Product;

use App\Rate;
use App\Stones;
use App\UserInfo;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    private $productRepository;
    protected $fav;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        parent::__construct();
        $this->productRepository = $productRepository;
        $user = auth()->user();
        //dd($user);
        if (isset($user->id)){
            $this->fav = $user->favorites()->get(['product_id'])->pluck('product_id')->toArray();
        } else {
            $this->fav = [];
        }

    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $all = $request->all();

        list($products, $favorites) = $this->filterProductsFront($all,1, $this->productRepository);
        $services = $this->services;
        $productStones=Stones::all();
        $productFineness=Rate::all();
        $productType = DB::select('Select name,id,product_global_type,product_permission from product_types where product_global_type = 1');
        return view('products.index', compact('products', 'favorites', 'services', 'productType','productStones','productFineness'));
    }

    public function watch(Request $request)
    {
        $all = $request->all();

        list($products, $favorites) = $this->filterProductsFront($all,4, $this->productRepository);

        $services = $this->services;

        $productType = DB::select('Select name,id,product_global_type,product_permission from product_types where product_global_type = 4');

        return view('products.watch', compact('products', 'favorites', 'services', 'productType'));
    }


    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param string $id
     * @return void
     */
    public function show(Request $request,string $id)
    {

        $services = $this->services;
        if (!$request->session()->has($id)) {
            $request->session()->put($id, true);
            $request->session()->save();
            $this->productRepository->updateClickCount($id);
        }
        $lang = app()->getLocale();
//        $product = $this->productRepository->getByProductID($id, $lang)->first();
      $product = $this->productRepository->getByProductID($id)->first();


        $prodCat = $this->productRepository->allForFront($lang,0,$product->product_type_id)->get();

        $prodCat = $prodCat->random(min($prodCat->count(), 10));
        foreach ($prodCat as $key => $pr):

            $prodCat[$key]->pictures = json_decode($pr->pictures, true);
        endforeach;

        $product->pictures = json_decode($product->pictures, true);
        $stones = Stones::where('product_id', $id)->get()->toArray();

        $info = UserInfo::where('user_id', '=', $product->user_id)->first();

        $info['messengers'] = json_decode($info['messengers'], true);
        $product->address = json_decode($product->addresses,true);
        //dd(json_decode($product->addresses,true));
        $userProducts = $this->productRepository->allForFront($lang,$product->user_id,0)->get();
        $userProducts=$userProducts->random(min($userProducts->count(), 10));
        $offer=Offer::where('product_id',$product->id)->where('user_id',Auth::id())->first();

        //dd($userProducts);
        foreach ($userProducts as $key => $pr):
            $userProducts[$key]->pictures = json_decode($pr->pictures, true);
        endforeach;

        $favorites = $this->fav;

        return view('products.item', compact('product','stones','info','userProducts','prodCat', 'favorites', 'services','offer'));
    }

    public function search(Request $request){
        $all = $request->all();

        list($products, $favorites) = $this->filterProductsFront($all,1, $this->productRepository);
        $services = $this->services;

        $productType = DB::select('Select name,id,product_global_type,product_permission from product_types where product_global_type = 1');
        return view('products.index', compact('products', 'favorites', 'services', 'productType'));
    }

    public function addedProducts($id){
        $lang = app()->getLocale();
//        $product = $this->productRepository->getByProductID($id, $lang)->first();
        $product = $this->productRepository->getByProductID($id)->first();
        $info = UserInfo::where('user_id', '=', $product->user_id)->first();
        $userProducts = $this->productRepository->allForFront($lang,$product->user_id,0,)->get();
        $userProducts=$userProducts->random(min($userProducts->count(), 10));
        return view('products.addedProducts',compact('userProducts','info'));
    }
    public function mostView($id){
        $lang = app()->getLocale();
//        $product = $this->productRepository->getByProductID($id, $lang)->first();
        $product = $this->productRepository->getByProductID($id)->first();
        $info = UserInfo::where('user_id', '=', $product->user_id)->first();
        $prodCat = $this->productRepository->allForFront($lang,0,$product->product_type_id)->get();
        $prodCat = $prodCat->random(min($prodCat->count(), 10));
        foreach ($prodCat as $key => $pr):
            $prodCat[$key]->pictures = json_decode($pr->pictures, true);
        endforeach;
        return view('products.mostViewd',compact('prodCat','info'));
    }
}
