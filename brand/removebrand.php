<?php
session_start();
$suser=$_SESSION['suser'];
// include("a/conn.php");
include('database_connection.php');
 
    $results = mysqli_query($bd, "SELECT `brand`.* FROM `shop`.`brand` WHERE `b_ID` =  '$_GET[bid]' ");
    if ($row = mysqli_fetch_array($results)) {
      $itemp= $row['b_logo'];
    }

$sql = "DELETE FROM `shop`.`brand` WHERE `brand`.`b_ID` = '$_GET[bid]' ";

unlink("c:\wamp\www\shop/web/logo/" . $itemp);	


if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "1 record deleted";

mysqli_close($bd);
if($suser == 1) {
	header("location: ../admin/brand.php");
}else if($suser == 2) {
	header("location: ../admin/brand.php");
}
?>