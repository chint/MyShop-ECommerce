<!DOCTYPE html>
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
include('database_connection.php');

if(isset($_GET['filter'])) {

 $sql2 = "INSERT INTO `shop`.`invtemp2` (`p_id`, `u_price`, `quantity`) VALUES ('$_POST[p_ID]', '$_POST[p_uprice]', '$_POST[p_pquantity]')  ON DUPLICATE KEY UPDATE `u_price`='$_POST[p_uprice]', `quantity` = '$_POST[p_pquantity]'  ";


} else { $sql2="TRUNCATE `invtemp2`"; }

if (!mysqli_query($bd, $sql2))
  {
  die('Error: ' . mysqli_error($bd));
  }
?>

</head>
<body>
<div id="header"></div>   
 <link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript">


</script>

</br>



<table width="600" border="0" align="center"  >
<tr>
  <td bgcolor="#EFF0F1">

<form id="form1" name="form1" method="post" action="insertinvtemp.php?filter=1" enctype="multipart/form-data">
</br>

<table border="0">

<?php
include('database_connection.php');
 $sql=mysqli_query($bd,"SELECT * FROM `invtemp`");
 $re= mysqli_fetch_assoc($sql);

 ?>

<tr><td>Supplier Name :</td><td> <?php

$sql1=mysqli_query($bd,"SELECT * FROM `supplier` WHERE `sup_ID` = '$re[sup_name]'");
 $re1= mysqli_fetch_assoc($sql1);


 echo $re1['sup_name']; ?> </td></tr>
<tr><td>Date :</td><td> <?php echo $re['p_add_date']; ?> </td></tr>
<tr><td>Total Price :</td><td> <?php echo $re['total_price']; ?> </td></tr>
<tr><td>Quantity :</td><td> <?php echo $re['total_quantity']; ?> </td></tr>	

</table>
<br><br>
<table class="table table-bordered" border="0">

<tr>
	<td><label class="control-label">Product: </label></td>
	<td> <label class="control-label">Unit Price </label></td>
	<td><label class="control-label">Quantity: </label></td>
</tr>

<tr>
	<td><select name="p_ID" class="form-control" required>
        <?php 
   
      
      $result = mysqli_query($bd,"SELECT * FROM `product`");
    while($r = mysqli_fetch_array($result)) {
      ?>

<option  value="<?php echo $r['p_ID']; ?>"><?php echo $r['p_name'];   ?></option>

  <?php
}
  ?>

</select>
</td>
	<td><input class="form-control" type="number" name="p_uprice" id="p_uprice" required/></td>
	<td><input class="form-control" type="number" name="p_pquantity" id="p_pquantity"  required/></td>
	<td><input class="btn btn-primary" value="Add" type="submit"></td>
</tr>	
<!-- </table>
<table class="table table-bordered"> -->
<?php 
$sqltemp2=mysqli_query($bd,"SELECT * FROM `invtemp2`");
while ($temp2r = mysqli_fetch_array($sqltemp2)) {
	?>


  <tr>
    <td> <?php 
      $pnamesql=mysqli_query($bd,"SELECT `p_name` FROM `product` WHERE `p_ID` = '$temp2r[p_id]'");
        $pnamere = mysqli_fetch_assoc($pnamesql);
    echo $pnamere['p_name']; ?> </td>
  	<td> <?php echo $temp2r['u_price']; ?></td>
  	<td> <?php echo $temp2r['quantity']; ?></td>
  </tr>


<?php } ?>
</table>
 <a href="insertinventory.php"> <input class="btn btn-primary" value="Confirm"></a>
</div>

 
</div>
</div>
 </form>
 </td>
 </tr>
 </table>
 </br>
</br>

</body>
</html>