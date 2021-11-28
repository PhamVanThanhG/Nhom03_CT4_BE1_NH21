<?php
class Customer extends Db{
    public function insertAccountCustomer($username, $gmail, $password){
        $sql = self::$connection->prepare("INSERT INTO `customer`(`Cus_Id`, `Username`, `Email`, `Password`) VALUES (NULL, ?, ?, ?)");
        $sql->bind_param("sss", $username, $gmail, $password);
        $sql->execute();
    }

    public function getEmail(){
        $sql = self::$connection->prepare("SELECT `Email` FROM customer");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getAccount($gmail, $password){
        $sql = self::$connection->prepare("SELECT `Cus_Id`, `Username` FROM `customer` WHERE `Email` = ? AND `Password` = ?");
        $sql->bind_param("ss", $gmail, $password);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}