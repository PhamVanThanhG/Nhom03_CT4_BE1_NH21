<?php
//class: query to get Products
class BillProduct extends Db
{
    //get products in billproduct table by id_bill
    public function getByID($id_bill)
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM bill_products WHERE id_bill = ?");
        $sql->bind_param("i", $id_bill);
        $sql->execute();
        $items = array(); //Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC); //Get array Products
        return $items;
    }
    //count Element of bill
    public function count()
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT COUNT(*) FROM bill");
        $sql->execute();
        $items = array(); //Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC); //Get array Products
        return $items;
    }

    //Insert data to table cart in database
    public function addItem($id_bill, $idproduct, $id_size, $id_topping, $quantity, $price)
    {
        //Quyery
        $sql = self::$connection->prepare("INSERT INTO `bill_products` (`id_bill`, `id_product`, `id_size`, `id_topping`, `quantity`, `price`) VALUES (?,?,?,?,?,?)");
        $sql->bind_param("iiiiii", $id_bill, $idproduct, $id_size, $id_topping, $quantity, $price);
        return $sql->execute();
    }
    //Remove a product inside table bill product in database
    public function removeItem($id_bill)
    {
        //Quyery
        $sql = self::$connection->prepare("DELETE FROM `bill_products` WHERE id_bill =?");
        $sql->bind_param("i", $id_bill);
        return $sql->execute();
    }

}
