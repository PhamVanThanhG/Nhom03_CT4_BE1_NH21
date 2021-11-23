<?php
//class: query to get Products
class ProductType extends Db
{
    //Get All products in database
    public function getAllProductTypes()
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM `product_type`");
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }
}
?>