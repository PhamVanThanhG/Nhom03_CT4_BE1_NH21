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
    public function addProducts($id,$name,$desc,$size,$topping,$quantity, $image)
    {
        //Quyery
        $sql = self::$connection->prepare("INSERT INTO `cart` (`id_product`, `name`, `descript`, `size`, `topping`, `quantity`, `image`) VALUES (?,?,?,?,?,?,?)");
        $sql->bind_param("issssis", $id,$name,$desc,$size,$topping,$quantity, $image);
        return $sql->execute();
    }
}
?>