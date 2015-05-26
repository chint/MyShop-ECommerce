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
<?php


include('database_connection.php');



// $sql="SELECT * from `shopping`.`cus`;"
//$sql = "SELECT `c_fname` FROM `shopping`.`cus` WHERE `un` = $_POST[srch]";
 
$a=$_GET['shipm_ID'];

$result = mysqli_query($bd, "SELECT * FROM `shop`.`shipmethod` WHERE `shipm_ID` = '$a'");

if ($row = mysqli_fetch_array( $result)) {
//$id = $row['c_id'];
//echo "<script type='text/javascript'>alert('$id');</script>";
?>

<body>
 
<div id="header"></div>  
<div class="col-md-7">
      <div class="well">
  
<form id="form1" name="form1" method="post" action="saveshipm.php?edit=1&shipm_ID=<?php echo $row['shipm_ID']; ?>" enctype="multipart/form-data">
  <div class="form-group">
    <label class="control-label">Shipping Method ID</label>
    <input type="text" name="shipm_ID" id="shipm_ID" class="form-control"  value="<?php echo $row['shipm_ID']; ?>" disabled/>
</div>

 <div class="form-group">
    <label class="control-label">Shipping Method Name</label>
    <input type="text" name="sh_name" id="sh_name" class="form-control"  value="<?php echo $row['shipm_name']; ?>"  placeholder="Enter Shipping Method Name "required />
</div>

<div class="form-group">
    <label class="control-label">Shipping Method Description</label>
    <input type="text" name="sh_desc" id="sh_desc" class="form-control" value="<?php echo $row['shipm_desc']; ?>" placeholder="Enter Shipping Method Description "required />
</div>

<div class="form-group">
    <label class="control-label">Shipping Method Cost- Rs.</label>
    <input type="text" name="sh_cost" id="sh_cost" class="form-control" value="<?php echo $row['shipm_cost']; ?>"  placeholder="Enter Shipping Method Cost" required/>
</div> 
 
  

     <div class="form-group">
  <input name="submit" type="submit" id="submit" class="btn btn-primary" >
</div>

  </form>
</div>
</div>
</body>
<?php }
?>
</html>