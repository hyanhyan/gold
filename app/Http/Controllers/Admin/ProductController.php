<?php

namespace App\Http\Controllers\Admin;

use App\ProductTranslation;
use App\Rate;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Stones;
use App\User;
use App\UserInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Metal;
use App\ProductType;
use App\City;
use App\Brand;
use App\Message;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

class ProductController extends MainController
{
    private $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
        parent::__construct();
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

        $info = $this->info;
        $u_id = Auth::id();
        //$page=20;
        $user = User::pluck('name','id')->all();
        $lang = app()->getLocale();
        //$data = $this->productRepository->all($lang)->paginate($page);
        $data = $this->productRepository->all($u_id)->get();
        foreach ($data as $key => $pr):

            $data[$key]->pictures = json_decode($pr->pictures, true);
        endforeach;

//        if(Auth::user()->hasRole('Admin')) {
//            $data = Product::where('status' === "accepted")->get();
//        }
        $breadcrumb = [
            [
                'name' => 'Pictures',
            ]
        ];

        return view('admin.product.index', compact('data', 'user', 'breadcrumb','info'))->with('i'/*, ($request->input('page', 1) - 1)*/);
    }

    public function create ()
    {
        $info = $this->info;
        if(count((array)$info) === 1) {
            return redirect()->route('admin.about')->withErrors(['errors' => 'The Message']);
        }
        $metals = Metal::orderBy('id', 'ASC')->pluck('name','id')->all();
        $rates = Rate::orderBy('id', 'DESC')->paginate(20);
        $productType = DB::select('Select name,id,product_global_type,product_permission from product_types');
//        $userID = auth()->user()->id;
//        $info = UserInfo::where('user_id', '=', $userID)->first();

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
//dd($info);
        $all_data = array(
            'metals' => $metals,
            'rates' => $rates,
            'productType' => $productType,
            'city' => $city,
            'info' => $info,
            'brand' => $brand
        );

        /*foreach($all_data['rates'] as $key=>$rate) {
            echo "<pre>";
            print_r($rate->id);
        }
        dd($all_data);*/
        return view('admin.product.create', compact('all_data', 'breadcrumb','info'));
    }

    public function copy (Request $request)
    {
        $info = $this->info;
        $id = $request->all()['prod'];

        if(!$this->productRepository->checkOwner($id)) {
            return redirect()->route('product.index')
                ->with('error', 'access denied');
        }
        $products = $this->productRepository->getByProductID($id, 'all')->get()->keyBy('lang');


        $metals = Metal::orderBy('id', 'ASC')->pluck('name','id')->all();

        $stones = Stones::where('product_id', $id)->get()->toArray();


//        $productType_filter = ProductType::orderBy('id', 'ASC')->pluck('product_global_type','name')->all();
        $city = City::orderBy('id', 'ASC')->pluck('name','id')->all();
        $brand = Brand::orderBy('id', 'ASC')->pluck('name','id')->all();
        $rates = Rate::orderBy('id', 'DESC')->paginate(20);
        $def_lng = env('APP_DEFAULT_LANG');
        $product = $products[$def_lng];
        $product->pictures = json_decode($product->pictures);


        $productType = ProductType::orderBy('id', 'ASC')->where('product_global_type', '=', $product->product_global_type)->pluck('name','id')->all();
        $info = UserInfo::where('user_id', '=', $userID = auth()->user()->id)->first();

        $breadcrumb = [
            [
                'name' => 'Product',
                'url' => route('product.index')
            ],
            [
                'name' => 'Edit'
            ]
        ];
        $product->addresses = json_decode($product->addresses, true);
        $product->videoEmbed = "";
        if($product->videoURL!='') {
            $product->videoEmbed = "https://www.youtube.com/embed/".$product->videoURL;
        }

        $all_data = array(
            'metals' => $metals,
            'productType' => $productType,
            'city' => $city,
            'brand' => $brand,
            'info' => $info,
            'rates' => $rates,
            'stones' => $stones
        );
        $copyID = $id;

        return view('admin.product.copy', compact('products', 'product', 'breadcrumb', 'all_data', 'copyID','info'));
    }

    public function store (Request $request, Product $model)
    {
        $info = $this->info;

        $this->validate($request, [
            'lang.am.title' => 'required',
//            'prod.code' => 'required'
        ]);
        $req_all =  $request->all();

        if ($req_all["prod"]["videoURL"]==null){
            $req_all["prod"]["videoURL"] = "";
        }

        if (isset($req_all['fake'])){
            $req_all['prod']['price'] = 0;
            $req_all['prod']['weight'] = 0;
            $req_all['prod']['code'] = 0;
            $req_all['prod']['metal_id'] = 1;
            $req_all['prod']['product_type_id'] = 1;
        }

        $langs = $req_all['lang'];
        $prod = $req_all['prod'];
        //dd($prod);
        //dd($req_all);
        $prod_path = public_path('/uploads/products');
        $threeD_path = public_path('/uploads/3DImages/');
        if (isset($prod['addresses'])){
            $prod['addresses'] = json_encode($prod['addresses'], JSON_FORCE_OBJECT);
        }
        if (isset($req_all['copyID'])){
            $jsImg = $this->productRepository->getJsonImgs($req_all['copyID']);
            $images = json_decode($jsImg->pictures, true);
        } else {
            $images=array();
        }

        if ($file=$request->file('crtImg1')) {
            $name=$file->getClientOriginalName();
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            //sleep(1);
            $img_name = md5('0'.strtotime("now") . str_replace('.', '', $_SERVER['REMOTE_ADDR']).'1');
            $file->move($prod_path, $img_name . '.' . $ext);
            $images[0]['img_name'] = $img_name . '.' . $ext;
            $images[0]['img_status'] = "pending";
        }

        if ($file=$request->file('crtImg2')) {
            $name=$file->getClientOriginalName();
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            //sleep(1);
            $img_name = md5('1'.strtotime("now") . str_replace('.', '', $_SERVER['REMOTE_ADDR']).'2');
            $file->move($prod_path, $img_name . '.' . $ext);
            $images[1]['img_name'] = $img_name . '.' . $ext;
            $images[1]['img_status'] = "pending";
        }

        if ($file=$request->file('crtImg3')) {
            $name=$file->getClientOriginalName();
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            //sleep(1);
            $img_name = md5('2'.strtotime("now") . str_replace('.', '', $_SERVER['REMOTE_ADDR']).'3');
            $file->move($prod_path, $img_name . '.' . $ext);
            $images[2]['img_name'] = $img_name . '.' . $ext;
            $images[2]['img_status'] = "pending";
        }

        for ($i=0; $i<3; $i++) {
            if(!isset($images[$i])){
                $images[$i]='jewellery-default.png';
            }
        }



        $images = (object)$images;

        $prod['pictures'] = json_encode($images);



        $prod['user_id'] = auth()->user()->id;

        $model->fill($prod)->save();

        $prod_id =$model->id;



        if ($three_files = $request->file('crtImg3D')){
            $img3D_path = $threeD_path . $prod['code'] . $prod_id;
            if (!file_exists($img3D_path)) {
                if (!mkdir($img3D_path)) dd('something wrong! folder $img3D_path cannot create');
            }

            foreach ($three_files as $three_file){
                $threeD_name=$three_file->getClientOriginalName();
                $three_file->move($img3D_path, $threeD_name);
            }
        }





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

        $this->insertStones($req_all, $prod_id);

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
    public function update (Request $request, int $id, Product $model, ProductTranslation $translation)
    {
        $info = $this->info;
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
        $product=Product::where('code',$prod['code'])->first();

        $message=Message::where('product_id',$product->id)->first();

        if (isset($prod['addresses'])){
            $prod['addresses'] = json_encode($prod['addresses'], JSON_FORCE_OBJECT);
        }
        $jsImg = $this->productRepository->getJsonImgs($id);
        $jsArr = json_decode($jsImg->pictures, true);



        $threeD_path = public_path('/uploads/3DImages/');
        if ($three_files = $request->file('crtImg3D')){
            $img3D_path = $threeD_path . $prod['code'] . $id ;
            //remove all images
            array_map( 'unlink', array_filter((array) glob($img3D_path . '/*') ) );
            //add new images
            foreach ($three_files as $three_file){
                $threeD_name=$three_file->getClientOriginalName();
                $three_file->move($img3D_path, $threeD_name);
            }
        }


        if ($file=$request->file('crtImg1')) {
            $name=$file->getClientOriginalName();
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            //sleep(1);
            $img_name = md5('0'.strtotime("now") . str_replace('.', '', $_SERVER['REMOTE_ADDR']).'1');
            $file->move($prod_path, $img_name . '.' . $ext);
            $jsArr[0]['img_name']=$img_name . '.' . $ext;
            if($message && $message->image !== $jsArr[0]['img_name']) {
                $product=Product::where('id',$message->product_id)->first();
                $product->status="";
                $product->save();
            }
            $jsArr[0]['img_status'] = "pending";
        }

        if ($file=$request->file('crtImg2')) {
            $name=$file->getClientOriginalName();
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            //sleep(1);
            $img_name = md5('1'.strtotime("now") . str_replace('.', '', $_SERVER['REMOTE_ADDR']).'2');
            $file->move($prod_path, $img_name . '.' . $ext);

            $jsArr[1]['img_name']=$img_name . '.' . $ext;
            if($message && $message->image !== $jsArr[1]['img_name']) {
                $product=Product::where('id',$message->product_id)->first();
                $product->status="";
                $product->save();
            }
            $jsArr[1]['img_status'] = "pending";        }

        if ($file=$request->file('crtImg3')) {
            $name=$file->getClientOriginalName();
            $ext = pathinfo($name, PATHINFO_EXTENSION);
            //sleep(1);
            $img_name = md5('2'.strtotime("now") . str_replace('.', '', $_SERVER['REMOTE_ADDR']).'3');
            $file->move($prod_path, $img_name . '.' . $ext);
            $jsArr[2]['img_name']=$img_name . '.' . $ext;
            if($message && $message->image !== $jsArr[2]['img_name']) {
                $product=Product::where('id',$message->product_id)->first();
                $product->status="";
                $product->save();
            }
            $jsArr[2]['img_status'] = "pending";
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
        for ($i=0; $i<3; $i++) {
            if(!isset($jsArr[$i])){
                $jsArr[$i]='jewellery-default.png';
            }
        }

        $arrImage = array();
        foreach ($jsArr as $jsImage){
            array_push($arrImage,$jsImage);
        }
        $arrImage = (object)$arrImage;
        //dd($arrImage);


        $prod['pictures'] = json_encode($arrImage,true);
        //dd($prod['pictures']);

        $model->findOrFail($id)->fill($prod)->save();


        $this->insertStones($req_all, $id);


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

        $info = $this->info;

        if(!$this->productRepository->checkOwner($id)) {
            return redirect()->route('product.index')
                ->with('error', 'access denied');
        }
        $products = $this->productRepository->getByProductID($id, 'all')->get()->keyBy('lang');


        $metals = Metal::orderBy('id', 'ASC')->pluck('name','id')->all();

        $stones = Stones::where('product_id', $id)->get()->toArray();


//        $productType_filter = ProductType::orderBy('id', 'ASC')->pluck('product_global_type','name')->all();
        $city = City::orderBy('id', 'ASC')->pluck('name','id')->all();
        $brand = Brand::orderBy('id', 'ASC')->pluck('name','id')->all();
        $rates = Rate::orderBy('id', 'DESC')->paginate(20);
        $def_lng = env('APP_DEFAULT_LANG');

        $product = $products[$def_lng];

        $product->pictures = json_decode($product->pictures);


        $productType = ProductType::orderBy('id', 'ASC')->where('product_global_type', '=', $product->product_global_type)->pluck('name','id')->all();
        $info = UserInfo::where('user_id', '=', $userID = auth()->user()->id)->first();

        $breadcrumb = [
            [
                'name' => 'Product',
                'url' => route('product.index')
            ],
            [
                'name' => 'Edit'
            ]
        ];
        $product->addresses = json_decode($product->addresses, true);

        //dd($product->videoURL);
        $product->videoEmbed = "";
        if($product->videoURL!='') {
            $product->videoEmbed = "https://www.youtube.com/embed/".$product->videoURL;
        }

        $all_data = array(
            'metals' => $metals,
            'productType' => $productType,
            'city' => $city,
            'brand' => $brand,
            'info' => $info,
            'rates' => $rates,
            'stones' => $stones
        );


        return view('admin.product.edit', compact('products', 'product', 'breadcrumb', 'all_data','info'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show ($id)
    {
        $info = $this->info;
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

        return view('admin.Product.show', compact('Product', 'breadcrumb','info'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function delete (Request $request)
    {
        if(!$this->productRepository->checkOwner($request->id))
        {
            return redirect()->route('product.index')
                ->with('error', 'access denied');
        }
        $user=User::where('id',$request->to_id)->first();
        $message=new Message();
        $message->to_id=$user->id;
        $message->image=$request->img;
        $message->product_id=$request->id;
        $message->user_id=Auth::id();
        $message->message=$request->message;
        $message->save();
        Product::find($request->id)->delete();

        return redirect()->route('product.index')
            ->with('success', 'Product deleted successfully');


    }

    /**
     * @param array $reqStones
     * @param int $id
     */
    public function insertStones(array $reqStones, int $id): void
    {

        Stones::where('product_id', $id)->delete();
        if (isset($reqStones['stone']['name']) ) {
            $stones = $reqStones['stone'];
            $stonePcs = count($stones['name']);
            for ($i = 0; $i < $stonePcs - 1; $i++) {
                $stoneModel = new Stones();
                $stone['stone_name'] = $stones['name'][$i];
                $stone['carat'] = $stones['carat'][$i];
                $stone['pcs'] = $stones['pcs'][$i];
                $stone['color'] = $stones['color'][$i];
                $stone['clarity'] = $stones['clarity'][$i];
                $stone['cut'] = $stones['cut'][$i];
                $stone['product_id'] = $id;
                $stoneModel->fill($stone)->save();
            }
        }
    }
//    public function pictures(Request $request) {
//
//            $info = $this->info;
//            $u_id = Auth::id();
//            //$page=20;
//            $user = User::pluck('name','id')->all();
//            $lang = app()->getLocale();
//            //$data = $this->productRepository->all($lang)->paginate($page);
//            $data = $this->productRepository->all($u_id,$lang)->where('status','accepted')->get();
//            $breadcrumb = [
//                [
//                    'name' => 'Pictures',
//                ]
//            ];
////        $products=Product::where('status','accepted')->get();
//            return view('admin.pictures.pictures', compact('data', 'user', 'breadcrumb','info'))
//                ->with('i'/*, ($request->input('page', 1) - 1)*/);
//
//
//     }
    public function active() {
        $info = $this->info;
        //$page=20;
        $user = User::pluck('name','id')->all();
        $lang = app()->getLocale();
        $types=ProductType::all();
        $data = Product::where('status','accepted')->orderBy('user_id')->get();
        $breadcrumb = [
            [
                'name' => 'Active pictures',
            ]
        ];
        return view('admin.pictures.pictures', compact('data', 'types', 'user', 'breadcrumb','info'))
            ->with('i'/*, ($request->input('page', 1) - 1)*/);
    }

    public function accept (Request $request)
    {
        if(!$this->productRepository->checkOwner($request->id))
        {
            return redirect()->route('product.index')
                ->with('error', 'access denied');
        }
        $product = Product::find($request->id);
        $product->status = "accepted";
        $product->save();
        return response()->json($product);

    }
    public function decline (Request $request)
    {
        $product = Product::find($request->id);
        $product->status="pending";
        $product->update();
        $user=User::where('id',$request->to_id)->first();
        $message=new Message();
        $message->to_id=$user->id;
        $message->product_id=$request->id;
        $message->user_id=Auth::id();
        $message->message=$request->message;
        $message->save();
        $product->update(['pictures' => null]);
        return response()->json($product);

    }
    public function selectType(Request $request){
        $info = $this->info;
        $products = Product::where('product_type_id', $request->id)->where('user_id',$request->user_id)->get();
        foreach ($products as $key => $product)
            if(!isset($products[$key]->pictures)){
                $products[$key]->pictures=null;
            }
        $pictures=json_decode($products[$key]->pictures);
        return response()->json($pictures);
    }
    public function selectTypeAll(Request $request){
        $info = $this->info;
        $products = Product::where('product_type_id', $request->id)->where('user_id',$request->user_id)->get();
        foreach ($products as $key => $product)
        if(!isset($products[$key]->pictures)){
                $products[$key]->pictures='jewellery-default.png';
            }
        $pictures=json_decode($product->pictures);
        return response()->json($pictures);
    }
    public function type (Request $request) {
        $info = $this->info;
        $user=User::find($request->user_id);
        $products = Product::where('product_type_id', $request->id)->where('user_id',$request->user_id)->get();
        foreach ($products as $key => $product)
              if(!isset($products[$key]->pictures)){
                $products[$key]->pictures='jewellery-default.png';
            }
        $types=ProductType::all();
        $pictures=json_decode($products[$key]->pictures);
        $product=Product::find($request->product_id);
        return view('admin.pictures.all-pics',compact('info','types','user','product','products'));
    }
    public function deletePicture (Request $request){
        $product=Product::find($request->id);
        $key_prod = json_decode($product->pictures, true);
        foreach ($key_prod as $key=> $picture) {
            if ($picture['img_name'] === $request->img) {
                $key_prod[$key]['img_status'] = "declined";
            }
        }

        $product->pictures = json_encode($key_prod);
        $product->status="pending";
        $product->update();
        $user=User::where('id',$request->to_id)->first();
        $message=new Message();
        $message->to_id=$user->id;
        $message->image=$request->img;
        $message->product_id=$request->product_id;
        $message->user_id=Auth::id();
        $message->message=$request->message;
        $message->save();
        return redirect()->back();
    }
}
