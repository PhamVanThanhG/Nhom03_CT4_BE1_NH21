<?php
class Rating extends Db{
    public function getAllRatingProduct(){
        $sql = self::$connection->prepare("SELECT `rating`.`id_product`, COUNT(`rating`.`id`) as 'reivew' ,round(AVG(rating_value), 0) as 'star' ,`product`.`Id`, `product`.`Name`, `product`.`image`,`product`.`Price`, `product`.`Sale` FROM `rating`, `product` WHERE `product`.`Id` = `rating`.`id_product` GROUP BY `id_product`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getAllRatingProductById($id){
        $sql = self::$connection->prepare("SELECT * FROM `rating`, `product`, `customer` WHERE `product`.`Id` = `rating`.`id_product` and `rating`.`id_user` = `customer`.`Cus_Id` and `rating`.`id_product` = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}