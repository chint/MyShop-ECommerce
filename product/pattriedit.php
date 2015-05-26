<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="jquery.min.js" type="text/javascript"></script>

<head>
<style>
.error {color: #FF0000;}
</style>
</head>


<?php

// include("a/conn.php");
include('database_connection.php');
// $sql="INSERT INTO cus (c_fname, c_mname, c_lname, c_dob,c_tp, c_shaddr1, c_shaddr2, c_shaddr3, c_baddr1, c_baddr2, c_baddr3, un, pw)
// VALUES
// ($_POST[c_fname],$_POST[c_mname],$_POST[c_lname],$_POST[c_dob],$_POST[c_tp],$_POST[c_shaddr1],$_POST[c_shaddr2],$_POST[c_shaddr3],$_POST[c_baddr1],$_POST[c_baddr2],$_POST[c_baddr3],$_POST[un],$_POST[pw])";



$sql = "INSERT INTO  `shop`.`product` (`p_ID` ,`cat_ID` ,`B_ID` ,`p_name` ,`p_modelno` ,`p_price` ,`p_qih` ,`p_reorderlvl` ,`p_image` ,`p_desc`)
VALUES (NULL ,  '$_POST[C_ID]',  '$_POST[B_ID]',  '$_POST[p_name]',  '$_POST[p_modelno]',  '$_POST[p_price]',  '$_POST[p_qih]',  '$_POST[p_reorderlvl]',  '$_POST[p_image]',  '$_POST[p_desc]');";

if (!mysqli_query($bd,$sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "product insertion partially completed";
$pid=$_POST['p_ID'];
echo $pid; 

session_start();
$_SESSION['varname'] = $pid;
?>

<body> 

<form name="myForm" action="pattrifinish.php" method="post" onsubmit="return validateForm()">

<tr>
  <td width="125" align="right" class="ggg"></td>
        <td width="221">
         
        </td><td width="119"></br>
</tr>

<table id="dataTable" width="200" border="1" align="center" cellpadding="1" cellspacing="1" class="table table-striped">
 
 
   <?php 
   
      include('database_connection.php');
     $result = mysqli_query($bd,"SELECT * FROM `attribute`");
    while($r = mysqli_fetch_array($result)) {
      ?>
 <br>
 <tr><td>
  <?php echo $r['a_name'];   ?>
</td>
  <td><input name="<?php echo $r['a_name']; ?>" type="text" id="a_val" /></td>
</tr>
  <?php
}
  ?>

  
</table>

<input name="submit" type="submit" id="submit" />
</form>
</body>
</html>

