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
 <link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<body>
<div id="header"></div>

<?php
include('database_connection.php');


$id=$_GET['pid'];

$sql1 = "SELECT `brand`.`b_name` AS brand ,`category`.`c_name` AS cat,`product`.*
FROM product, brand, category
WHERE ((`product`.`cat_ID` =`category`.`c_ID`) AND (`product`.`B_ID` =`brand`.`b_ID`)AND(`product`.`p_ID` =$id))";
$result = mysqli_query($bd,$sql1);
?>
  <div class="col-md-7">
      <div class="well">
        <div >
 
</div>
<?php

   while($r = mysqli_fetch_array($result)) {
      ?>
   <!--  <input name="p_ID" type="text" id="p_ID" value="" readonly="readonly" /> -->
   <div class="form-group">
    <img    alt="Responsive image" src="http://localhost/shop/web/proimg/<?php echo $r['p_image']; ?>" alt=""  height="250" width="250" />
</div>
  <div class="form-group">
    <label class="control-label">Product ID:</label>
    <?php echo $r['p_ID']; ?>
</div>
<div class="form-group">
    <label class="control-label">Product Name:</label>
    <?php echo $r['p_name']; ?> 
</div>
<div class="form-group">
    <label class="control-label">Product Model No.:</label>
    <?php echo $r['p_modelno']; ?> 
</div>
<div class="form-group">
    <label class="control-label">Product Brand:</label>
    <?php echo $r['brand']; ?> 
</div>
<div class="form-group">
    <label class="control-label">Product Category:</label>
    <?php echo $r['cat']; ?> 
</div>
<div class="form-group">
    <label class="control-label">Product Price:</label>
    <?php echo $r['p_price']; ?> 
</div>
<div class="form-group">
    <label class="control-label">Product Model No.:</label>
    <?php echo $r['p_qih']; ?> 
</div>
<div class="form-group">
    <label class="control-label">Product Reorder level:</label>
    <?php echo $r['p_reorderlvl']; ?> 
</div>
<div class="form-group">
    <label class="control-label">Product Image:</label>
    <?php echo $r['p_image']; ?> 

</div>
<div class="form-group">
    <label class="control-label">Product  Desc.:</label>
     <?php echo $r['p_desc']; ?> 
</div>
    
     
  <?php
}

$sql2 = "SELECT `pro_att`.`p_id`,`attribute`.`a_name` ,`pro_att`.`value` FROM   pro_att ,attribute
WHERE  ( `pro_att`.`p_ID` ='$id') AND ( `attribute`.`a_id` =`pro_att`.`att_id`) ";


$result = mysqli_query($bd,$sql2);
  while($r = mysqli_fetch_array($result)) {

  ?>



<div class="form-group">
    <label class="control-label"><?php echo $r['a_name']; ?></label>
    <?php echo $r['value']; ?></label>
</div>

<?php
}

?>


 </div>
</div>

 </body>
  <html>