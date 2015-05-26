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
function AlertIt2(id) {
var answer = confirm ("Supplier (ID-"+id+") will be removed.Click OK to confirm")
if (answer)
  // alert("../product/prodele.php?pid="+id);
window.location="../supplier/removesupplier.php?cid="+id;
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
<h1 style="font-size: 30">Suppliers</h1>
<table width="1350" border="1" align="center" class="table table-bordered " >
<tr>
  <td width="1120" height="142" bgcolor="#EFF0F1">
<a class="btn" onclick="popitup('../supplier/addsupplier.php')" >Add Supplier</a>
 <table width="100" height="63" border="1" align="center" valign="middle" cellpadding="1" cellspacing="1" class="table table-bordered" id="sumtable">
  <tr>
    <td  class="bg-primary" >  <label class="control-label">Supplier ID </label></td>
  <td  class="bg-primary"><label class="control-label">Supplier Name </label></td>
  <td class="bg-primary" ><label class="control-label">Company </label></td>
  <td class="bg-primary" ><label class="control-label">E-mail </label></td>
  <td class="bg-primary"><label class="control-label">Telephone</label></td>
  <td  class="bg-primary"><label class="control-label">Supplier address</label></td>
  <td  class="bg-primary"><label class="control-label">Supplier Description</label></td>
</tr>


<form name="myForm" action="supplier.php?filter=1" method="post" onsubmit="return validateForm()" data-toggle="validator" role="form">
<tr>
  <td><input class="form-control" type="text" name="sup_ID" id="sup_ID" /></td>
  <td><input class="form-control" type="text" name="sup_name"  /></td>
  <td><input class="form-control" type="text" name="sup_company" /></td>
  <td><input class="form-control" type="text" name="sup_tp"  /></td>
  <td><input class="form-control" type="email" name="sup_email"  /></td>
  <td><input class="form-control" type="text" name="sup_addr"  placeholder="City Name"/  ></td>
  <td><input class="form-control" type="text" name="sup_dec" disabled="disabled" /></td>
 <td><input name="submit" type="submit" id="submit" class="btn btn-primary btn-sm" value="Filter">
  <a href="../admin/supplier.php">Reset</a></td>
 </tr>

</form>


<?php
 $r3=null;
if(isset($_GET['filter'])){

include('database_connection.php');
// var_dump($_POST);
// $sql="SELECT * FROM `cus` WHERE `c_id` = '$_POST[cid]' or `c_fname` like '$_POST[cname]%' or `c_email` = '$_POST[email]' or  
//  `c_dob` = '$_POST[bdate]' or `c_tp` = '$_POST[tel]' or `un` = '$_POST[uname]' or `c_shaddr2` = '$_POST[sadd]' or `c_shaddr3` = '$_POST[sadd]' ";
// $sql="SELECT * FROM `product` WHERE `c_id` = ();";
$sql="SELECT * FROM `supplier` WHERE `sup_ID`='$_POST[sup_ID]' or `sup_name` like '$_POST[sup_name]' or `sup_company` like '$_POST[sup_company]'
    or `sup_tp`like '$_POST[sup_tp]' or `sup_email` like '$_POST[sup_email]' or `sup_addr` like '$_POST[sup_addr]' ";

$result = mysqli_query($bd,$sql);

if(mysqli_num_rows($result)==0){
  echo "<tr><td colspan='11'><div class='alert alert-info' role='alert'> No result Found. <a  href='customer.php'><button type='button' class='btn btn-success' >Reset</button></a> </div></td></tr>";
}
  while($r = mysqli_fetch_array($result)) {



?>
<!-- <div class="form-group"> -->
<tr id="row<?php echo $r['sup_ID']; ?>">
  <td>
    <label class="control-label"><?php echo $r['sup_ID']; ?></label>
</td>
<td>
   <!--    --> <?php echo $r['sup_name']; ?>
 </td>

 <td>
 <?php echo $r['sup_company']; ?>  
 </td>

 <td>
     <?php echo $r['sup_tp']; ?>  
 </td>

 <td>
 <?php echo $r['sup_email']; ?> 
 </td>

 <td>
 <?php echo $r['sup_addr']; ?>
 </td>

 <td>
 <?php echo $r['sup_des']; ?>
 </td>

 <td class="some" >
     <a  onclick="popitup('../supplier/editsup.php?sid=<?php echo $r['sup_ID']; ?>')" type="button" >Edit</a>
     <!-- <a href="../supplier/removesupplier.php?cid=<?php echo $r['sup_ID']; ?>" type="button" class="glyphicon glyphicon-remove btn-danger"></a> -->
<a href="javascript:AlertIt2(<?php echo $r['sup_ID']; ?>);"  type="button" class="glyphicon glyphicon-remove btn-danger"></a>

 </td>

</tr>




<?php

}

}else{
include('database_connection.php');


$sql="SELECT * FROM `supplier` ";
// $sql="SELECT * FROM `product` WHERE `c_id` = ();";

$result = mysqli_query($bd,$sql);
  while($r = mysqli_fetch_array($result)) {



 ?>



<!-- <div class="form-group"> -->
<tr id="row<?php echo $r['sup_ID']; ?>">
  <td>
    <label class="control-label"><?php echo $r['sup_ID']; ?></label>
</td>
<td>
   <!--    --> <?php echo $r['sup_name']; ?>
 </td>

 <td>
 <?php echo $r['sup_company']; ?>  
 </td>

 <td>
     <?php echo $r['sup_email']; ?>  
 </td>

 <td>
 <?php echo $r['sup_tp']; ?> 
 </td>

 <td>
 <?php echo $r['sup_addr']; ?>
 </td>

 <td>
 <?php echo $r['sup_des']; ?>
 </td>


<td class="some" >
     <a onclick="popitup('../supplier/editsup.php?sid=<?php echo $r['sup_ID']; ?>')" type="button" class="btn">Edit</a>
     <!-- <a href="../supplier/removesupplier.php?cid=<?php echo $r['sup_ID']; ?>" type="button" class="glyphicon glyphicon-remove btn-danger"></a> -->
<a href="javascript:AlertIt2(<?php echo $r['sup_ID']; ?>);"  type="button" class="glyphicon glyphicon-remove btn-danger"></a>
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




