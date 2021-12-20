<?php
//class: query to get Products
class ProductFood extends Db
{
    //Get All products in database
    public function getAllProducts()
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM product, product_type Where product.Type_Id = product_type.Type_Id");
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;

    }


    //Get 9 Products of the top Products in database
    public function getNineProducts()
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM product WHERE id < 11");
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }

    //Them product
    public function addProducts($name,$type_id,$desc,$image,$price, $feature)
    {
        //Quyery
        $sql = self::$connection->prepare("INSERT INTO `product`(`Name`, `Type_Id`, `Decription`, `image`, `Price`, `Feature`) VALUES (?,?,?,?,?,?)");
        $sql->bind_param("sissii", $name,$type_id,$desc,$image,$price, $feature);
        return $sql->execute();
    }
    //Xoa product
    public function deleteProduct($id){
        $sql = self::$connection->prepare("DELETE FROM `product` WHERE `Id` = ?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }
    //Lay san pham by id
    public function getProductById($id){
        $sql = self::$connection->prepare("SELECT * FROM product Where `Id` = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }
    public function getProductsByIdType($id){
        $sql = self::$connection->prepare("SELECT * FROM `product` WHERE `Type_Id` = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }

    public function editProductsById($id,$name,$type_id,$desc,$image,$price, $sale, $feature){
        $sql = self::$connection->prepare("UPDATE `product` SET `Name`=?,`Type_Id`=?,`Decription`=?,`image`=?,`Price`=?,`Sale`=?,`Feature`=? WHERE `Id`= ?");
        $sql->bind_param("sissiiii", $name,$type_id,$desc,$image,$price, $sale, $feature, $id);
        return $sql->execute();
    }

    public function getSL(){
        $sql = self::$connection->prepare("SELECT COUNT(`product`.`Id`) as 'SL' FROM `product`");
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }
}
?>