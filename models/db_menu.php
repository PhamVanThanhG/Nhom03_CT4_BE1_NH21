<?php
//class: query to get Products
class Menu extends Db
{
    //Function returns NAME of Menu emplements by ID of this  
    public function getNameMenuByID($id)
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT `name` FROM product_type WHERE Type_Id = ?");
        $sql->bind_param("i",$id);
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;

    }
}
?>