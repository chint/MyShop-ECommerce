<html>
<head>
<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }

    window.close();
</script>

 
</head>
 <link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<body>

<?php

//INSERT INTO  `shop`.`pro_att` (`p_id` ,`att_id`  ,`value`)VALUES ( '$pid', (SELECT `a_ID` from `shop`.`attribute` WHERE `attribute`.`a_name` = '$name'),  '$value')";
//"UPDATE  `shop`.`pro_att` SET`p_id` = '$id',`value` =  '$value'  WHERE  `pro_att`.`p_id` ='$id' AND `pro_att`.`att_id`=(SELECT `a_ID` from `shop`.`attribute` WHERE `attribute`.`a_name` = '$name')" ;
include('database_connection.php');

echo $_GET['p_id'];
$id=$_GET['p_id'];



foreach($_POST as $name => $value) 
{ 
	if($name!="submit")
	{
				// echo $name . " " . $value . "<br>"; 
				if($value==null||$value==""||$value==" ")
				{

				}else{

$sql = "INSERT INTO  `shop`.`pro_att` (`p_id` ,`att_id`  ,`value`)VALUES ( '$id', (SELECT `a_ID` from `shop`.`attribute` WHERE `attribute`.`a_name` = '$name'),  '$value') ON DUPLICATE KEY UPDATE `value` = '$value'; ";
			if (!mysqli_query($bd,$sql))
			  {
			  die('Error: ' . mysqli_error($bd));
			  }
			
		}
	}
   
} 



//mysqli_close($bd);
echo "product upadte  completed <br>";
$sql1 = "SELECT `brand`.`b_name` AS brand ,`category`.`c_name` AS cat,`product`.*
FROM product, brand, category
WHERE ((`product`.`cat_ID` =`category`.`c_ID`) AND (`product`.`B_ID` =`brand`.`b_ID`)AND(`product`.`p_ID` =$id))";
$result = mysqli_query($bd,$sql1);
?>
  <div class="col-md-7">
      <div class="well">
        <div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
    100% Completed!
  </div>
</div>
<?php

   while($r = mysqli_fetch_array($result)) {
      ?>
   <!--  <input name="p_ID" type="text" id="p_ID" value="" readonly="readonly" /> -->
  <div class="form-group">
    <label class="control-label">Product ID:</label>
     <label class="label label-success"><?php echo $r['p_ID']; ?></label>
</div>
<div class="form-group">
    <label class="control-label">Product Name:</label>
     <label class="label label-success"><?php echo $r['p_name']; ?></label>
</div>
<div class="form-group">
    <label class="control-label">Product Model No.:</label>
     <label class="label label-success"><?php echo $r['p_modelno']; ?></label>
</div>
<div class="form-group">
    <label class="control-label">Product Brand:</label>
     <label class="label label-success"><?php echo $r['brand']; ?></label>
</div>
<div class="form-group">
    <label class="control-label">Product Category:</label>
     <label class="label label-success"><?php echo $r['cat']; ?></label>
</div>
<div class="form-group">
    <label class="control-label">Product Price:</label>
     <label class="label label-success"><?php echo $r['p_price']; ?></label>
</div>
<div class="form-group">
    <label class="control-label">Product Model No.:</label>
     <label class="label label-success"><?php echo $r['p_qih']; ?></label>
</div>
<div class="form-group">
    <label class="control-label">Product Reorder level:</label>
     <label class="label label-success"><?php echo $r['p_reorderlvl']; ?></label>
</div>
<div class="form-group">
    <label class="control-label">Product Image:</label>
     <label class="label label-success"><?php echo $r['p_image']; ?></label>

</div>
<div class="form-group">
    <label class="control-label">Product  Desc.:</label>
     <label class="label label-success"><?php echo $r['p_desc']; ?></label>
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
     <label class="label label-success"><?php echo $r['value']; ?></label>
</div>

<?php
}

session_start();

$suser=$_SESSION['suser'];
$_SESSION['frmpedit']=0;
$_SESSION['frmpattribute']=0;
$_SESSION['epid']=0;

// if($suser == 1) {
//   header("location: ../admin/adminpro.php");
// }else if($suser == 2) {
//   header("location: ../mod/modpro.php");
// }
?>


 </div>
</div>
 </body>
  <html>