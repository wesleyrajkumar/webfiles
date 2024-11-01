<?php 
session_start();
if(isset($_SESSION['userid'])){
    echo('login status Green');
    $_SESSION['backupsite'] = '';
}
else{
    
    $_SESSION['backupsite'] = '../wishlist/wishlistflathouse.php';
    session_write_close();
    header("Location:../frontend_authentication/Login.php");
    exit();
}
ob_end_clean();

$input = file_get_contents('php://input');
$array = json_decode($input,true);
$action = $array['action'];
if($action === 'insert'){
    $productid = $array['productid'];
    $productownerid = $array['pownerid'];
    $housemode = $array['housemode'];
    $clientuserid = $array['clientUserid'];
    include '../database/database.php';
    database::$db_name = 'poovarasi_RoomHunter';
    database::connection();
    
    $sql = database::$connection->prepare("INSERT INTO  wishlistflatmate(productid,productownerid,housemode,clientuserid)VALUES(?,?,?,?);");
    $sql->bind_param("ssss",$productid,$productownerid,$housemode,$clientuserid);
    $sql->execute();
}
else if($action === 'remove'){
    $userid = $array['userid'];
 $productid = $array['productid'];
 include '../database/database.php';
 database::$db_name = 'poovarasi_RoomHunter';
 database::connection();
 $sql=database::$connection->prepare("DELETE FROM wishlistflatmate WHERE clientuserid=? AND productid=?");
 $sql->bind_param("ss",$userid,$productid);
 $sql->execute();

}

?>