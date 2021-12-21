<?php
//class: query to get Products
class Bill extends Db
{
    //get Bill by id_user
    public function getBillByIDUser($id_user)
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM bill WHERE id_user = ?");
        $sql->bind_param("i", $id_user);
        $sql->execute();
        $items = array(); //Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC); //Get array Products
        return $items;
    }

    //get Bill by id
    public function getBillByID($id)
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM bill WHERE id = ?");
        $sql->bind_param("i", $id);
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
    public function addItem($id, $id_user, $date_create, $state)
    {
        //Quyery
        $sql = self::$connection->prepare("INSERT INTO `bill` (`id`, `id_user`, `date_create`, `state`) VALUES (?,?,?,?)");
        $sql->bind_param("iiss", $id, $id_user, $date_create, $state);
        return $sql->execute();
    }
    //change state bill
    public function deliverBill($id){
        $sql = self::$connection->prepare("UPDATE `bill` SET `state`='Deliver successfully' WHERE `id`= ?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }
    //Insert data to table cart in database
    public function removeItem($id_product)
    {
        //Quyery
        $sql = self::$connection->prepare("DELETE FROM `cart` WHERE id_product =?");
        $sql->bind_param("i", $id_product);
        return $sql->execute();
    }
    //Remove a product inside table bill in database
    public function removeProduct($id_product)
    {
        //Quyery
        $sql = self::$connection->prepare("DELETE FROM `bill` WHERE id =?");
        $sql->bind_param("i", $id_product);
        return $sql->execute();
    }
}
