<?php
//class: query to get Products
class ProductFood extends Db
{
    //Get All products in database
    public function getAllProducts()
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM product");
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }
    //get product by Feature
    public function getProductsByFeature()
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM product WHERE Feature = 1");
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }

    //Get 6 Products of the top Products in database
    public function getSixProducts($page, $perPage)
    {
        //Quyery
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM product LIMIT ?,?");
        $sql->bind_param("ii", $firstLink, $perPage);
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;

    }

    //Get 6 Products of the top Products by typeID in database
    public function getProductsForPage($type_id,$page, $perPage)
    {
        //Quyery
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM product WHERE Type_Id = ? LIMIT ?,?");
        $sql->bind_param("iii", $type_id, $firstLink, $perPage);
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;

    }

    //Get 6 Products of the sale Products in database
    public function getSixProductsSale($page, $perPage)
    {
        //Quyery
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM product WHERE Sale > 0 LIMIT ?,?");
        $sql->bind_param("ii", $firstLink, $perPage);
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;

    }

    //Get 6 Products of the sale Products by typeID in database
    public function getProductsSaleForPage($type_id,$page, $perPage)
    {
        //Quyery
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM product WHERE Type_Id = ? && Sale > 0 LIMIT ?,?");
        $sql->bind_param("iii", $type_id, $firstLink, $perPage);
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;

    }
    
    //Get Products by type: returns name, img, decr, price of product.
    public function getProductsByType($type_id)
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM product WHERE product.Type_Id = ?");
        $sql->bind_param("i", $type_id);
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }
     //Get Products Sale by type: returns name, img, decr, price of product.
     public function getProductsSaleByType($type_id)
     {
         //Quyery
         $sql = self::$connection->prepare("SELECT * FROM product WHERE product.Type_Id = ? && Sale > 0");
         $sql->bind_param("i", $type_id);
         $sql->execute();
         $items = array();//Var array items
         $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
         return $items;
     }

    //Get Products by id
    public function getProductByID($id)
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM product WHERE Id = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }
    //search product
    public function search($keyword)
    {
        $sql = self::$connection->prepare("SELECT * FROM `product` WHERE `name` LIKE ?");
        $keyword = "%$keyword%";
        $sql->bind_param("s",$keyword);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    //get 2 products have top sale
    public function get2TopSaleProd()
    {
        $sql = self::$connection->prepare("SELECT * FROM `product` ORDER BY Sale DESC LIMIT 0,2");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    //get all products are having sale
    public function getAllSale()
    {
        $sql = self::$connection->prepare("SELECT * FROM `product` WHERE Sale > 0");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    
    //paginate for menu
    function paginateForMenu($url, $total, $perPage)
    {
        $totalLinks = ceil($total/$perPage);
 	    $link ="";
    	for($j=1; $j <= $totalLinks ; $j++)
     	{
            if(isset($_GET['page'])){
                if($_GET['page'] == $j){
                    $link = $link."<li class='active'><a href='$url&page=$j'> $j </a></li>";
                }else{
                    $link = $link."<li><a href='$url&page=$j'> $j </a></li>";
                }
            }else{
                $link = $link."<li><a href='$url&page=$j'> $j </a></li>";
            }
     	}
        $arrayLink = explode("'",$link);
        $i = 0;
        foreach($arrayLink as $item){
            if($item == 'active'){
                $i++;
            }
        }
        if($i == 0){
            $link=""."<li class='active'><a href='$url&page=1'> 1 </a></li>";
            for($j=2; $j <= $totalLinks ; $j++)
     	    {
                if(isset($_GET['page'])){
                    if($_GET['page'] == $j){
                        $link = $link."<li class='active'><a href='$url&page=$j'> $j </a></li>";
                    }else{
                        $link = $link."<li><a href='$url&page=$j'> $j </a></li>";
                    }
                }else{
                    $link = $link."<li><a href='$url&page=$j'> $j </a></li>";
                }
     	    }
        }
     	return $link;
    }

    //paginate for related product
    function paginateForRelatedProducts($url, $total, $perPage)
    {
        $totalLinks = ceil($total/$perPage);
 	    $link ="";
    	for($j=1; $j <= $totalLinks ; $j++)
     	{
            if(isset($_GET['pager'])){
                if($_GET['pager'] == $j){
                    $link = $link."<li class='active'><a href='$url&pager=$j'> $j </a></li>";
                }else{
                    $link = $link."<li><a href='$url&pager=$j'> $j </a></li>";
                }
            }else{
                $link = $link."<li><a href='$url&pager=$j'> $j </a></li>";
            }
     	}
        $arrayLink = explode("'",$link);
        $i = 0;
        foreach($arrayLink as $item){
            if($item == 'active'){
                $i++;
            }
        }
        if($i == 0){
            $link=""."<li class='active'><a href='$url&pager=1'> 1 </a></li>";
            for($j=2; $j <= $totalLinks ; $j++)
     	    {
                if(isset($_GET['pager'])){
                    if($_GET['pager'] == $j){
                        $link = $link."<li class='active'><a href='$url&pager=$j'> $j </a></li>";
                    }else{
                        $link = $link."<li><a href='$url&pager=$j'> $j </a></li>";
                    }
                }else{
                    $link = $link."<li><a href='$url&pager=$j'> $j </a></li>";
                }
     	    }
        }
     	return $link;
    } 
}
