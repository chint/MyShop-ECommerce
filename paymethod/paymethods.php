<html>
 <head>
<script type="text/javascript" src="http://localhost/bootstrap/js/jquery-1.11.2.min.js"></script> 
<link rel="stylesheet" type="text/css" href="http://localhost/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="stylee1.css">

   <!-- Admin header file -->
<script type="text/javascript">

function popitup(url) {
       newwindow=window.open(url,'windowName','height=600,width=800');
       if (window.focus) {newwindow.focus()}
       return false;
     }


     </script>

<?php
session_start();


$log=$_SESSION['suser'];

if ($log != 1 && $log != 2) { 
   header ("Location: index.php");
 
}elseif ($log == 1) {

?>
 <script>
            $(function(){
              $("#header").load("../admin/adminheader1.php"); 
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
  
   
</head>



<body>

<div id="header"></div>   
<h1 style="font-size: 30">Payment Methods</h1>
<table width="1350" border="1" align="center" class="table table-bordered " >
<tr>
  <td width="1120" height="142" bgcolor="#EFF0F1">

<a class="btn" onclick="popitup('addpaym.php')">Add Payment Method</a>
 <table id="sumtable" width="200" border="1" align="center" cellpadding="1" cellspacing="1" class="table table-bordered">
  <tr>
    <td class="bg-primary" width=200>  <label class="control-label"> Payment Method ID </label></td>
  <td class="bg-primary"><label class="control-label"> Payment Method Name </label></td>
  <td class="bg-primary" ><label class="control-label"> Payment Method Description (HTML)</label></td>
 
 <td class="bg-primary"><label class="control-label">Edit/Delete</label></td>
</tr>
<?php
 // session_start();


include('database_connection.php');


$sql="SELECT * FROM `pay-methods` ";
// $sql="SELECT * FROM `product` WHERE `c_id` = ();";

$result = mysqli_query($bd,$sql);
  while($r = mysqli_fetch_array($result)) {



 ?>

<!-- <div class="form-group"> -->
<tr >
  <td>
    <label class="control-label"><?php echo $r['paym_ID']; ?></label>
</td>
<td>
   <!--    --> <?php echo $r['paym_name']; ?>
 </td>

 <td>
 <?php 
 // echo $r['paym_desc']; 

$a=htmlspecialchars($r['paym_desc']);
echo $a;
 ?>  

 </td>

  
<td class="some" >
 <a onclick="popitup('../paymethod/editpaym.php?shipm_ID=<?php echo $r['paym_ID']; ?>')"  type="button" >Edit</a>
    
     <!-- <a href="../paymethod/delpaym.php?paym_ID=<?php echo $r['paym_ID']; ?>" type="button" class="glyphicon glyphicon-remove btn-danger"></a> -->
<a href="javascript:AlertIt2(<?php echo $r['paym_ID']; ?>);"  type="button" class="glyphicon glyphicon-remove btn-danger"></a>
 </td>
  <script type="text/javascript">
function AlertIt2(id) {
var answer = confirm ("Payment Method (ID-"+id+") will be removed.Click OK to confirm")
if (answer)
  // alert("../product/prodele.php?pid="+id);
window.location="../paymethod/delpaym.php?paym_ID="+id;
}
</script>
</tr>
<!-- </div> -->

<?php

 } 

 

?>

</table >
</td>
</tr>
</table>
</body>
  </html>




