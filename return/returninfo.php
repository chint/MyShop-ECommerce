<html>
<head>

	<script type="text/javascript" src="http://localhost/bootstrap/js/jquery-1.11.2.min.js"></script> 
	<link rel="stylesheet" type="text/css" href="http://localhost/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/shop/admin/stylee1.css">

<script type="text/javascript">

</script>
</head>

<body>
<?php 
    session_start();
    include('database_connection.php');
    $Or_ID= $_SESSION['Or_ID']; 
?>



<br><br>
<table width="600" border="0" align="center"  >
<tr>

<td>
<form id="form1" name="form1" method="post" action="return_add.php" enctype="multipart/form-data">
<div class="col-md-12">
<div class="form-group">

 <label class="control-label">Order ID: </label>
 <input name="Or_ID" type="text" id="Or_ID" value="<?php echo $Or_ID; ?>" readonly="readonly"  class="form-control"/>

 </div>

  <div class="form-group">
  <label class="control-label">Reason: </label>
    <textarea name="reason" class="form-control" rows="5" id="reason"  required></textarea>
  </div>

<div>
<br><br><br>
<table id="sumtable" width="100" border="0" align="center" class="table">

<tr><td><b>Return Products</b></td><td></td></tr>
  <tr>
    <td><font size="2"><b>Product</b></font></td>
    <td><font size="2"><b>Model</b></font></td>
    <td><font size="2"><b>Quantity</b></font></td>
   
  </tr> 
 
    <?php

   
    $sql="SELECT * FROM `returntemp`";
    $result10 = mysqli_query($bd,$sql);
  while($r10 = mysqli_fetch_array($result10)) {

   



?>


 <tr>
<?php


       $result11 = mysqli_query($bd,"SELECT * FROM `product` WHERE `p_ID` = '$r10[P_ID]'");
       $r11 = mysqli_fetch_array($result11);  


  ?>
 <td><font size="2"> <?php echo $r11['p_name']; ?> </font></td>
 <td><font size="2"> <?php echo $r11['p_modelno']; ?> </font></td>
 <td><font size="2"> <?php echo $r10['qty']; ?> </font></td>
 


  
  <?php 
     
     }

  ?>
</tr>
</table>

</div>
 <div class="form-group">
  <input value="Confirm" type="submit" id="submit" class="btn btn-primary pull-right">
</div>
</div>
</form>
</td>
</tr>
</table>
</body>
</html>