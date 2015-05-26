<html>
 <head>
   <script type="text/javascript" src="http://localhost/bootstrap/js/jquery-1.11.2.min.js"></script> 
   <link rel="stylesheet" type="text/css" href="http://localhost/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="stylee1.css">
   <script type="text/javascript">

function popitup(url) {
       newwindow=window.open(url,'windowName','height=600,width=600');
       if (window.focus) {newwindow.focus()}
       return false;
     }


     </script>

  <script type="text/javascript">
function ban(id) {
var answer = confirm ("Customer accound (ID-"+id+") will be banned.Click OK to confirm")
if (answer)
  // alert("banned");
window.location="../customer/cusdele.php?cid="+id;
}
 
  function banlift(id) {
var answer = confirm ("Customer account (ID-"+id+") ban will be lifted.Click OK to confirm")
if (answer)
  // alert("banned");
window.location="../customer/cusavi.php?cid="+id;
}
</script>

   <!-- Admin header file -->
<?php
session_start();


$log=$_SESSION['suser'];

if ($log != 1 && $log != 2) { 
   header ("Location: index.php");
 
}elseif ($log == 1) {

?>
 <script>
            $(function(){
              $("#header").load("adminheader1.php"); 
                        });
 </script>

<?php
 }elseif ($log == 2) {
  ?>
  <script>
            $(function(){
              $("#header").load("modheader.php"); 
                        });
 </script>

 
<?php
}
?>
  
   
</head>



<body>

<div id="header"></div>   
<h1 style="font-size: 30">Customers</h1>
<table width="1350" border="1" align="center" class="table table-bordered " >
<tr>
  <td width="1120" height="142" bgcolor="#EFF0F1">
<a class="btn" onclick="popitup('../customer/adduser.php')" >Add Customer</a>
 <table width="100" height="63" border="1" align="center" valign="middle" cellpadding="1" cellspacing="1" class="table table-bordered" id="sumtable">
  <tr>
    <td  class="bg-primary" >  <label class="control-label">Customer ID </label></td>
  <td  class="bg-primary"><label class="control-label">Customer Name </label></td>
  <td class="bg-primary" ><label class="control-label">E-mail </label></td>
  <td class="bg-primary"><label class="control-label">Date of birth</label></td>
  <td class="bg-primary"><label class="control-label">Telephone</label></td>
  <td  class="bg-primary"><label class="control-label">Customer Shiping add</label></td>
  <td class="bg-primary"><label class="control-label">Customer Billing add</label></td>
  <td class="bg-primary"><label class="control-label">User Name</label></td>
  <td  class="bg-primary"><label class="control-label">User Password</label></td>
  <td  class="bg-primary"><label class="control-label">Action</label></td>
</tr>


<form name="myForm" action="customer.php?filter=1" method="post" onsubmit="return validateForm()" data-toggle="validator" role="form">
<tr>
  <td><input class="form-control" type="text" name="cid" id="c_ID" /></td>
  <td><input class="form-control" type="text" name="cname"  /></td>
  <td><input class="form-control" type="email" name="email" /></td>
  <td><input class="form-control" type="date" name="bdate"  /></td>
  <td><input class="form-control" type="text" name="tel"  /></td>
  <td><input class="form-control" type="text" name="sadd" disabled /></td>
  <td><input class="form-control" type="text" name="badd"  disabled/></td>
  <td><input class="form-control" type="text" name="uname"  /></td>
  <td><input class="form-control" type="text" name="pass"  disabled/></td>
 <td><input name="submit" type="submit" id="submit" class="btn btn-primary btn-sm" value="Filter"><a href="../admin/customer.php">Reset</a></td>
 </tr>

</form>


<?php
 $r3=null;
