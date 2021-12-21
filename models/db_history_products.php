<?php
class ProductPurchaseHistory extends Db
{
    //get products by id_bill
    public function getAll($id_bill)
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM buy_products_history WHERE id_bill = ?");
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
    public function add($id_bill, $idproduct, $id_size, $id_topping, $quantity, $price)
    {
        //Quyery
        $sql = self::$connection->prepare("INSERT INTO `buy_products_history` (`id_bill`, `id_product`, `id_size`, `id_topping`, `quantity`, `price`) VALUES (?,?,?,?,?,?)");
        $sql->bind_param("iiiiii", $id_bill, $idproduct, $id_size, $id_topping, $quantity, $price);
        return $sql->execute();
    }
}
