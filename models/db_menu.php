<?php
//class: query to get Products
class Menu extends Db
{
    //Get all menu from table product_type in database
    public function getAllMenu()
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM product_type");
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;

    }
}
?>