<?php
//class: query to get Products
class TypeProduct extends Db
{
    //Get type_id by id product:
    public function getTypeID($id)
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT `product_type`.`Type_Id` FROM `product_type`, `product` WHERE `product`.`Type_Id`=`product_type`.`Type_Id` && `product`.`Id` = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }
    //Get type's name by id product:
    public function getNameTypeByID($id)
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT `product_type`.`Type_Name` FROM `product_type`, `product` WHERE `product`.`Type_Id`=`product_type`.`Type_Id` && `product`.`Id` = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }
    //Get type's name by id product:
    public function getNameTypeByTypeID($type_id)
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT Type_Name FROM `product_type` WHERE Type_Id = ?");
        $sql->bind_param("i", $type_id);
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }
    //search product
    public function search($keyword)
    {
        $sql = self::$connection->prepare("SELECT * FROM `product_type` WHERE `Type_Name` LIKE ?");
        $keyword = "%$keyword%";
        $sql->bind_param("s",$keyword);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}
?>