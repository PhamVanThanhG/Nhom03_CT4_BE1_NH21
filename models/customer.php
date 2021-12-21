<?php
class Customer extends Db
{
    public function insertAccountCustomer($username, $gmail, $password, $phone, $birthday)
    {
        $sql = self::$connection->prepare("INSERT INTO `customer`(`Cus_Id`, `Username`, `Email`, `Password`, `Phone`, `Birthday`) VALUES (NULL, ?, ?, ?, ?, ?)");
        $sql->bind_param("sssss", $username, $gmail, $password, $phone, $birthday);
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

    public function getAccount($gmail)
    {
        $sql = self::$connection->prepare("SELECT * FROM `customer` WHERE `Email` = ?");
        $sql->bind_param("s", $gmail);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getPassword($username, $gmail, $phone, $birthday)
    {
        $sql = self::$connection->prepare("SELECT `password` FROM customer WHERE `Username` = ? and `Email` = ? and `Phone` = ? and `Birthday` = ?");
        $sql->bind_param("ssss", $username, $gmail, $phone, $birthday);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    //get comment
    public function getComment()
    {
        $sql = self::$connection->prepare("SELECT Comment, Username, comment_date, cus_img FROM customer WHERE Comment IS NOT NULL ORDER BY comment_date DESC");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    // add comment
    public function addComment($comment, $comment_date, $idUser)
    {
        $sql = self::$connection->prepare("UPDATE `customer` SET `Comment` = ?, `comment_date` = ? WHERE `customer`.`Cus_Id` = ?");
        $sql->bind_param("ssi", $comment, $comment_date, $idUser);
        $sql->execute();
    }

    // add comment
    public function resetPassword($username, $gmail, $phone, $birthday)
    {
        $sql = self::$connection->prepare("UPDATE `customer` SET `Password` = '1bbd886460827015e5d605ed44252251' WHERE `Username` = ? and `Email` = ? and `Phone` = ? and `Birthday` = ?");
        $sql->bind_param("ssss", $username, $gmail, $phone, $birthday);
        $sql->execute();
    }
    //Get detail customer
    public function getCustomerById($Cus_Id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `customer` WHERE `Cus_Id` = ?");
        $sql->bind_param("i", $Cus_Id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    //Edit customer by ID
    public function editCustomerById($id, $username, $email, $cus_img, $birthday, $phone, $city, $district, $wards, $addAd, $rank)
    {
        $sql = self::$connection->prepare("UPDATE `customer` SET `Username`=?,`Email`=?,`cus_img`=?,`Birthday`=?,`Phone`=?,`province/city`=?,`district`=?,`wards`=?,`add_Address`=?,`rank`=? WHERE `Cus_Id`=?");
        $sql->bind_param("ssssssssssi", $username, $email, $cus_img, $birthday, $phone, $city, $district, $wards, $addAd, $rank, $id);
        return $sql->execute();
    }
    //Get tong tien khach hang da mua
    public function getMoneyAmoutByCusID($Cus_Id)
    {
        $sql = self::$connection->prepare("SELECT SUM(`buy_products_history`.`price`) as 'Money', `customer`.`rank` FROM `buy_products_history`, `buy_history`, `customer` WHERE `buy_products_history`.`id_bill` = `buy_history`.`id` and `buy_history`.`id_user` = `customer`.`Cus_Id` and `buy_history`.`id_user` = ?");
        $sql->bind_param("i", $Cus_Id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    //Edit customer by ID
    public function editRank($id, $rank)
    {
        $sql = self::$connection->prepare("UPDATE `customer` SET `rank`= ? WHERE `Cus_Id`= ?");
        $sql->bind_param("si", $rank, $id);
        return $sql->execute();
    }
}
