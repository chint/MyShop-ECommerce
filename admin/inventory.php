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
  
       <?php
session_start();


$log=$_SESSION['suser'];

if ($log != 1 && $log != 2) { 
   header ("Location: index.php");
 

 // Load Admin Header
}elseif ($log == 1) {

?>
 <script>
            $(function(){
              $("#header").load("adminheader1.php"); 
                        });
 </script>

<?php

// Load Mod Header
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
<h1 style="font-size: 30">Inventory</h1>
<button class="btn btn-success" onClick="return popitup('http://localhost/shop/inventory/addinv.php')"><span class="icon">Add Inventory</span></button> <br>
<table width="1350" border="1" align="center" class="table table-bordered " >
<tr>
  <td width="1120" height="142" bgcolor="#EFF0F1">

 <table id="sumtable" width="200" border="1" align="center" cellpadding="1" cellspacing="1" class="table table-bordered">
  <tr>
    <td class="bg-primary" width=200>  <label class="control-label">Inventory ID</label></td>
  <td class="bg-primary"><label class="control-label">Supplier Name</label></td>
  <td class="bg-primary" ><label class="control-label">Product Add Date</label></td>
 <td class="bg-primary"><label class="control-label">Total Price</label></td>
 <td class="bg-primary"><label class="control-label">Total Quantity</label></td>
 <td class="bg-primary"><label class="control-label">Action</label></td>
</tr>


<form name="myForm" action="inventory.php?filter=1" method="post" onsubmit="return validateForm()" data-toggle="validator" role="form">

<tr>
  <td><input class="form-control" type="number" name="inv_id" id="inv_id" /></td>
  <td><input class="form-control" type="text" name="sup_name" id="sup_name" /></td>
  <td> <input class="form-control" type="date" name="p_add_date" id="p_add_date" /> </td>
  <td><input class="form-control" type="number" name="total_price" id="total_price" /></td>
  <td><input class="form-control" type="number" name="total_pquantity" id="total_pquantity" /></td>
  <td><input name="submit" type="submit" id="submit" class="btn btn-primary btn-sm" value="Filter"></td>
</tr>
  </form>

<?php
 $r3=null;
if(isset($_GET['filter']))
  

{
    include('database_connection.php');



$sql11=mysqli_query($bd,"SELECT `sup_ID` FROM `supplier` WHERE `sup_name` = '$_POST[sup_name]' ");
 $re11=mysqli_fetch_assoc($sql11);
     // echo $re11['sup_ID'];
     // echo "string";

 // $sql="SELECT * FROM `order` WHERE `or_ID`= '$_POST[oid]' or `c_ID`='$r3[c_id]' or `status` = '$_POST[status]' or `or_date` =' $_POST[date]' or `pay_ID` = '$r4[pay_ID]' ";


$sql="SELECT * FROM `inventory` WHERE `inv_ID` = '$_POST[inv_id]' or `sup_ID` = '$re11[sup_ID]' or `p_add_date` = '$_POST[p_add_date]' or `total_price` = '$_POST[total_price]' or `total_pquantity` = '$_POST[total_pquantity]' ";

 

$result = mysqli_query($bd,$sql);
  if(mysqli_num_rows($result)==0){
  echo "<tr><td colspan='11'><div class='alert alert-info' role='alert'> No result Found. <a  href='inventory.php'><button type='button' class='btn btn-success' >Reset</button></a> </div></td></tr>";
}
  while($r = mysqli_fetch_array($result)) {

?>



<!-- <div class="form-group"> -->
<tr id="row<?php echo $r['inv_ID']; ?>">
  <td>

    <label class="control-label"><?php echo $r['inv_ID']; ?></label>
</td>
<td>
 
   <!--    --> <?php 
   $sql5 = mysqli_query($bd,"SELECT `sup_name` FROM `supplier` WHERE `sup_ID` = '$r[sup_ID]' ");
    $re15 = mysqli_fetch_assoc($sql5);


   echo $re15['sup_name']; ?>
 </td>

 <td>
 <?php echo $r['p_add_date']; ?>  
 </td>

 <td>
   <?php echo $r['total_price']; ?> 
 </td>

 <td>
 
   <!--    --> <?php echo $r['total_pquantity']; ?>

</td>

 
<td class="some" >

<?php if($log == 1) { 
      // echo $log; ?>
     <a onClick="popitup('../inventory/invedit.php?invid=<?php echo $r['inv_ID']; ?>')" type="button" class="btn">Edit  /</a>
     <?php } ?>
     <a onClick="popitup('../inventory/invview.php?invid=<?php echo $r['inv_ID']; ?>')" type="button" claas="btn" > View</a>

     <!-- <a href="../inventory/removeinv.php?invid=<?php echo $r['inv_ID']; ?>" type="button" class="glyphicon glyphicon-remove btn-danger"></a> -->
<a href="javascript:AlertIt2(<?php echo $r['inv_ID']; ?>);"  type="button" class="glyphicon glyphicon-remove btn-danger"></a>
 </td>
  <script type="text/javascript">
function AlertIt2(id) {
var answer = confirm ("Inventory (ID-"+id+") will be removed.Click OK to confirm")
if (answer)
  // alert("../product/prodele.php?pid="+id);
window.location="../inventory/removeinv.php?invid="+id;
}
</script>
</tr>
<!-- </div> -->

<?php

 } 










} else{

include('database_connection.php');


$sql="SELECT * FROM `inventory` ";
// $sql="SELECT * FROM `product` WHERE `c_id` = ();";

$result = mysqli_query($bd,$sql);
  while($r = mysqli_fetch_array($result)) {

?>



<!-- <div class="form-group"> -->
<tr id="row<?php echo $r['inv_ID']; ?>">
  <td>

    <label class="control-label"><?php echo $r['inv_ID']; ?></label>
</td>
<td>


    <?php

        $sql1="SELECT * FROM `supplier` WHERE `sup_ID` = '$r[sup_ID]'";
        $result1= mysqli_query($bd,$sql1);
        $r1=mysqli_fetch_assoc($result1);



    ?> 
   <!--    --> <?php echo $r1['sup_name']; ?>
 </td>

 <td>
 <?php echo $r['p_add_date']; ?>  
 </td>

 <td>
   <?php echo $r['total_price']; ?> 
 </td>

 <td>
 
   <!--    --> <?php echo $r['total_pquantity']; ?>



 </td>

 
<td class="some" >

  <?php if($log == 1) { 
      // echo $log; ?>
     <a onClick="popitup('../inventory/invedit.php?invid=<?php echo $r['inv_ID']; ?>')" type="button" class="btn">Edit  /</a>
     <?php } ?>
     <a onClick="popitup('../inventory/invview.php?invid=<?php echo $r['inv_ID']; ?>')" type="button" claas="btn" > View</a>

  <a href="javascript:AlertIt2(<?php echo $r['inv_ID']; ?>);"  type="button" class="glyphicon glyphicon-remove btn-danger"></a>
 </td>
  <script type="text/javascript">
function AlertIt2(id) {
var answer = confirm ("Inventory (ID-"+id+") will be removed.Click OK to confirm")
if (answer)
  // alert("../product/prodele.php?pid="+id);
window.location="../inventory/removeinv.php?invid="+id;
}
</script>

</tr>
<!-- </div> -->

<?php

 } 
}

 

?>

</table >
</td>
</tr>
</table>
</body>
  </html>




