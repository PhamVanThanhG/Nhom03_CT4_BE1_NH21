<?php
class Bill extends Db{
    public function getAllBill(){
        $sql = self::$connection->prepare("SELECT * FROM `bill`, `customer` WHERE `id_user` = `Cus_Id`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}