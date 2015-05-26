<?php

session_start();
$suser=$_SESSION['suser'];

include('database_connection.php');
 
 $results = mysqli_query($bd, "SELECT * FROM `product_inv` WHERE `inv_id` =  '$_GET[invid]' ");
 while ($row = mysqli_fetch_array($results)) 
    {


          $sql7 = "UPDATE `product` SET `p_qih`=`p_qih`-'$row[p_pquantity]' WHERE `p_ID` = '$row[p_id]' ";
  
                             
                  if (!mysqli_query($bd, $sql7))
                     {
                        die('Error: ' . mysqli_error($bd));
                     }
                        echo "1 updateed";
      
      
    }



$sql  = "DELETE FROM `shop`.`product_inv` WHERE `inv_id` = '$_GET[invid]' ";
$sql2 = "DELETE FROM `shop`.`inventory` WHERE `inv_ID` = '$_GET[invid]' ";
 

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "1 record deleted qq";

if (!mysqli_query($bd, $sql2))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "1 record deleted";

mysqli_close($bd);

if($suser == 1) {
	header("location: ../admin/inventory.php");
}else if($suser == 2) {
	header("location: ../admin/inventory.php");
}
?>