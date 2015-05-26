<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>

<script type="text/javascript" src="http://localhost/bootstrap/js/jquery-1.11.2.min.js"></script> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="jquery.min.js" type="text/javascript"></script>



<link rel="stylesheet" type="text/css" href="http://localhost/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="http://localhost/shop/admin/stylee1.css">

  
<?php
session_start();


$log=$_SESSION['suser'];

if ($log != 1 && $log != 2) { 
   header ("Location: index.php");
 
}elseif ($log == 1) {

?>
 <script>
            $(function(){
              $("#header").load("../admin/adminheader.php"); 
                        });
 </script>

<?php
 }elseif ($log == 2) {
  ?>
  <script>
            $(function(){
              $("#header").load("../admin/modheader.php"); 
                        });
 </script>

 
<?php
}
?>




<style type="text/css">
#submit {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #006;
	
}
.must {
	color: #F00;
}
.ggg {
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 16px;
}
</style>
<link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript">




$(document).ready(function()//When the dom is ready 
{
  //alert ("/=ah ha");
$("#su_un").change(function() 
{ //if theres a change in the username textbox



var su_un = $("#su_un").val();//Get the value in the username textbox
if(su_un.length > 0)//if the lenght greater than 3 characters
{
$("#availability_status").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking availability...');
//Add a loading image in the span id="availability_status"

$.ajax({  //Make the Ajax Request
    type: "POST",  
    url: "ajax_check_username.php",  //file name
    data: "su_un="+ su_un, //data
    success: function(server_response){  
   
   $("#availability_status").ajaxComplete(function(event, request){ 

  if(server_response == '0')//if ajax_check_username.php return value "0"
  { 
  $("#availability_status").html('<img src="available.png" align="absmiddle"> <font color="Green"> Available </font>  ');
  //document.getElementById("submit").disabled = false;
  //add this image to the span with id "availability_status"
  }  
  else  if(server_response == '1')//if it returns "1"
  {  
   $("#availability_status").html('<img src="not_available.png" align="absmiddle"> <font color="red">Not Available </font>');
   //document.getElementById("submit").disabled = true;
  }  
   
   });
   } 
   
  }); 

}
else
{

$("#availability_status").html('<font color="#cc0000">Username too short</font>');
//if in case the username is less than or equal 3 characters only 

}



return false;
});

});
</script>
<?php


include('database_connection.php');

$a=$_GET['cid'];



$result = mysqli_query($bd, "SELECT * FROM `shop`.`suser` WHERE `c_id` = '$a' ");

if ($row = mysqli_fetch_array($result)) {

  ?>

</head>

<body>
<div id="header"></div> 
 <div class="col-md-7">
      <div class="well">
<form name="myForm" action="suserupdate.php?cid=<?php echo $row['c_id']; ?>" method="post" onsubmit="return validateForm()" data-toggle="validator" role="form">

<div class="form-group">
    <label class="control-label">First Name </label>
    <input type="text" name="su_fname" id="su_fname" class="form-control"  placeholder="Enter First Name" value="<?php echo $row['su_fname']; ?>"  required/>
</div>


<div class="form-group">
    <label class="control-label">Last Name </label>
    <input type="text" name="su_lname" id="su_lname" class="form-control"  placeholder="Enter Last Name" value="<?php echo $row['su_lname']; ?>"  required/>
</div>

<div class="form-group">
    <label class="control-label">E-mail</label>
    <input type="email" name="su_email" id="su_email" class="form-control"  placeholder="Enter E mail" value="<?php echo $row['su_email']; ?>"  required/>
</div>

 
<div class="form-group">
    <label class="control-label">User Name </label>
    <input type="text" name="su_un" id="su_un" class="form-control"  placeholder="Enter A user Name" value="<?php echo $row['su_un']; ?>"  required/>
    <span id="availability_status"></span>
</div>

<div class="form-group">
    <label class="control-label">Password</label>
    <input type="password" name="su_pw" id="su_pw" class="form-control"  placeholder="Enter A Password" onchange="form.pw2.pattern = this.value;" value="<?php echo $row['su_pw']; ?>"  required/></div>
   <div class="form-group">  <input type="password" name="pw2" id="pw2" class="form-control"  placeholder="Enter A Password" value="<?php echo $row['su_pw']; ?>"  required/>
</div>


<div class="form-group">
    <label class="control-label">User Type</label>
    <select name="su_type" class="form-control">
      <option value="admin" <?php 
if($row['su_type']=='admin')
{ echo 'selected="selected"';}?> >Admin</option>
      <option value="mod" <?php 
if($row['su_type']=='mod')
{ echo 'selected="selected"';}?> >Moderator</option>
    </select>
</div>

  
<div class="form-group">
  <input name="submit" type="submit" id="submit" class="btn btn-primary" >
</div>

</form>
</div>
</div>
</body>
<?php
}
?>
</html>