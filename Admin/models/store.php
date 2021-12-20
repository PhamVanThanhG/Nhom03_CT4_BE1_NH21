<?php
//class: query to get Products
class Store extends Db
{
    //Get the store's name
    public function getStore()
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM `store`");
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }

    public function editStore($Store_Name, $Location, $Phone_Number, $Email, $Facebook, $Twitter, $Linkedin, $Instagram, $Pinterest, $Opening_day, $Open_time, $Long_Description, $Short_Description){
        $sql = self::$connection->prepare("UPDATE `store` SET `Store_Name`=?,`Location`=?,`Phone_Number`=?,`Email`=?,`Facebook`=?,`Twitter`=?,`Linkedin`=?,`Instagram`=?,`Pinterest`=?,`Opening day`=?,`Open time`=?,`Long Description`=?,`Short description`=? WHERE `Store_Id`= 1");
        $sql->bind_param("sssssssssssss", $Store_Name, $Location, $Phone_Number, $Email, $Facebook, $Twitter, $Linkedin, $Instagram, $Pinterest, $Opening_day, $Open_time, $Long_Description, $Short_Description);
        return $sql->execute();
    }
}
?>