<?php
class Order extends Db{
    public function getAllBuyHistory(){
        $sql = self::$connection->prepare("SELECT * FROM `buy_history`, `customer` WHERE `buy_history`.`id_user` = `customer`.`Cus_Id` ORDER BY `buy_history`.`id` DESC");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getOrderById($id){
        $sql = self::$connection->prepare("SELECT * FROM `buy_history` , `customer` WHERE `buy_history`.`id_user` = `customer`.`Cus_Id` and `buy_history`.`id` = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getDetailBillByBillId($id){
        $sql = self::$connection->prepare("SELECT *, `size`.`price` as 'sizePrice', `topping`.`price` as 'topppingPrice', `buy_products_history`.`price` as 'Orderprice' FROM `buy_products_history`, `product`, `size`, `topping` WHERE `buy_products_history`.`id_product` = `product`.`Id` AND `buy_products_history`.`id_size` = `size`.`id` AND `topping`.`id` = `buy_products_history`.`id_topping` and `buy_products_history`.`id_bill` = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getTotalOrder($id){
        $sql = self::$connection->prepare("SELECT SUM(`price`) as 'TongTien' FROM `buy_products_history` WHERE `id_bill` = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}