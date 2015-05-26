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

<form id="form1" name="form1" method="post" action="temp.php" enctype="multipart/form-data">
</br>

<div class="col-md-12">
      <div class="form-group">
  




   <label class="control-label">Inventory ID: </label>
   
    
   
     <?php 
   
      
      $result = mysqli_query($bd,"SELECT `inv_ID` FROM `shop`.`inventory` ORDER BY inv_ID DESC LIMIT 1;");
    while($r = mysqli_fetch_array($result)) {
      $id= $r['inv_ID']+1;
      ?>

    <input name="inv_ID" type="text" id="inv_ID" value="<?php echo $id; ?>" readonly="readonly"  class="form-control"/>
      <?php
}
  ?>
   
</div>
  <div class="form-group">
  
   <label class="control-label">Supplier Name: </label>
    

      <select name="sup_ID" class="form-control" required>
        <?php 
   
      include('database_connection.php');
      $result = mysqli_query($bd,"SELECT * FROM `supplier`");
    while($r = mysqli_fetch_array($result)) {
      ?>

<option  value="<?php echo $r['sup_ID']; ?>"><?php echo $r['sup_name'];   ?></option>

  <?php
}
  ?>

</select>
<a type="btn" href="../brand/addbr.php">Add Supplier</a>

  </div>
  
  <div class="form-group">
  <label class="control-label">Date: </label>
   
    
    <input class="form-control" type="date" name="p_add_date" id="p_add_date" required/>
  </div>

  <div class="form-group">
  <label class="control-label">Total Price: </label>
   
    <input class="form-control" type="number" name="total_price" id="total_price"  required/>
  </div>

 
  
  <div class="form-group">
  <label class="control-label">Quantity: </label>
   
    <input class="form-control" type="number" name="total_quantity" id="total_quantity" required/>
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