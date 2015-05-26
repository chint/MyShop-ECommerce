<?php

// include("a/conn.php");
include('database_connection.php');

$sql = "DELETE FROM `shop`.`suser` WHERE `suser`.`c_id` = '$_GET[cid]' ";

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "1 record deleted";

mysqli_close($bd);
header("location: ../admin/adminsuser.php");
?>