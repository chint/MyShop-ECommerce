<?php
// Pear Mail Library
require_once "Mail.php";

include('database_connection.php');
$a=0;


// echo $_POST['email1'];

$result = mysqli_query($bd, "SELECT * FROM `shop`.`suser` WHERE `su_email` = '$_POST[email1]' ");

if ($row = mysqli_fetch_array($result)) {
      
    $body="Username - ".$row['su_un']. "      Password - ".$row['su_pw'];
    $a=1;

} else {

    $body= "error";
}


// var_dump($_POST);
$from = '<from@gmail.com>';
$to = '<'.$_POST['email1'].'>';
$subject = 'Your username and password';


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
echo "Message successfully sent!";
$a=0;} else {
    echo "Email not in use";
}
header('Refresh: 2;url=index.php');

?>