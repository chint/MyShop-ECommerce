<html>
  <link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="stylee.css">
<body>

  <body>
    <nav class="navbar " role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
 
    <div class="panel-body"><font size="5" color="#FFFFFF">Cart</font> 
    <font size="5.5" color="#FFFFFF"> | </font>
     <font color="white" size="3" face="Lucida Sans Unicode, Lucida Grande, sans-serif">ADMINISTRATION</font>

     </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<br>
<br>
<br><br><br>

  <form role="form-inline" role="form" action="" method="post">
  <div class="form-group">
  

</div>
<table width="477" height="203" border="2" align="center"  >
<tr align="center" bgcolor="#EFF0F1" >
   <td height="195">

<table width="396" height="184" border="0" align="center">
  
  <tr>
    <td width="13" height="38">&nbsp;</td>
    <td width="284" valign="bottom">User name</td>
    <td width="85">&nbsp;</td>
  </tr>
  <tr>
    <td height="36">&nbsp;</td>
    <td><input class="form-control input-sm " id="un" type="text" name="username" placeholder="Enter User Name" required/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="34">&nbsp;</td>
    <td valign="bottom">Password</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="38">&nbsp;</td>
    <td><input class="form-control input-sm" type="password" name="password"  placeholder="Enter User Password" required/>
</td>
    <td align="center"><input type="submit" value=" Login " class="btn btn-primary btn-xs" /></td>
  </tr>
  <tr>
  <td height="26"></td>
  <td valign="top" ><a href="http://localhost/shop/admin/passwordsend.php"><font size="2">Forgotten Password</font></a></td>
  <td></td>
  </tr>
</table>
</td>
</tr>
</table>

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
$sql = "SELECT * FROM `suser` WHERE `su_un` LIKE '$myusername' AND `su_pw` LIKE '$mypassword'";


$result=mysqli_query($bd,$sql);

$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

// $active=$row['active'];
$count=mysqli_num_rows($result);


echo $row['su_un'];
// If result matched $myusername and $mypassword, table row must be 1 row
if(($count==1)&&($row['su_type']==admin))
{
// session_register("myusername");
$_SESSION['suser']=1;
// $_SESSION['logins']=$row['c_id'];
$_SESSION['userr']="Admin";
$_SESSION['userrn']=$row['su_un'];


echo 'login success';
  header("location: home.php");
// header("location: http://localhost/shop/customer/welcome.php");

 
    $_SESSION['Admin']=$row['un'];
  

}
else if (($count==1)&&($row['su_type']==mod)){

$_SESSION['suser']=2;
// $_SESSION['logins']=$row['c_id'];
$_SESSION['userr']="Moderator";
$_SESSION['userrn']=$row['su_un'];

 header("location: home.php");

}else {
   echo 'invalid UN/PW combination ' . mysqli_error($bd);
   // echo '  <a class="btn btn-default" href="http://localhost/shop/customer/tryagain.php" >Try Again</a> ';
header("location: http://localhost/shop/admin/tryagain.php");
}
}
?>


<!-- <div class="col-md-6"> -->
      <!-- <div class="well"> -->
  

<!-- </div> -->
<!-- </div> -->
</html>
</body>