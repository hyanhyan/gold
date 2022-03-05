<?php

namespace App\Http\Controllers;



use App\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Renderable;

class FakeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $services = $this->services;
        $lang = app()->getLocale();
        $products = $this->productRepository->allForFront($lang,0,0,1)->get();
        foreach ($products as $key => $picture):
            $products[$key]->pictures = json_decode($picture->pictures, true)[0];
        endforeach;
        //dd($products);
        return view('fakes.index', compact('services','products'));
    }
    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param string $id
     * @return Renderable
     */
    public function show(Request $request, string $id)
    {
        $services = $this->services;
        $lang = app()->getLocale();
        $fake = $this->productRepository->getByProductID($id, $lang, 1)->first();
        $fake->pictures = json_decode($fake->pictures, true);

        return view('fakes.item', compact('services', 'fake'));
    }

}
