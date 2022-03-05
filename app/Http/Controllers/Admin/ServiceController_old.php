<?php
namespace App\Http\Controllers\Admin;


use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

class ServiceControllerOld extends Controller
{
//    private $productRepository;
    public function __construct()//ProductRepositoryInterface $productRepository
    {
//        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function index (Request $request)
    {

        //dd($request->user_id);
        $u_id=0;
        if (isset($request->user_id)){
            $u_id=$request->user_id;
        }
        $services = array('Վերանորոգում','Չափսի փոփոխում','Փայլեցում', 'Ոսկեջուր', 'Ռոդիում', 'Ձուլում',
                    'Ժամագործ','Լազերային ստուգում','Հարգորոշում','Քիմիական որոշում','3D մոդելավորում',
                    'Լազերային փորագրություն', 'Մոմերի աճեցում', 'Քարերի տեղադրում');
        //$page=20;
        $user = User::pluck('name','id')->all();
        $lang = app()->getLocale();

        //$data = $this->productRepository->all($lang)->paginate($page);
//        $data = $this->productRepository->all($u_id,$lang)->get();
//        dd($data);
        $breadcrumb = [
            [
                'name' => 'Service',
            ]
        ];

        return view('admin.service.index', compact('services', 'breadcrumb'))
            ->with('i'/*, ($request->input('page', 1) - 1)*/);
    }

    public function create ()
    {

        $metals = Metal::orderBy('id', 'ASC')->pluck('name','id')->all();
        $rates = Rate::orderBy('id', 'DESC')->paginate(20);
        $productType = DB::select('Select name,id,product_global_type from product_types');

        //$productType = ProductType::orderBy('id', 'ASC')->pluck('name','id','product_global_type')->all();
        $city = City::orderBy('id', 'ASC')->pluck('name','id')->all();
        $brand = Brand::orderBy('id', 'ASC')->pluck('name','id')->all();

        $breadcrumb = [
            [
                'name' => 'Product',
                'url' => route('product.index')
            ],
            [
                'name' => 'Create'
            ]
        ];

        $all_data = array(
            'metals' => $metals,
            'rates' => $rates,
            'productType' => $productType,
            'city' => $city,
            'brand' => $brand
        );

        /*foreach($all_data['rates'] as $key=>$rate) {
            echo "<pre>";
            print_r($rate->id);
        }
        dd($all_data);*/
        return view('admin.product.create', compact('all_data', 'breadcrumb'));
    }

    public function store (Request $request, Product $model)
    {


        $this->validate($request, [
            'lang.am.title' => 'required',
            'lang.am.content' => 'required',
            'prod.code' => 'required'
        ]);
        $req_all =  $request->all();
        $langs = $req_all['lang'];
        $prod = $req_all['prod'];

        $prod_path = public_path('/uploads/products');

        $images=array();
        if ($files=$request->file('img')) {
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $ext = pathinfo($name, PATHINFO_EXTENSION);
                $img_name = md5(microtime() . str_replace('.', '', $_SERVER['REMOTE_ADDR']));
                $file->move($prod_path, $img_name . '.' . $ext);
                $images[]= $img_name . '.' . $ext;
            }
        }

        $prod['pictures'] = json_encode($images);
        $prod['user_id'] = auth()->user()->id;

        $model->fill($prod)->save();

        $prod_id =$model->id;
        foreach ($langs as $key => $lang){
            $translation = new ProductTranslation();
            if (!$lang['title'] ){
                $lang['title'] = $langs['am']['title'];
                $lang['content'] = $langs['am']['content'];
            }
            $lang['language'] = $key;
            $lang['product_id'] = $prod_id;
            $translation->fill($lang)->save();
        }


        return redirect()->route('product.index')
            ->with('success', 'Product created successfully');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @param Product $model
     * @param ProductTranslation $translation
     * @return Response
     * @throws ValidationException
     */
    public function update (Request $request, $id, Product $model, ProductTranslation $translation)
    {
        $prod_path = public_path('/uploads/products/');
        if(!$this->productRepository->checkOwner($id))
        {
            return redirect()->route('product.index')
                ->with('error', 'access denied');
        }
        $this->validate($request, [
            'lang.am.title' => 'required',
            'lang.am.content' => 'required',
            'prod.code' => 'required'
        ]);
        $req_all =  $request->all();
        $langs = $req_all['lang'];
        $prod = $req_all['prod'];

        $jsImg = $this->productRepository->getJsonImgs($id);
        $jsArr = json_decode($jsImg->pictures, true);

        if (isset($req_all['dltImg']))
            foreach ($req_all['dltImg'] as $dltImg):
                if ("-1" !== $dltImg) {
                    unlink($prod_path.$jsArr[$dltImg] );
                    unset($jsArr[$dltImg] );
                }

            endforeach;

        if ($files=$request->file('crtImg')) {
            foreach($files as $key=>$file){
                $name=$file->getClientOriginalName();
                $ext = pathinfo($name, PATHINFO_EXTENSION);
                //sleep(1);
                $img_name = md5($key.strtotime("now") . str_replace('.', '', $_SERVER['REMOTE_ADDR']));
                $file->move($prod_path, $img_name . '.' . $ext);
                array_push($jsArr, $img_name . '.' . $ext );
            }
        }


        foreach ($langs as $key => $lang){

            if (!$lang['title'] ){
                $lang['title'] = $langs['am']['title'];
                $lang['content'] = $langs['am']['content'];
            }
            $translation
                ->where('product_id', '=', $id)
                ->where('language', '=', $key)
                ->update($lang);

        }
        $prod['pictures'] = json_encode($jsArr);

        $model->findOrFail($id)->fill($prod)->save();

        return redirect()->route('product.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit ($id)
    {

        if(!$this->productRepository->checkOwner($id)) {
            return redirect()->route('product.index')
                ->with('error', 'access denied');
        }
        $products = $this->productRepository->getByProductID($id, 'all')->get()->keyBy('lang');


        $metals = Metal::orderBy('id', 'ASC')->pluck('name','id')->all();

//        $productType_filter = ProductType::orderBy('id', 'ASC')->pluck('product_global_type','name')->all();
        $city = City::orderBy('id', 'ASC')->pluck('name','id')->all();
        $brand = Brand::orderBy('id', 'ASC')->pluck('name','id')->all();
        $rates = Rate::orderBy('id', 'DESC')->paginate(20);
        $def_lng = env('APP_DEFAULT_LANG');
        $product = $products[$def_lng];
        $product->pictures = json_decode($product->pictures);


        $productType = ProductType::orderBy('id', 'ASC')->where('product_global_type', '=', $product->product_global_type)->pluck('name','id')->all();


        $breadcrumb = [
            [
                'name' => 'Product',
                'url' => route('product.index')
            ],
            [
                'name' => 'Edit'
            ]
        ];
        $all_data = array(
            'metals' => $metals,
            'productType' => $productType,
            'city' => $city,
            'brand' => $brand,
            'rates' => $rates
        );


        return view('admin.product.edit', compact('products', 'product', 'breadcrumb', 'all_data'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show ($id)
    {
        $Product = Product::find($id);

        $breadcrumb = [
            [
                'name' => 'Product',
                'url' => route('product.index')
            ],
            [
                'name' => 'Show'
            ]
        ];

        return view('admin.Product.show', compact('Product', 'breadcrumb'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy ($id)
    {
        if(!$this->productRepository->checkOwner($id))
        {
            return redirect()->route('product.index')
                ->with('error', 'access denied');
        }
        Product::find($id)->delete();
        return redirect()->route('product.index')
            ->with('success', 'Product deleted successfully');




    }

}
