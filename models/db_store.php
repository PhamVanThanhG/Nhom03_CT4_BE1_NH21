<?php
//class: query to get Products
class Store extends Db
{
    //Get the store's name
    public function getNameStore()
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT `name` FROM store");
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;

    }

    public function getALlStore()
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM store");
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;

    }
}
?>