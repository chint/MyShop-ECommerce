<?php
include('database_connection.php');
$crtid=$_GET['crtid'];

$pid=$_GET['pid'];

echo $crtid;
echo $pid;

	$sql = "DELETE FROM `shop`.`cart_product` WHERE `cart_product`.`crt_ID` = '$crtid' AND `cart_product`.`p_ID` = '$pid'";

// $sql2 = "INSERT INTO `shop`.`cart_product` (`crt_ID`, `p_ID`, `qty`) VALUES ('6', '146', '1')";
	if (!mysqli_query($bd,$sql))
  {
  die('Error1: ' . mysqli_error($bd));
  }

header("Location: cart.php");
?>