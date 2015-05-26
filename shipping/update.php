<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }

    window.close();
</script>

<?php

session_start();
$suser=$_SESSION['suser'];
include('database_connection.php');


echo "$_POST[ship]";
if($_POST['ship']==1){
$date=date("Y/m/d");
} else {
$date=0;}
$sql = "UPDATE `shop`.`shipping` SET `ship_status` = '$_POST[ship]', `ship_date` = '$date' WHERE `shipping`.`ship_ID` = $_GET[ship_ID];";

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "record updated";

// mysqli_close($bd);

require_once "Mail.php";
 
$a=0;


// echo $_POST['email1'];

$result = mysqli_query($bd, "SELECT * FROM `shop`.`cus`,`shop`.`order`,`shop`.`shipping`,`shop`.`payment` WHERE `shipping`.ship_ID= $_GET[ship_ID] AND `order`.ship_ID=`shipping`.ship_ID and `cus`.c_id=`order`.c_ID AND `order`.pay_ID=`payment`.pay_ID");

if ($row = mysqli_fetch_array($result)) {
      
    $body="Thank you for shopping at our store. Your order is Shipped.
           Order ID -".$row['or_ID'].".
           Shipping Date -".$row['ship_date'].".
           Shipped Address - ".$row['c_shaddr1'].".".$row['c_shaddr2'].".	
           Total Payment -Rs.".$row['pay_amount'].".					
           You can check order progress in My Account page";
    $a=1;

} else {

    $body= "error";
}


// var_dump($_POST);
$from = '<from@gmail.com>';
$to = '<'.$row['c_email'].'>';
$subject = 'Your Order is Shipped';


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
mysqli_close($bd);
// if($suser == 1) {
// 	header("location: ../admin/adminord.php");
// }else if($suser == 2) {
// 	header("location: ../mod/modord.php");
// }

?>