<?php


include('database_connection.php');

$a=$_GET['pid'];
$att_id=$_GET['att_id'];

  $sql = "DELETE FROM `shop`.`pro_att` WHERE `pro_att`.`p_id` = '$a' AND `pro_att`.`att_id` = 1";
// $sql1 = "DELETE FROM `shop`.`pro_att` WHERE `pro_att`.`p_id` = '$a';";

 


if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
 

 
echo "record deleted";
mysqli_close($bd);
session_start();

$suser=$_SESSION['suser'];

if($suser == 1) {
  header("location: ../product/attributeup.php?pid=$a");
}else if($suser == 2) {
  header("location: ../product/attributeup.php?pid=$a");
}
?>