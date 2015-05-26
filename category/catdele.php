<?php

session_start();

$suser=$_SESSION['suser'];

include('database_connection.php');

$a=$_GET['cid'];

$sql = "DELETE FROM `shop`.`category` WHERE `category`.`c_ID` = '$a'";

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "record updated";
 
mysqli_close($bd);
if($suser == 1) {
	header("location: ../admin/categories.php");
}else if($suser == 2) {
	header("location: ../admin/categories.php");
}
?>