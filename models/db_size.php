<?php
//class: query to get Products
class Size extends Db
{
    //Get array image by id:
    public function getAllSize()
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM size");
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }
}
?>