<?php

include('database_connection.php');
$sql = "INSERT INTO `shop`.`invtemp` (`inv_ID`, `sup_name`, `p_add_date`,`total_price`,`total_quantity`) VALUES ('$_POST[inv_ID]', '$_POST[sup_ID]', '$_POST[p_add_date]','$_POST[total_price]', '$_POST[total_quantity]');";

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
// echo "1 record added";
header("location: invedittemp.php?invid=$_POST[inv_ID]");


?>