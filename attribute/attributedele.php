<?php

// include("a/conn.php");

session_start();
$suser=$_SESSION['suser'];
include('database_connection.php');

$sql = "DELETE FROM `shop`.`attribute` WHERE `attribute`.`a_id` = '$_GET[aid]' ";

if (!mysqli_query($bd, $sql))
  {
  die('Error: Cant Delete  ');
  }
echo "1 record deleted";

mysqli_close($bd);

if($suser == 1) {
	header("location: ../admin/attribute.php");
}else if($suser == 2) {
	header("location: ../mod/attribute.php");
}

?>