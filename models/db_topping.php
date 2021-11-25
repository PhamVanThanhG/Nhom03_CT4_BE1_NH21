<?php
//class: query to get Products
class Topping extends Db
{
    //Get array image by id:
    public function getAllTopping()
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM topping");
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }
}
?>