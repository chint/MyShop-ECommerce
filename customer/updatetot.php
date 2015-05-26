<?php
include('database_connection.php');
//Include The Database Connection File 

 
 
$tot=mysqli_real_escape_string($bd,$_POST['tot']);

 

$sql2="UPDATE `shop`.`cart` SET `crt_tot` = '$tot' WHERE `cart`.`crt_ID` = '$crtid'";

if (!mysqli_query($bd, $sql2))
  {
echo "0";
  
  }
else
{ 
echo "1";
		 
}
// {
	// echo "0";
// $un = mysqli_real_escape_string($bd, $_POST['un']);//Some clean up :)



// $check_for_username = mysqli_query($bd,$sqlq);
// //Query to check if username is available or not 

// if(mysqli_num_rows($check_for_username))
// {
// echo '1';//If there is a  record match in the Database - Not Available
// }
// else
// {
// echo '0';//No Record Found - Username is available 
// }

// }


?>