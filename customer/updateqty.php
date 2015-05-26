<?php
include('database_connection.php');
//Include The Database Connection File 


// if(isset($_POST['un']))//If a username has been submitted 
// {
// 	echo '1';
// }
// if(isset($_POST['qty']) && isset($_POST['crtid'])  && isset($_POST['pid']))//If a username has been submitted 
// {
	// echo '1';
$qty=mysqli_real_escape_string($bd,$_POST['qty']);
$crtid=mysqli_real_escape_string($bd,$_POST['crtid']);
$pid=mysqli_real_escape_string($bd,$_POST['pid']);
 

$sql="UPDATE `shop`.`cart_product` SET `qty` = '$qty' WHERE `cart_product`.`crt_ID` = '$crtid' AND `cart_product`.`p_ID` = '$pid'";

 
 
	if (!mysqli_query($bd, $sql))
{
	echo "0";
}else{
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