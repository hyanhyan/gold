<?php

namespace App\Http\Controllers;

use App\Rate;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Product as Product;



class FavoriteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        parent::__construct();
        $this->productRepository = $productRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

//        dd(123456);

//        $lang = app()->getLocale();
//
//        $favorites = Favorite::orderBy('id', 'DESC')->paginate(20);
        $user = auth()->user();
        $lang = app()->getLocale();
        $favorites = $user->favorites()->get(['product_id'])->pluck('product_id')->toArray();
        $fav_prods =$this->productRepository->getFavoriteProductsByIDs($favorites,$lang)->get();
//dd($fav_prods);
        foreach ($fav_prods as $key => $fav_prod):
            $fav_prods[$key]->pictures = isset(json_decode($fav_prod->pictures, true)[0]) ? json_decode($fav_prod->pictures, true)[0] : "";
        endforeach;

        $services = $this->services;
        return view('favorite', compact('fav_prods', 'services'));
    }


}
