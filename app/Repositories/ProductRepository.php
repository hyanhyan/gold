<?php

    namespace App\Repositories;

    use App\Repositories\Interfaces\ProductRepositoryInterface;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;
    use function Sodium\increment;


    class ProductRepository implements ProductRepositoryInterface
    {

        private function getUserRole($id){
            return DB::table('users')->where('users.id','=', $id)->select('users.role_id')->first()->role_id;
        }
        public function all($u_id,$lang='am'){

            return DB::table('products')
                ->join('product_translations','product_translations.product_id','=','products.id')
                ->join('metals','metals.id','=','products.metal_id')
                ->join('rates','rates.id', '=','products.rate_id')
                ->join('product_types','product_types.id','=','products.product_type_id')
                ->where('product_translations.language','=',$lang)
                ->where(function($q) use ($u_id) {
                    if (1 !== $this->getUserRole($u_id))
                        $q->where('products.user_id','=', $u_id);

                })
//                ->where('product_translations.published', 1)
//                ->groupBy('product_types.product_global_type')
                ->orderBy('products.order_id')
                ->orderBy('products.id')
                ->select('products.id','products.color', 'products.fake', 'products.belt_type', 'products.user_id', 'products.weight','products.pictures','products.code', 'product_translations.title',
                    'products.price as price', 'metals.name as metal_name','rates.purity as rate_purity','products.status',
                    'products.published', 'products.loc_glob', 'products.m_w_c',
                    'product_types.product_global_type as product_global_type','product_types.name as product_type', 'product_types.product_global_name as product_global_name');
        }

        public function allForFront($lang='am', $u_id=0, $cat_id=0, $fake_flag = 0){

            return DB::table('products')
                ->join('product_translations','product_translations.product_id','=','products.id')
                ->join('metals','metals.id','=','products.metal_id')
                ->join('product_types','product_types.id','=','products.product_type_id')
                ->where('product_translations.language','=',$lang)
                ->where(function($q) use ($u_id) {
                    if (!!$u_id)
                        $q->where('products.user_id','=', $u_id);

                })
                ->where(function($q) use ($fake_flag) {
                        $q->where('products.fake','=', $fake_flag);

                })
                ->where(function($q) use ($cat_id) {
                    if (!!$cat_id)
                        $q->where('products.product_type_id','=', $cat_id);
                })
//                ->where('product_translations.published', 1)
//                ->groupBy('product_types.product_global_type')
                ->orderBy('products.order_id')
                ->orderBy('products.id')
                ->select('products.id', 'products.fake', 'products.belt_type', 'products.weight', 'products.pictures', 'products.code', 'product_translations.title','product_translations.content',
                    'products.price as price','metals.name as metal_name',
                    'products.published', 'products.loc_glob', 'products.m_w_c',
                    'product_types.product_global_type as product_global_type', 'product_types.product_global_name as product_global_name');
        }

        public function getFavoriteProductsByIDs($ids,$lang='am'){
            return DB::table('products')
                ->join('product_translations','product_translations.product_id','=','products.id')
                ->whereIn('products.id',$ids)
                ->where(function($q) use ($lang){
                    if ('all' !== $lang) $q->where('product_translations.language','=',$lang);
                })
//                ->where('product_translations.published', 1)
//                ->groupBy('product_types.product_global_type')
                ->select('products.id', 'products.fake', 'products.belt_type', 'products.pictures', 'product_translations.language as lang',
                    'product_translations.title', 'product_translations.content','products.price as price');
        }

        public function getByProductID($id, $lang = 'am', $fake_flag = 0)
        {
            return DB::table('products')
                ->join('product_translations','product_translations.product_id','=','products.id')
                ->join('rates','rates.id', '=','products.rate_id')
                ->join('metals','metals.id','=','products.metal_id')
                ->join('product_types','product_types.id','=','products.product_type_id')
                ->where('products.id','=',$id)
                ->where(function($q) use ($fake_flag) {
                    $q->where('products.fake','=', $fake_flag);
                })
                ->where(function($q) use ($lang){
                    if ('all' !== $lang) $q->where('product_translations.language','=',$lang);
                })
//                ->where('product_translations.published', 1)
//                ->groupBy('product_types.product_global_type')
                ->orderBy('products.order_id')
                ->select('products.id', 'products.fake', 'products.belt_type', 'products.user_id', 'products.addresses', 'products.weight', 'products.videoURL', 'products.color', 'products.used', 'products.addresses', 'products.code', 'products.pictures', 'product_translations.language as lang', 'product_translations.title', 'product_translations.content',
                    'products.price as price', 'metals.id as metal_id', 'products.rate_id','rates.purity as rate_purity', 'metals.name as metal_name',
                    'products.published', 'products.loc_glob', 'products.m_w_c',
                    'product_types.id as product_type_id', 'product_types.product_global_type as product_global_type', 'product_types.product_global_name as product_global_name');
        }


        public function updateOrdering($productID,$orderID)
        {
            $userID = auth()->user()->id;
            DB::table('products')
                ->where('id','=', $productID)
                ->where('user_id','=', $userID)
                ->update(array('order_id' => $orderID));
        }

        public function checkOwner(int $productID)
        {
            $userID = auth()->user()->id;
            return DB::table('products')
                ->where(function($q) use ($userID) {
                    if (isset(Auth::user()->id) && !Auth::user()->hasRole('Admin')) $q->where('products.user_id','=', $userID);
                })
                ->where('products.id','=',$productID)
                ->select( "id")->get()->count();
        }


        public function updateClickCount(int $productID){
            DB::table('products')
                ->where('id','=', $productID)
                ->update(array('click_count' => DB::raw('click_count+1')));
        }

        public function deleteImage($imgKey){

            return $imgKey . ' I am working from model';
        }

        public function getJsonImgs(int $productID)
        {
            return DB::table('products')
                ->where('products.id','=',$productID)
                ->select( "pictures")->first();
        }

        public function getProductsByFilter(string $filter, int $prGlobalType, string $lang='am')
        {
            $sql = "select `products`.`id`, `products`.`fake`, `products`.`belt_type`, `products`.`weight`, `products`.`status`, `products`.`pictures`,".
                    " `products`.`code`, `product_translations`.`title`, `product_translations`.`content`, `products`.`price` as `price`,".
                   " `metals`.`name` as `metal_name`, `products`.`published`, `products`.`loc_glob`, `products`.`m_w_c`,".
                   " `product_types`.`product_global_type` as `product_global_type`, `product_types`.`product_global_name` as `product_global_name`".
                    " from `products`".
                     " inner join `product_translations` on `product_translations`.`product_id` = `products`.`id`".
                     " inner join `metals` on `metals`.`id` = `products`.`metal_id`".
                     " inner join `user_infos` on `user_infos`.`user_id` = `products`.`user_id`".
                     " inner join `product_types` on `product_types`.`id` = `products`.`product_type_id`".
                     " where $filter `product_types`.`product_global_type` = '$prGlobalType' and `product_translations`.`language` = '$lang' order by `products`.`order_id` asc, `products`.`id` asc";

            //dd($sql);
           return DB::select($sql);

        }
    }
