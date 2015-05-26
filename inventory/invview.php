<html>
<head>

 <script type="text/javascript" src="http://localhost/bootstrap/js/jquery-1.11.2.min.js"></script> 
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
</head>
<body>
<div id="header"></div> 
<?php
  $stot=0;
 ?>
<table border="1" align="center" class="table table-bordered " >
<tr>
  <td bgcolor="#EFF0F1">

 <table id="sumtable" width="200" border="0" align="center" class="table">
  
<?php
  include('database_connection.php');
  $result3 = mysqli_query($bd,"SELECT * FROM `inventory` WHERE `inv_ID` = '$_GET[invid]'");
       $r3 = mysqli_fetch_assoc($result3);

   

       ?>

  

    <tr>
    <td><font size="2">Inventory ID:</font></td>
    <td><font size="2"><?php echo $r3['inv_ID']; ?></font></td>
  </tr>

    <tr>
    <td><font size="2">Supplier Name:</font></td>
    <td><font size="2"><?php
    
    $sql=mysqli_query($bd,"SELECT `sup_name` FROM `supplier` WHERE `sup_ID` = '$r3[sup_ID]' ");
     $sqlre = mysqli_fetch_assoc($sql);


     echo $sqlre['sup_name']; ?></font></td>
  </tr>

  <!-- <tr>
    <td><font size="2">Added By:</font></td>
    <td><font size="2"><?php echo $r3['su_name']; ?></font></td>
  </tr> -->

 <tr>
    <td><font size="2">Date:</font></td>
    <td><font size="2"><?php echo $r3['p_add_date']; ?></font></td>
  </tr>

 <tr>
    <td><font size="2">Total Quantity:</font></td>
    <td><font size="2"><?php echo $r3['total_pquantity']; ?></font></td>
  </tr>

<tr><td></td><td></td></tr>


  </table>

  <table id="sumtable" width="200" border="0" align="center" class="table">



  <tr>
    <td><font size="2"><b>Product</b></font></td>
    <td><font size="2"><b>Quantity</b></font></td>
    <td><font size="2"><b>Unit Price</b></font></td>
    <td><font size="2"><b>Total</b></font></td>
  </tr> 

 <?php 



 $result4 = mysqli_query($bd,"SELECT * FROM `product_inv` WHERE `inv_id` = '$_GET[invid]'");
    while($r4 = mysqli_fetch_array($result4)){

 ?>

  <tr>
  
    <td><font size="2"> <?php
    
    $sql=mysqli_query($bd,"SELECT `p_name` FROM `product` WHERE `p_ID` = '$r4[p_id]' ");
     $sqlre = mysqli_fetch_assoc($sql);

     echo $sqlre['p_name']; ?> </font></td>
    <td><font size="2"> <?php echo $r4['p_pquantity']; ?> </font></td>
    <td><font size="2"> <?php echo $r4['p_uprice']; ?> </font></td>
    <td><font size="2"> <?php echo $r4['inv_id']; ?> </font></td>
    <?php

      // $tot = $r8['qty'] * $r9['p_price']; ?>
    
    </tr> 

<?php  } ?>


    </table>
    </td>
    </tr>
    </table>
    </body>
  </html>