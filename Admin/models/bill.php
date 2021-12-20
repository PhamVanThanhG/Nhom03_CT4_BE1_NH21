<?php
class Bill extends Db{
    public function getAllBill(){
        $sql = self::$connection->prepare("SELECT * FROM `bill`, `customer` WHERE `id_user` = `Cus_Id`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getBillById($id){
        $sql = self::$connection->prepare("SELECT * FROM `bill`, `customer` WHERE `id_user` = `Cus_Id` and `id` = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getDetailBillByBillId($id){
        $sql = self::$connection->prepare("SELECT *, `size`.`price` as 'sizePrice', `topping`.`price` as 'topppingPrice' FROM `bill_products`, `product`, `size`, `topping` WHERE `id_product` = `product`.`Id` and `size`.`id` = `bill_products`.`id_size` and `topping`.`id` = `bill_products`.`id_topping` AND `id_bill` = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function deliverBill($id){
        $sql = self::$connection->prepare("UPDATE `bill` SET `state`='Being processed' WHERE `id`= ?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }

    public function deleteBill($id){
        $sql = self::$connection->prepare("DELETE FROM `bill` WHERE `id` = ?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }
    public function getOrder(){
        $sql = self::$connection->prepare("SELECT COUNT(`id`) FROM `buy_history`");
        $sql->execute();
        $items = $sql->get_result()->fetch_all();
        return $items;
    }

    public function getProductSold(){
        $sql = self::$connection->prepare("SELECT SUM(`quantity`) as'SL' FROM `buy_products_history`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getAllBuyHistory(){
        $sql = self::$connection->prepare("SELECT * FROM `buy_history`, `buy_products_history` WHERE `buy_history`.`id` = `buy_products_history`.`id_bill`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}