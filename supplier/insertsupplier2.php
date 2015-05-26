<?php

$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "shop";
$prefix = "";
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database) or die("Opps some thing went wrong");

$sql = "INSERT INTO `shop`.`supplier` (`sup_ID`, `sup_name`, `sup_company`, `sup_tp`, `sup_email`, `sup_addr`, `sup_des`) VALUES (NULL, '$_POST[s_name]', '$_POST[s_comp]', '$_POST[s_tel]', '$_POST[s_email]', '$_POST[s_add]', '$_POST[s_des]');";

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "1 record added";

mysqli_close($bd);
?>