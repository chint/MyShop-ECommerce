<html>
<head>

 <script type="text/javascript" src="http://localhost/bootstrap/js/jquery-1.11.2.min.js"></script> 
<link rel="stylesheet" type="text/css" href="http://localhost/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="http://localhost/shop/admin/stylee1.css">

  
<?php
session_start();

$_SESSION['frmaddp']=1;
$_SESSION['frmpedit']=0;
$_SESSION['admp']=0;
$log=$_SESSION['suser'];
$_SESSION['remove1']=0;

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

$sql="TRUNCATE `invtemp`";

if (!mysqli_query($bd, $sql))
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

<form id="form1" name="form1" method="post" action="temp2.php" enctype="multipart/form-data">
</br>

<div class="col-md-12">
      <div class="form-group">
  




   <label class="control-label">Inventory ID: </label>
   
    
   
     <?php 
   
      
      $result = mysqli_query($bd,"SELECT * FROM `shop`.`inventory` WHERE `inv_ID` = '$_GET[invid]' ");
      $r = mysqli_fetch_assoc($result); 
      
      ?>

    <input name="inv_ID" type="text" id="inv_ID" value="<?php echo $r['inv_ID']; ?>" readonly="readonly"  class="form-control"/>
      
   
</div>
  <div class="form-group">
  
   <label class="control-label">Supplier Name: </label>
    

      <select name="sup_ID" class="form-control" required>
        <?php 
   
      
      $result1 = mysqli_query($bd,"SELECT * FROM `supplier`");
    while($r1 = mysqli_fetch_array($result1)) {
      ?>

<option  value="<?php echo $r1['sup_ID'];?>" <?php 
   if($r1['sup_ID']==$r['sup_ID']) {
      echo "selected"; 
      } ?> ><?php echo $r1['sup_name'];   ?></option>

  <?php } ?>
</select>

  </div>
  
  <div class="form-group">
  <label class="control-label">Date: </label>
   
    
    <input class="form-control" type="date" name="p_add_date" id="p_add_date" value="<?php echo $r['p_add_date']; ?>" required/>
  </div>

  <div class="form-group">
  <label class="control-label">Total Price: </label>
   
    <input class="form-control" type="number" name="total_price" id="total_price" value="<?php echo $r['total_price']; ?>"  required/>
  </div>

 
  
  <div class="form-group">
  <label class="control-label">Quantity: </label>
   
    <input class="form-control" type="number" name="total_quantity" id="total_quantity" value="<?php echo $r['total_pquantity']; ?>" required/>
  </div>

  
     <div class="form-group">
  <input name="submit" type="submit" id="submit" class="btn btn-primary" value="Next">
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