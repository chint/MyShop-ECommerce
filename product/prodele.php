<?php


include('database_connection.php');

$a=$_GET['pid'];

$sql = "DELETE FROM `shop`.`product` WHERE `product`.`p_ID` = '$a';";
$sql1 = "DELETE FROM `shop`.`pro_att` WHERE `pro_att`.`p_id` = '$a';";


$results = mysqli_query($bd, "SELECT `product`.* FROM `shop`.`product` WHERE `p_ID` =  '$a' ");
    if ($row = mysqli_fetch_array($results)) {
      $itemp= $row['p_image'];
    }


if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
if (!mysqli_query($bd, $sql1))
  {
  die('Error: ' . mysqli_error($bd));
  } 

  unlink("c:\wamp\www\shop/web/proimg/" .$itemp); 

echo "record deleted";
mysqli_close($bd);
session_start();

$suser=$_SESSION['suser'];

if($suser == 1) {
  header("location: ../admin/product.php");
}else if($suser == 2) {
  header("location: ../admin/product.php");
}
?>