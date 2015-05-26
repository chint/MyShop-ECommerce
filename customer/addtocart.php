<?php

include('database_connection.php');

echo var_dump($_POST);
echo $_GET['c_id'];

echo $_GET['p_id'];
$cid=$_GET['c_id'];

$pid=$_GET['p_id'];
if(isset($_POST['qtty']))
{
  $qtty=$_POST['qtty'];
}else{
  $qtty=1;
}


if($cid==-1)
{
header('Location:../logorreg/logreg.php');
 // header("Location: cart.php");

}else{
	echo 'login ok,proceed<br>';
$sqlhascart="SELECT * FROM `cart` WHERE `C_ID` = '$cid'  ;";
$result=mysqli_query($bd,$sqlhascart);
if (mysqli_num_rows($result)==0) 
  { 

   echo "user has no cart ,create 1";
  
  $sql = "INSERT INTO `shop`.`cart` (`crt_ID`, `C_ID`) VALUES (NULL, '$cid')  ;";
 
  if (!mysqli_query($bd,$sql))
  {
        die('Error1: '.mysqli_error($bd));
  }
echo "cart creation completed";
  }

  else{


       $sqlstatzero="SELECT * FROM `cart` WHERE `C_ID` = '$cid' AND `stat`='0' ;";
      $result=mysqli_query($bd,$sqlstatzero);
      if (mysqli_num_rows($result)==0) 
      {

  $sql = "INSERT INTO `shop`.`cart` (`crt_ID`, `C_ID`) VALUES (NULL, '$cid')  ;";
 if (!mysqli_query($bd,$sql))
  {
        die('Error1: '.mysqli_error($bd));
  }
                        }

}

echo $cid;

$sqlid="SELECT * FROM `cart` WHERE `C_ID` = '$cid' AND `stat`=0;";
$result2=mysqli_query($bd,$sqlid);
$row=mysqli_fetch_array($result2,MYSQLI_ASSOC);
$cidins=$row['crt_ID'];
echo 'cart id'. $cidins;

$sql2 = "INSERT INTO `shop`.`cart_product` (`crt_ID`, `p_ID`, `qty`) VALUES ('$cidins', '$pid', '$qtty') ON DUPLICATE KEY UPDATE `qty`='$qtty';";
	if (!mysqli_query($bd,$sql2))
  {
  die('Error2: ' . mysqli_error($bd));
  }
// echo mysqli_insert_id($bd);
header("Location: cart.php");
}

?>