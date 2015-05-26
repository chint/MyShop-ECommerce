   <?php 
   session_start();
    include('database_connection.php');
      // echo $_POST['bank'];
 // var_dump($_POST);
$shipm =$_POST['shipmeth'];
$payid=$_POST['paymeth'];
$tot=$_POST['tot'];
$cid=$_SESSION['logins'];

if(isset($_POST['p_desc']))
{
 $p_desc=$_POST['p_desc'];


}else{
 $p_desc="N/A";


}

       if( empty($_SESSION['logins']))
			{
		echo 'must login';
			}
else{
	$cid=$_SESSION['logins'];


date_default_timezone_set('Asia/Colombo');
$date = date('Y-m-d h:i:s', time());
echo $date;


// Insert into payment
$sql1="INSERT INTO `shop`.`payment` (`pay_ID`, `C_ID`, `pay_date`,`pay_time`, `pay_amount`, `pay_desc`, `paym_ID`) 
VALUES (NULL, '$cid', CURDATE(),CURTIME(), '$tot', '$p_desc', '$payid');";

  if (!mysqli_query($bd,$sql1))
  {
  die('Error: ' . mysqli_error($bd));
  }



// select payment id
	$sqlid="SELECT max(pay_ID) AS id  FROM `shop`.`payment`  ";
	$resultid = mysqli_query($bd,$sqlid);
$maxpayid = mysqli_fetch_assoc($resultid);
$idm= $maxpayid['id'];




// create shipping
$sqlship="INSERT INTO `shop`.`shipping` (`ship_ID`, `shipm_ID`, `ship_desc`, `ship_date`) VALUES
 (NULL, '$shipm', '', '');";
if (!mysqli_query($bd,$sqlship))
  {
  die('Error: ' . mysqli_error($bd));
  }

  $sqlid2="SELECT max(ship_ID) AS id  FROM `shop`.`shipping`  ";
  $resultid2 = mysqli_query($bd,$sqlid2);
$maxshipid = mysqli_fetch_assoc($resultid2);
$idm2= $maxshipid['id'];


// Insert into order
  // SELECT  LAST_INSERT_ID()
$sql2= "INSERT INTO `shop`.`order` (`or_ID`, `crt_ID`, `c_ID`, `pay_ID`, `ship_ID`, `or_date`,`or_time`, `status`) 
VALUES (NULL, (SELECT `crt_ID` FROM `cart` WHERE `C_ID`='$cid' AND `stat`=0), $cid,'$idm','$idm2', CURDATE(),CURTIME(), 'not confirmed')";
		

if (!mysqli_query($bd,$sql2))
  {
  die('Error: ' . mysqli_error($bd));
  }


$sql4 ="SELECT * FROM `cart_product` WHERE `crt_ID` =(SELECT `crt_ID` FROM `cart` WHERE `C_ID`='$cid' AND `stat`=0)";
 $result = mysqli_query($bd,$sql4);
  while($r = mysqli_fetch_array($result)) 
  {

    $pid=$r['p_ID'];

    $sql5="UPDATE `shop`.`product` SET `p_qih` = `p_qih`-1 WHERE `product`.`p_ID` = $pid ";

        if (!mysqli_query($bd,$sql5))
          {
          die('Error: ' . mysqli_error($bd));
            }


    echo $r['p_ID'],"--",$r['qty'];
  }

$sql6="UPDATE `shop`.`cart` SET `stat` = '1' WHERE `cart`.`c_ID` = $cid";
if (!mysqli_query($bd,$sql6))
  {
  die('Error: ' . mysqli_error($bd));
  }
}




echo "<br>Order Processed";


      ?><?php
// Pear Mail Library
require_once "Mail.php";
 
$a=0;


// echo $_POST['email1'];

$result = mysqli_query($bd, "SELECT *,max(`order`.or_ID) as oid FROM `shop`.`cus`,`shop`.`order` WHERE `cus`.`c_id` = '$cid' AND `order`.`c_ID`=`cus`.c_id");

if ($row = mysqli_fetch_array($result)) {
      
    $body="Thank you for shopping at our store. Your order is Placed.
             Order ID is-".$row['oid'].".
            We will shortly confirm your order. You can check order progress in My Account page";
    $a=1;

} else {

    $body= "error";
}


// var_dump($_POST);
$from = '<from@gmail.com>';
$to = '<'.$row['c_email'].'>';
$subject = 'Your Order is Placed';


$headers = array(
    'From' => $from,
    'To' => $to,
    'Subject' => $subject
);

$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'mycartsl@gmail.com',
        'password' => 'b5EfjInIDuWX'
    ));

if($a==1){
$mail = $smtp->send($to, $headers, $body);
 
echo " <div class='alert alert-primary' role='alert'>Confirm mail is sent to ". $row['c_email'].", check you E-mail.</div>";
$a=0;} else {


    echo "Email not in use";
}
// header('Refresh: 3;url=../web/');







 header("Location: ../web/orderplaced.php");
?>
 