<?php
//class: query to get Products
class Topping extends Db
{
    //Get All products in database
    public function getAllToppings()
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM `topping`");
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }
    //Them product type
    public function addTopping($topping, $price)
    {
        //Quyery
        $sql = self::$connection->prepare("INSERT INTO `topping`(`toping`, `price`) VALUES (?,?)");
        $sql->bind_param("si", $topping, $price);
        return $sql->execute();
    }

    public function deleteToping($id){
        $sql = self::$connection->prepare("DELETE FROM `topping` WHERE `id` = ?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }
    public function getTopingById($id){
        $sql = self::$connection->prepare("SELECT * FROM `topping` WHERE `id` = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }

    public function editToppingById($id, $topping, $price){
        $sql = self::$connection->prepare("UPDATE `topping` SET `toping`=?,`price`= ? WHERE `id`=?");
        $sql->bind_param("sii", $topping, $price, $id);
        return $sql->execute();
    }
}
?>