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
  $result3 = mysqli_query($bd,"SELECT * FROM `returns` WHERE `re_id` = '$_GET[re_id]'");
       $r3 = mysqli_fetch_assoc($result3);

   

       ?>

  

    <tr>
    <td><font size="2">Return ID:</font></td>
    <td><font size="2"><?php echo $r3['re_id']; ?></font></td>
  </tr>

   <tr>
    <td><font size="2">Order ID:</font></td>
    <td><font size="2"><?php echo $r3['or_id']; ?></font></td>
  </tr>

    <tr>
    <td><font size="2">Customer Name:</font></td>
    <td><font size="2">
    <?php
    
    // $sql=mysqli_query($bd,"SELECT `sup_name` FROM `supplier` WHERE `sup_ID` = '$r3[sup_ID]' ");
     


$sql=mysqli_query($bd,"SELECT cus.c_fname
 FROM 
      `order` 
INNER JOIN cus 
      ON order.c_ID = cus.c_id
INNER JOIN returns
      ON order.or_ID = returns.or_id
WHERE
     `re_id` = '$_GET[re_id]'" );

$sqlre = mysqli_fetch_assoc($sql);
     echo $sqlre['c_fname']; ?></font></td>
  </tr>

  <tr>
    <td><font size="2">Date:</font></td>
    <td><font size="2"><?php echo $r3['date']; ?></font></td>
  </tr>

 <tr>
    <td><font size="2">Reason:</font></td>
    <td><font size="2"><?php echo $r3['reason']; ?></font></td>
  </tr>

 

<tr><td></td><td></td></tr>


  </table>

  <table id="sumtable" width="200" border="0" align="center" class="table">



  <tr>
    <td><font size="2"><b>Product</b></font></td>
    <td><font size="2"><b>Quantity</b></font></td>
  </tr> 

 <?php 



 $result4 = mysqli_query($bd,"SELECT * FROM `returns_prod` WHERE `re_id` = '$_GET[re_id]'");
    while($r4 = mysqli_fetch_array($result4)){

 ?>

  <tr>
  
    <td><font size="2"> <?php
    
    $sql=mysqli_query($bd,"SELECT `p_name` FROM `product` WHERE `p_ID` = '$r4[p_id]' ");
     $sqlre = mysqli_fetch_assoc($sql);

     echo $sqlre['p_name']; ?> </font></td>
    <td><font size="2"> <?php echo $r4['r_qty']; ?> </font></td>
    
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