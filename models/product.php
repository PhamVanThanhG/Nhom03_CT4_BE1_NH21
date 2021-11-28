<?php
//class: query to get Products
class ProductFood extends Db
{
    //Get All products in database
    public function getAllProducts()
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM product");
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;

    }

    //Get 9 Products of the top Products in database
    public function getNineProducts()
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM product WHERE id < 11");
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }
}
?>