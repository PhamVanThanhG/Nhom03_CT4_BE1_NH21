<?php
//class: query to get Products
class Sizes extends Db
{
    //Get All products in database
    public function getAllSizes()
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM `size`");
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }
    //Them product type
    public function addSize($size, $price)
    {
        //Quyery
        $sql = self::$connection->prepare("INSERT INTO `size`(`size`, `price`) VALUES (?,?)");
        $sql->bind_param("si", $size, $price);
        return $sql->execute();
    }

    public function delSize($id){
        $sql = self::$connection->prepare("DELETE FROM `size` WHERE `id` = ?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }
    public function getSizeById($id){
        $sql = self::$connection->prepare("SELECT * FROM `size` WHERE `id` = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }

    public function editSizeByID($id, $size, $price){
        $sql = self::$connection->prepare("UPDATE `size` SET `size`=?,`price`=? WHERE `id`=?");
        $sql->bind_param("sii", $size, $price, $id);
        return $sql->execute();
    }
}
?>