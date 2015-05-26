<html>
<head>
 
 <script type="text/javascript" src="http://localhost/bootstrap/js/jquery-1.11.2.min.js"></script> 
<link rel="stylesheet" type="text/css" href="http://localhost/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="http://localhost/shop/admin/stylee1.css">
<script src="../ckeditor/ckeditor.js"></script>
  
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

$result = mysqli_query($bd, "SELECT * FROM `shop`.`pay-methods` WHERE `paym_ID` = '$a'");

if ($row = mysqli_fetch_array( $result)) {
//$id = $row['c_id'];
//echo "<script type='text/javascript'>alert('$id');</script>";
?>

<body>
 
<div id="header"></div>  
<div class="col-md-7">
      <div class="well">
  
<form id="form1" name="form1" method="post" action="savepaym.php?edit=1&paym_ID=<?php echo $row['paym_ID']; ?>" enctype="multipart/form-data">
  <div class="form-group">
    <label class="control-label">Payment Method ID</label>
    <input type="text" name="pay_ID" id="pay_ID" class="form-control"  value="<?php echo $row['paym_ID']; ?>" disabled/>
</div>

 <div class="form-group">
    <label class="control-label">Payment Method Name</label>
    <input type="text" name="pay_name" id="pay_name" class="form-control"  value="<?php echo $row['paym_name']; ?>"  placeholder="Enter Payment Method Name "required />
</div>

<textarea class="form-control"  name="pay_desc" id="pay_desc1" >  <?php echo $row['paym_desc']; ?> </textarea>
<!-- 
<div class="form-group">
    <label class="control-label">Payment Method Description</label>
    <input type="text" name="pay_desc" id="pay_desc" class="form-control" value="<?php echo $row['paym_desc']; ?>" placeholder="Enter Payment Method Description "required />
</div> -->
 
  <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'pay_desc1' );
            </script>
  

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