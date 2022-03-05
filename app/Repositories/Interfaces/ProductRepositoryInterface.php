<?php


namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface
{
    //Get
    public function all(int $u_id,string $lang);

    public function getByProductID(int $id, string $lang, int $fake_flag);

    //Update
    public function updateOrdering(int $productID,int $orderID);


    //Check
    public function checkOwner(int $productID);


    //Get for front
    public function allForFront(string $lang, int $u_id,int $cat_id, int $fake_flag);

    //increment Click count
    public function updateClickCount(int $productID);

    public function getJsonImgs(int $prod_id);

    public function getFavoriteProductsByIDs(int $productsIDs, string $lang);

    public function getProductsByFilter(string $filter, int $prGlobalType, string $lang);
}
