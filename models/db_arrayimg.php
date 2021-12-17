<?php
//class: query to get Products
class ImageArray extends Db
{
    //Get array image by id:
    public function getImageArrayByID($id)
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM arrimg WHERE id_product = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }
}
?>