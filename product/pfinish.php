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

// include("a/conn.php");
include('database_connection.php');
// $sql="INSERT INTO cus (c_fname, c_mname, c_lname, c_dob,c_tp, c_shaddr1, c_shaddr2, c_shaddr3, c_baddr1, c_baddr2, c_baddr3, un, pw)
// VALUES
// ($_POST[c_fname],$_POST[c_mname],$_POST[c_lname],$_POST[c_dob],$_POST[c_tp],$_POST[c_shaddr1],$_POST[c_shaddr2],$_POST[c_shaddr3],$_POST[c_baddr1],$_POST[c_baddr2],$_POST[c_baddr3],$_POST[un],$_POST[pw])";

// $p_ID = mysqli_query($bd,"SELECT `p_ID` FROM `shop`.`product` ORDER BY p_ID DESC LIMIT 1;");
// $row = mysqli_fetch_array($p_ID);
// $row =$_POST['p_brand'];
// print $row;
session_start();
$pid= $_SESSION['productid'] ;
$suser=$_SESSION['suser'];
$_SESSION['frmpedit']=0;
$_SESSION['frmpattribute']=0;
$_SESSION['epid']=0;

foreach($_POST as $name => $value) 
{ 
	if($name!="submit")
	{
				// echo $name . " " . $value . "<br>"; 
				if($value==null||$value=="")
				{

				}else{
         
$sql = "INSERT INTO  `shop`.`pro_att` (`p_id` ,`att_id`  ,`value`)VALUES ( '$pid', (SELECT `a_ID` from `shop`.`attribute` WHERE `attribute`.`a_name` = '$name'),  '$value')";

			if (!mysqli_query($bd,$sql))
			  {
			  die('Error: ' . mysqli_error($bd));
			  }
			
		}
	}
   
} 
echo "product insertion  completed <br>";
$sql1 = "SELECT `brand`.`b_name` AS brand ,`category`.`c_name` AS cat,`product`.*
FROM product, brand, category
WHERE ((`product`.`cat_ID` =`category`.`c_ID`) AND (`product`.`B_ID` =`brand`.`b_ID`)AND(`product`.`p_ID` =$pid))";
$result = mysqli_query($bd,$sql1);
?>
  
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
WHERE  ( `pro_att`.`p_ID` ='$pid') AND ( `attribute`.`a_id` =`pro_att`.`att_id`) ";


$result = mysqli_query($bd,$sql2);
  while($r = mysqli_fetch_array($result)) {

  ?>

<div class="form-group">
    <label class="control-label"><?php echo $r['a_name']; ?></label>
     <label class="label label-success"><?php echo $r['value']; ?></label>
</div>

<?php
}

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