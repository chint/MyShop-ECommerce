<?php


include('database_connection.php');

$a=$_GET['cid'];

// $sql = "DELETE FROM `shop`.`cus` WHERE `cus`.`c_id` = '$a'";


$sql = "UPDATE `cus` SET `cus_status` = '1' WHERE `c_id` = '$a'  ";


if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "record updated";
header("location: ../admin/customer.php");
mysqli_close($bd);
?>