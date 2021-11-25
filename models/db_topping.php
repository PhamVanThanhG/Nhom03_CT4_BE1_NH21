<?php
//class: query to get Products
class Topping extends Db
{
    //Get all topping
    public function getAllTopping()
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM topping");
        $sql->execute();
        $items = array(); //Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC); //Get array Products
        return $items;
    }

    //Get topping by ID
    public function getToppingByID($id)
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM topping WHERE id=?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array(); //Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC); //Get array Products
        return $items;
    }
}
