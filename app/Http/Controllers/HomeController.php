<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Rate;
use App\RateHistory;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Product as Product;
use App\Service;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
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
        $rates = Rate::orderBy('id', 'DESC')->paginate(20);
        $services = $this->services;


//        $lang = app()->getLocale();
        $product = Product::orderBy('id', 'DESC')->limit(15)->get();
        $click_count = Product::orderBy('click_count', 'DESC')->limit(15)->get();
        $cities = City::all();
        $countries=Country::all();

//        foreach ($product as $key => $pr):
//            $product[$key]->pictures = json_decode($pr->pictures, true)[0];
//        endforeach;

        foreach ($click_count as $key_click => $click):
            if ($click->pictures != null) {
                $click_count[$key_click]->pictures = json_decode($click->pictures, true)[0];
        }
        endforeach;

        return view('home', compact('rates', 'services', 'product', 'click_count','countries','cities'));
    }
    public function allRegions() {
        return view('all-regions');
    }
    public function added() {
        $product = Product::orderBy('id', 'DESC')->limit(15)->get();

        foreach ($product as $key => $pr):
            $product[$key]->pictures = json_decode($pr->pictures, true)[0];
        endforeach;
        return view('added',compact('product'));
    }
    public function viewd() {
        $click_count = Product::orderBy('click_count', 'DESC')->limit(15)->get();

        foreach ($click_count as $key_click => $click):
            if ($click->pictures != null) {
                $click_count[$key_click]->pictures = json_decode($click->pictures, true)[0];
            }
        endforeach;
        return view('viewd',compact('click_count'));
    }

}
