<html>
  <link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<body>

	<form role="form-inline" role="form" action="" method="post">
	<div class="form-group">
<label class="sr-only" for="un">UsersName :</label>
<input class="form-control input-sm " id="un" type="text" name="username" placeholder="Enter User Name" required/>

<label class="sr-only ">Passwords :</label>
<input class="form-control input-sm" type="password" name="password"  placeholder="Enter User Password" required/>

<input type="submit" value=" login " class="btn btn-primary btn-xs pull-right" />
</div>
</form>
<?php
include('database_connection.php');
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from Form
$myusername=mysqli_real_escape_string($bd,$_POST['username']); 
$mypassword=mysqli_real_escape_string($bd,$_POST['password']); 

// $sql="SELECT * FROM `cus` WHERE 'un'='$myusername' and 'pw'='$mypassword'";
$sql = "SELECT * FROM `cus` WHERE `un` LIKE '$myusername' AND `pw` LIKE '$mypassword'";


$result=mysqli_query($bd,$sql);

$row=mysqli_fetch_array($result,MYSQLI_ASSOC);


$count=mysqli_num_rows($result);


echo $row['un'];
$stat=$row['cus_status'];
 
// If result matched $myusername and $mypassword, table row must be 1 row
if (($count==1) && ($stat==0))
{
  echo "<script type='text/javascript'>window.parent.location.replace('../web/banned.php')</script>";
echo "ur banned";

}
else if($count==1)
{
// session_register("myusername");
$_SESSION['OK']=1;
$_SESSION['logins']=$row['c_id'];
$_SESSION['un']=$row['c_fname'];
echo 'login success';
  echo "<script type='text/javascript'>window.parent.location.reload(true)</script>";
// header("location: http://localhost/shop/customer/welcome.php");

  if($row['type']==1)
  {
  	$_SESSION['Admin']=$row['un'];
  }

}
else 
{
	 echo 'invalid UN/PW combination ' . mysqli_error($bd);
	 // echo '  <a class="btn btn-default" href="http://localhost/shop/customer/tryagain.php" >Try Again</a> ';
header("location: http://localhost/shop/customer/tryagain.php");
}
}
?>


<!-- <div class="col-md-6"> -->
      <!-- <div class="well"> -->
	

<!-- </div> -->
<!-- </div> -->
</html>
</body>