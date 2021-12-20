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
    //Them product type
    public function addTypes($name)
    {
        //Quyery
        $sql = self::$connection->prepare("INSERT INTO `product_type`( `Type_Name`) VALUES (?)");
        $sql->bind_param("s", $name);
        return $sql->execute();
    }

    public function delType($id){
        $sql = self::$connection->prepare("DELETE FROM `product_type`  WHERE `Type_Id` = ?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }
    public function getProductTypeByIdType($id){
        $sql = self::$connection->prepare("SELECT * FROM `product_type` WHERE `Type_Id` = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }

    public function editTypeByID($id,$name){
        $sql = self::$connection->prepare("UPDATE `product_type` SET `Type_Name`=? WHERE `Type_Id`= ?");
        $sql->bind_param("si", $name, $id);
        return $sql->execute();
    }
}
?>