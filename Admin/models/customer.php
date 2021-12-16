<?php
class Customer extends Db
{
    public function insertAccountCustomer($username, $gmail, $password)
    {
        $sql = self::$connection->prepare("INSERT INTO `customer`(`Cus_Id`, `Username`, `Email`, `Password`) VALUES (NULL, ?, ?, ?)");
        $sql->bind_param("sss", $username, $gmail, $password);
        $sql->execute();
    }

    public function getEmail()
    {
        $sql = self::$connection->prepare("SELECT `Email` FROM customer");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getAccount($gmail, $password)
    {
        $sql = self::$connection->prepare("SELECT `Cus_Id`, `Username` FROM `customer` WHERE `Email` = ? AND `Password` = ?");
        $sql->bind_param("ss", $gmail, $password);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getAllCustomer()
    {
        $sql = self::$connection->prepare("SELECT * FROM `customer` WHERE `Permission` = 'customer'");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function addCustomer($username, $email, $password, $image, $birthday, $phone, $city, $district, $wards, $addAd)
    {
        //Quyery
        $sql = self::$connection->prepare("INSERT INTO `customer`(`Username`, `Email`, `Password`, `cus_img`, `Birthday`, `Phone`, `province/city`, `district`, `wards`, `add_Address`) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $sql->bind_param("ssssssssss", $username, $email, $password, $image, $birthday, $phone, $city, $district, $wards, $addAd);
        return $sql->execute();
    }

    public function getCustomerById($Cus_Id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `customer` WHERE `Cus_Id` = ?");
        $sql->bind_param("i", $Cus_Id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function deleteCustomer($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `customer` WHERE `Cus_Id` = ?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }

    public function editCustomerById($id, $username, $email, $cus_img, $birthday, $phone, $city, $district, $wards, $addAd, $rank, $comment, $daycreated)
    {
        $sql = self::$connection->prepare("UPDATE `customer` SET `Username`=?,`Email`=?,`cus_img`=?,`Birthday`=?,`Phone`=?,`province/city`=?,`district`=?,`wards`=?,`add_Address`=?,`rank`=?,`Comment`=?,`DayCreate`=? WHERE `Cus_Id`=?");
        $sql->bind_param("ssssssssssssi", $username, $email, $cus_img, $birthday, $phone, $city, $district, $wards, $addAd, $rank, $comment, $daycreated, $id);
        return $sql->execute();
    }
    public function getSL()
    {
        $sql = self::$connection->prepare("SELECT COUNT(`Cus_Id`) as 'SL' FROM `customer` WHERE `Permission` = 'Customer'");
        $sql->execute();
        $items = array(); //Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC); //Get array Products
        return $items;
    }
}