if(isset($_GET['filter'])){

include('database_connection.php');
// var_dump($_POST);
$sql="SELECT * FROM `cus` WHERE `c_id` = '$_POST[cid]' or `c_fname` like '$_POST[cname]' or `c_email` = '$_POST[email]' or  
 `c_dob` = '$_POST[bdate]' or `c_tp` = '$_POST[tel]' or `un` = '$_POST[uname]' ";
// $sql="SELECT * FROM `product` WHERE `c_id` = ();";

$result = mysqli_query($bd,$sql);
if(mysqli_num_rows($result)==0){
  echo "<tr><td colspan='11'><div class='alert alert-info' role='alert'> No result Found. <a  href='customer.php'><button type='button' class='btn btn-success' >Reset</button></a> </div></td></tr>";
}
  while($r = mysqli_fetch_array($result)) {



?>
<!-- <div class="form-group"> -->
<tr id="row<?php echo $r['c_id']; ?>" class=<?php if($r['cus_status']==0){ echo "danger";  }  ?> >
  <td>
    <label class="control-label"><?php echo $r['c_id']; ?></label>
</td>
<td>
   <!--    --> <?php echo $r['c_fname']; ?> <?php echo $r['c_mname']; ?> <?php echo $r['c_lname']; ?>
 </td>

 <td>
 <?php echo $r['c_email']; ?>  
 </td>

 <td>
     <?php echo $r['c_dob']; ?>  
 </td>

 <td>
 <?php echo $r['c_tp']; ?> 
 </td>

 <td>
 <?php echo $r['c_shaddr1']; ?> <?php echo $r['c_shaddr2']; ?> <?php echo $r['c_shaddr3']; ?> 
 </td>

 <td>
 <?php echo $r['c_baddr1']; ?> <?php echo $r['c_baddr2']; ?> <?php echo $r['c_baddr3']; ?> 
 </td>

 <td>
 <?php echo $r['un']; ?> 
 </td>

  <td>
 <?php echo $r['pw']; ?> 
 </td>

<td class="some" >
     <a onclick="popitup('../customer/edit.php?cun=<?php echo $r['un']; ?>')" type="button" class="btn">Edit</a>
    <?php if($r['cus_status']==1){  ?>
     <a   href="javascript:ban(<?php echo $r['c_id']; ?>);" type="button" class="glyphicon glyphicon-remove btn-danger"></a>
     <?php } else {   ?>    
      <a   href="javascript:banlift(<?php echo $r['c_id']; ?>);" type="button" class="glyphicon glyphicon-ok btn-success"></a> 
     <?php  }  ?>  
 </td>

</tr>




<?php

}

}else{
include('database_connection.php');


$sql="SELECT * FROM `cus` ";
// $sql="SELECT * FROM `product` WHERE `c_id` = ();";

$result = mysqli_query($bd,$sql);
  while($r = mysqli_fetch_array($result)) {



 ?>



<!-- <div class="form-group"> -->
<tr id="row<?php echo $r['c_id']; ?>"  class="<?php  if($r['cus_status']==0){ echo "danger"; } ?>">
  <td>
    <label class="control-label"><?php echo $r['c_id']; ?></label>
</td>
<td>
   <!--    --> <?php echo $r['c_fname']; ?> <?php echo $r['c_mname']; ?> <?php echo $r['c_lname']; ?>
 </td>

 <td>
 <?php echo $r['c_email']; ?>  
 </td>

 <td>
     <?php echo $r['c_dob']; ?>  
 </td>

 <td>
 <?php echo $r['c_tp']; ?> 
 </td>

 <td>
 <?php echo $r['c_shaddr1']; ?> <?php echo $r['c_shaddr2']; ?> <?php echo $r['c_shaddr3']; ?> 
 </td>

 <td>
 <?php echo $r['c_baddr1']; ?> <?php echo $r['c_baddr2']; ?> <?php echo $r['c_baddr3']; ?> 
 </td>

 <td>
 <?php echo $r['un']; ?> 
 </td>

  <td>
 <?php echo $r['pw']; ?> 
 </td>   

<td class="some" >
     <a onclick="popitup('../customer/edit.php?cun=<?php echo $r['un']; ?>')" type="button" class="btn">Edit</a>
     <?php if($r['cus_status']==1){  ?>
     <a   href="javascript:ban(<?php echo $r['c_id']; ?>);" type="button" class="glyphicon glyphicon-remove btn-danger"></a>
     <?php } else {   ?>    
      <a   href="javascript:banlift(<?php echo $r['c_id']; ?>);" type="button" class="glyphicon glyphicon-ok btn-success"></a> 
     <?php  }  ?>  
 </td>

</tr>
<!-- </div> -->

<?php

 } 

 }

?>

</table >

</tr>
  </td>
</table>
</body>
  </html>




