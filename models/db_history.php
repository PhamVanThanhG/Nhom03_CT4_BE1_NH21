<?php
class PurchaseHistory extends Db
{
    //get purchase history by id_user
    public function getByIDUser($id_user)
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM buy_history WHERE id_user = ? ORDER BY `buy_history`.`id` DESC");
        $sql->bind_param("i", $id_user);
        $sql->execute();
        $items = array(); //Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC); //Get array Products
        return $items;
    }
    //count Element of bill
    public function count()
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT COUNT(*) FROM buy_history");
        $sql->execute();
        $items = array(); //Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC); //Get array Products
        return $items;
    }

    //Insert data to table cart in database
    public function add($id, $id_user, $date_create, $date_confirm)
    {
        //Quyery
        $sql = self::$connection->prepare("INSERT INTO `buy_history` (`id`, `id_user`, `date_create`, `date_confirm`) VALUES (?,?,?,?)");
        $sql->bind_param("iiss", $id, $id_user, $date_create, $date_confirm);
        return $sql->execute();
    }
}
