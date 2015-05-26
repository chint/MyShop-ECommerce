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
<h1 style="font-size: 30">Orders</h1>
<table width="1350" border="1" align="center" class="table table-bordered " >
<tr>
  <td width="1120" height="142" bgcolor="#EFF0F1">

 <table id="sumtable" width="200" border="1" align="center" cellpadding="1" cellspacing="1" class="table table-bordered">
  <tr>
    <td class="bg-primary" width=200>  <label class="control-label">Order ID </label></td>
  <td class="bg-primary"><label class="control-label">Customer Name </label></td>
  <td class="bg-primary" ><label class="control-label">Status</label></td>
 <td class="bg-primary"><label class="control-label">Add Date</label></td>
 <td class="bg-primary"><label class="control-label">Total</label></td>
 <td class="bg-primary"><label class="control-label">Action</label></td>
</tr>


<form name="myForm" action="order.php?filter=1" method="post" onsubmit="return validateForm()" data-toggle="validator" role="form">

<tr>
  <td><input class="form-control" type="text" name="oid" id="or_ID" /></td>
  <td><input class="form-control" type="text" name="cname" id="or_ID" /></td>
  <td><select name="status" class="form-control" >
       <option value=""></option> 
       <option value="not confirmed">Not Confirmed</option>
       <option value="confirmed">Confirmed</option>
       </select></td>
  <td><input class="form-control" type="date" name="date" id="or_ID" /></td>
  <td><input class="form-control" type="text" name="total" id="or_ID" /></td>
  <td><input name="submit" type="submit" id="submit" class="btn btn-primary btn-sm" value="Filter"><a href="../admin/order.php">Reset</a></td>
</tr>
  </form>

<?php
 $r3=null;
if(isset($_GET['filter']))
  

{
    include('database_connection.php');



 // $sql="SELECT * FROM `order` WHERE `or_ID`= '$_POST[oid]' or `c_ID`='$r3[c_id]' or `status` = '$_POST[status]' or `or_date` =' $_POST[date]' or `pay_ID` = '$r4[pay_ID]' ";


 if(isset($_POST['cname'])&& $_POST['cname'] != "")
 {

$sql="SELECT order.or_ID, cus.c_fname, order.status, order.or_date, payment.pay_amount, order.ship_ID
   FROM 
      `order` 
INNER JOIN cus 
      ON order.c_ID = cus.c_id
INNER JOIN payment
      ON order.pay_ID = payment.pay_ID
WHERE
     `or_ID` = '$_POST[oid]' or `c_fname` like '$_POST[cname]' or `status`='$_POST[status]' or `or_date`='$_POST[date]' or `pay_amount` = '$_POST[total]' ";


} else {


$sql="SELECT order.or_ID, cus.c_fname, order.status, order.or_date, payment.pay_amount, order.ship_ID
 FROM 
      `order` 
INNER JOIN cus 
      ON order.c_ID = cus.c_id
INNER JOIN payment
      ON order.pay_ID = payment.pay_ID
WHERE
     `or_ID` = '$_POST[oid]' or `c_fname` = '$_POST[cname]' or `status`='$_POST[status]' or `or_date`='$_POST[date]' or `pay_amount` = '$_POST[total]'" ;

}


$result = mysqli_query($bd,$sql);
if(mysqli_num_rows($result)==0){
  echo "<tr><td colspan='11'><div class='alert alert-info' role='alert'> No result Found. <a  href='customer.php'><button type='button' class='btn btn-success' >Reset</button></a> </div></td></tr>";
}
  while($r = mysqli_fetch_array($result)) {


?>



<!-- <div class="form-group"> -->
<tr id="row<?php echo $r['or_ID']; ?>">
  <td>

    <label class="control-label"><?php echo $r['or_ID']; ?></label>
</td>
<td>
 
   <!--    --> <?php echo $r['c_fname']; ?>
 </td>

 <td>
 <?php echo $r['status']; ?>  
 </td>

 <td>
   <?php echo $r['or_date']; ?> 
 </td>

 <td>
 
   <!--    --> <?php echo $r['pay_amount']; ?>

</td>

 
<td class="some" >

<?php 
   
   $ship="SELECT `ship_status` FROM `shipping` WHERE `ship_ID` = '$r[ship_ID]'";
        $shipre= mysqli_query($bd,$ship);
        $ship1=mysqli_fetch_assoc($shipre);

if($log == 1 && $ship1['ship_status'] == 0) { 
      // echo $log; ?>
     <a onClick="popitup('../order/ordedit.php?oid=<?php echo $r['or_ID']; ?>')" type="button" class="btn">Edit  /</a>
     <?php } ?>
     <a onClick="popitup('../order/ordview.php?oid=<?php echo $r['or_ID']; ?>')" type="button" claas="btn" > View</a>
 <a href="../order/orderinvoice.php?oid=<?php echo $r['or_ID']; ?>" target="_blank" type="button" claas="btn" >Get Invoice</a>
 </td>

</tr>
<!-- </div> -->

<?php

  }










} else {

include('database_connection.php');


$sql="SELECT * FROM `order` ";
// $sql="SELECT * FROM `product` WHERE `c_id` = ();";

$result = mysqli_query($bd,$sql);
  while($r = mysqli_fetch_array($result)) {


     $ship="SELECT `ship_status` FROM `shipping` WHERE `ship_ID` = '$r[ship_ID]'";
        $shipre= mysqli_query($bd,$ship);
        $ship1=mysqli_fetch_assoc($shipre);

?>



<!-- <div class="form-group"> -->
<tr id="row<?php echo $r['or_ID']; ?>" class=<?php

if($ship1['ship_status']==1){

 echo "info"; } ?>  >
  <td>

    <label class="control-label"><?php echo $r['or_ID']; ?></label>
</td>
<td>


    <?php

        $sql1="SELECT * FROM `cus` WHERE `c_id` = '$r[c_ID]'";
        $result1= mysqli_query($bd,$sql1);
        $r1=mysqli_fetch_assoc($result1);



    ?> 
   <!--    --> <?php echo $r1['c_fname']; ?>
 </td>

 <td>
 <?php echo $r['status']; ?>  
 </td>

 <td>
   <?php echo $r['or_date']; ?> 
 </td>

 <td>
 <?php

        $sql2="SELECT * FROM `payment` WHERE `pay_ID` = '$r[pay_ID]'";
        $result2= mysqli_query($bd,$sql2);
        $r2=mysqli_fetch_assoc($result2);

    ?> 
   <!--    --> <?php echo $r2['pay_amount']; ?>



 </td>

 
<td class="some" >

 <?php 
 
  

if($log == 1 && $ship1['ship_status'] == 0) { 
      // echo $log; ?>
     <a  onClick="popitup('../order/ordedit.php?oid=<?php echo $r['or_ID']; ?>')" type="button" class="btn">Edit  /</a>
     <?php } ?>
     <a  onClick="popitup('../order/ordview.php?oid=<?php echo $r['or_ID']; ?>')" type="button" class="btn" > View</a>
 <a href="../order/orderinvoice.php?oid=<?php echo $r['or_ID'];?>" target="_blank" type="button" claas="btn" >Get Invoice</a>
 </td>

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




