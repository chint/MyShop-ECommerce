<?php

session_start();


$log=$_SESSION['suser'];
$reid=$_SESSION['re_id'];

include('database_connection.php');

$sqltemp = "INSERT INTO `returnstemp2` (`re_id`, `p_id`, `qty`) VALUES ('$reid', '$_GET[pid]', '$_POST[qty]') ON DUPLICATE KEY UPDATE `qty`='$_POST[qty]' ";


if (!mysqli_query($bd, $sqltemp))
  {
  die('Error: ' . mysqli_error($bd));
  }

echo "sdffesd";

header("location:returnedit.php");

?>