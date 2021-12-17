<?php
//class: query to get Products
class Size extends Db
{
    //Get all size
    public function getAllSize()
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM size");
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }

    //Get size by ID
    public function getSizeByID($id)
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM size WHERE id=?");
        $sql->bind_param("i",$id);
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }
}
?>