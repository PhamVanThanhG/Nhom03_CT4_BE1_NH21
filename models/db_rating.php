<?php
//class: query to get Products
class Rating extends Db
{
    //Get rating by id_product:
    public function getRatingByIDProduct($id_prod)
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM rating WHERE id_product = ?");
        $sql->bind_param("i", $id_prod);
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }
    //count rating by id_product:
    public function countRatingByID($id)
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT COUNT(id) FROM rating WHERE id_product = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }
}
?>