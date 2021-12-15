<?php
//class: query to get Products
class Rating extends Db
{
    //Get rating by id_product:
    public function getRatingByIDProduct($id_prod)
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT * FROM rating WHERE id_product = ?");
        $sql->bind_param("i", $id_prod);
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }
    //count rating by id_product:
    public function countRatingByID($id)
    {
        //Quyery
        $sql = self::$connection->prepare("SELECT COUNT(id) FROM rating WHERE id_product = ?");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;
    }
    //insert new rating
    public function addNewRating($value, $id_user, $id_product, $comment, $date)
    {
        //Quyery
        $sql = self::$connection->prepare("INSERT INTO `rating` (`rating_value`, `id_user`, `id`, `id_product`, `comment`, `date`) VALUES (?, ?, NULL, ?, ?, ?)");
        $sql->bind_param("iiiss", $value, $id_user, $id_product, $comment, $date);
        $sql->execute();
    }
    //Get 3 Comment of the top Products in database
    public function get3Comments($page, $perPage)
    {
        //Quyery
        $firstLink = ($page - 1) * $perPage;
        $sql = self::$connection->prepare("SELECT * FROM rating LIMIT ?,?");
        $sql->bind_param("ii", $firstLink, $perPage);
        $sql->execute();
        $items = array();//Var array items
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);//Get array Products
        return $items;

    }
    //paginate for comment
    function paginateComment($url, $total, $perPage)
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
}
?>