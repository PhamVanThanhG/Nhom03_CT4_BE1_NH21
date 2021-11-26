<?php
//class: query to get Products
class Cart extends Db
{
    //get all  cart
    public function getAllCart()
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM cart");
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }
    //Insert data to table cart in database
    public function addProduct($id_product,$id_size,$id_topping,$quantity)
    {
        //Quyery
        $sql = self::$connection->prepare("INSERT INTO `cart` (`id_product`, `id_size`, `id_topping`, `quantity`) VALUES (?,?,?,?)");
        $sql->bind_param("iiii", $id_product,$id_size,$id_topping,$quantity);
        return $sql->execute();
    }
    //Insert data to table cart in database
    public function removeProduct($id_product)
    {
        //Quyery
        $sql = self::$connection->prepare("DELETE FROM `cart` WHERE id_product =?");
        $sql->bind_param("i", $id_product);
        return $sql->execute();
    }
}
?>