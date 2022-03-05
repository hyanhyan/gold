<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Service;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $services;
    private $productRepository;
    public function __construct(){
        $this->services = Service::pluck('name', 'id')->all();
    }
    /**
     * @param $value
     * @param string $key
     * @param string $whereReq
     * @return string
     */
    private function minMax($value, string $key, string $whereReq)
    {
        $value = trim($value , '[]');
        $value = explode(",", $value);
//        dd($value);
        $min = $value[0];
        $minWhere = "`products`.`$key` >= '$min' and";
        if ($min == "") {
            $minWhere = "";
        }
        $max = $value[1];
        $maxWhere = "`products`.`$key` <= '$max'";
        if ($max == "") {
            $minWhere = rtrim($minWhere, "and");
            $maxWhere = "";
        }
        $whereReq .= " $minWhere $maxWhere and";
        return  $whereReq;
    }

    /**
     * @param array $all
     * @return array
     */
    public function filterServicesFront(array $all): array
    {

        $whereReq = "";
        $query = "";
        foreach ($all as $key => $value) {
            $tableName = 'service_user_table';
            if ($key == "market") {
                $tableName = 'user_infos';
            }
            if (empty($value)) {
                continue;
            }
            if (is_array($value)) {
                $query .= $key . '=[';

                if (count($value) > 1) {
                    $whereReq.="(";
                }
                foreach ($value as $el) {
                    $query .= "\"$el\"" . ",";
                    $whereReq .= " `$tableName`.`$key` = '$el' or";
                }
                $whereReq = rtrim($whereReq, "or");
                if (count($value) > 1) {
                    $whereReq.=")";
                }
                $query = rtrim($query, ",");
                $query .= ']&';
            } else {
                $subAll = json_decode($all[$key], true);

                if (is_array($subAll)){
                    $query .= $key . '=[';

                    if (count($subAll) > 1) {
                        $whereReq.="(";
                    }
                    foreach ($subAll as $el) {
                        $query .= "\"$el\"" . ",";
                        $whereReq .= " `$tableName`.`$key` = '$el' or";
                    }
                    $whereReq = rtrim($whereReq, "or");
                    if (count($subAll) > 1) {
                        $whereReq.=")";
                    }
                    $query = rtrim($query, ",");
                    $query .= ']&';
                } else {
                    $query .= "$key=$value&";
                    $whereReq .= " `$tableName`.`$key` = '$value' or";
                }

                //dd($subAll);
                // $whereReq .= " `products`.`$key` = '$value' or";
            }

            $whereReq = rtrim($whereReq, "or");
            $whereReq .= " and";

        }

        $query = rtrim($query, "&");

        if ($whereReq=="(") {
            $whereReq ="";
        }

        return array($whereReq, $query);
    }

    /**
     * @param array $all
     * @param int $prGlobalType
     * @param ProductRepositoryInterface $productRepository
     * @return array
     */
    public function filterProductsFront(array $all, int $prGlobalType, ProductRepositoryInterface $productRepository): array
    {

        $whereReq = "";
        $whereReqPrice = "";
        $whereReqWeight = "";
        $whereReqSearch = "";
        $whereReqAlpha = "";
        $whereReqPriceUp = "";
        $whereReqPriceDown = "";
        $whereReqNew = "";
        $whereReqViewd = "";
        $whereReqWeightUp = "";
        $whereReqWeightDown = "";
        $query = "";
        foreach ($all as $key => $value) {
            if ($key == "price") {
                $query .= $key ."=".$value."&";
                $whereReqPrice = $this->minMax($value, $key, $whereReqPrice);


            } else if ($key == "weight") {
                $query .= $key ."=".$value."&";
                $whereReqWeight = $this->minMax($value, $key, $whereReqWeight);
            }
            //TODO
            else if ($key == "alpha") {
                $query .= $key ."=".$value."&";
                $whereReqAlpha.= "orderBy('name', 'DESC') and" ;
            }

            else if ($key == "viewd") {
                $query .= $key ."=".$value."&";
                $whereReqViewd.= "orderBy('click_count', 'DESC') and" ;
            }
            else if ($key == "new") {
                $query .= $key ."=".$value."&";
                $whereReqNew.= "orderBy('id', 'DESC') and" ;
            }
            else if ($key == "search") {
                $whereReqSearch .=" `product_translations`.`title`"." LIKE '%".$value."%' or `products`.`code`"." LIKE '%".$value."%' and";
                $query .= "$key=$value&";

            }else {
                $tableName = 'products';
                if ($key == "market") {
                    $tableName = 'user_infos';
                }

                if (empty($value)) {
                    continue;
                }

                if (is_array($value)) {
                    $query .= $key . '=[';

                    if (count($value) > 1) {
                        $whereReq.="(";
                    }
                    foreach ($value as $el) {
                        $query .= "\"$el\"" . ",";
                        $whereReq .= " `$tableName`.`$key` = '$el' or";
                    }
                    $whereReq = rtrim($whereReq, "or");
                    if (count($value) > 1) {
                        $whereReq.=")";
                    }
                    $query = rtrim($query, ",");
                    $query .= ']&';
                } else {
                    $subAll = json_decode($all[$key], true);

                    if (is_array($subAll)){
                        $query .= $key . '=[';

                        if (count($subAll) > 1) {
                            $whereReq.="(";
                        }
                        foreach ($subAll as $el) {
                            $query .= "\"$el\"" . ",";
                            $whereReq .= " `$tableName`.`$key` = '$el' or";
                        }
                        $whereReq = rtrim($whereReq, "or");
                        if (count($subAll) > 1) {
                            $whereReq.=")";
                        }
                        $query = rtrim($query, ",");
                        $query .= ']&';
                    } else {
                        $query .= "$key=$value&";
                        $whereReq .= " `$tableName`.`$key` = '$value' or";
                    }

                    //dd($subAll);
                   // $whereReq .= " `products`.`$key` = '$value' or";
                }

                $whereReq = rtrim($whereReq, "or");
                $whereReq .= " and";
            }
        }

        $query = rtrim($query, "&");

        if ($whereReq=="(") {
            $whereReq ="";
        }
       //dd($whereReq);
        //$whereReq =  rtrim($whereReq, "and");
//dd($whereReq.$whereReqPrice.$whereReqWeight.$whereReqSearch);

//dd($whereReq.$whereReqPrice.$whereReqWeight.$whereReqSearch.$whereReqViewd);
        $lang = 'am';
//        $products = $productRepository->getProductsByFilter($whereReq.$whereReqPrice.$whereReqWeight.$whereReqSearch, $prGlobalType, $lang);
        $products = $productRepository->getProductsByFilter($whereReq.$whereReqPrice.$whereReqWeight.$whereReqSearch.$whereReqViewd, $prGlobalType, $lang);

        //$products = $this->productRepository->allForFront($lang)->get();

        $favorites = $this->fav;

        foreach ($products as $key => $product):
            $products[$key]->pictures = json_decode($product->pictures, true);
        endforeach;
        return array($products, $favorites, $query);
    }
}
