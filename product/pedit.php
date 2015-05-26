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




<?php


$_SESSION['frmaddp']=0;
$_SESSION['frmpedit']=1;
$_SESSION['admp']=0;
$_SESSION['epid']=$_GET['pid'];


include('database_connection.php');


$result = mysqli_query($bd, "SELECT `product`.* FROM `shop`.`product` WHERE `p_ID` =  '$_GET[pid]' ");

if ($row = mysqli_fetch_array($result)) {

?>

</head>
<body>
<div id="header"></div>   
<div class="col-md-7">
      <div class="well">
<form name="myForm" action="pupdate.php?p_id=<?php echo $row['p_ID']; ?>" method="post" onsubmit="return validateForm()" data-toggle="validator" role="form" enctype="multipart/form-data" >
<div class="form-group">
    <label class="control-label">Product ID </label>
    <input type="text" name="p_ID" id="p_ID" class="form-control"  placeholder="Enter First Name" value="<?php echo $row['p_ID']; ?>" required readonly="readonly"/>
</div>


<div class="form-group">
    <label class="control-label">Brand </label>
    <select name="B_ID" class="form-control">
        <?php 
   
      $result = mysqli_query($bd,"SELECT * FROM `brand`");
    while($r = mysqli_fetch_array($result)) {
      ?>
 
<option value="<?php echo $r['b_ID']; ?>" <?php 
if($r['b_ID']==$row['B_ID'])
{ echo 'selected="selected"';}?> ><?php echo $r['b_name'];   ?></option>

  <?php } ?>

</select>
<a type="btn" href="../brand/addbrand.php">Add New Brand</a>
</div>
 
<div class="form-group">
    <label class="control-label">Category </label>
    <select name="cat_ID" class="form-control">
        <?php 
   
      $result = mysqli_query($bd,"SELECT * FROM `Category`");
    while($r = mysqli_fetch_array($result)) {
      ?>
 
<option value="<?php echo $r['c_ID']; ?>" <?php 
if($r['c_ID']==$row['cat_ID'])
{ echo 'selected="selected"';}?> ><?php echo $r['c_name'];   ?></option>

  <?php } ?>

</select>
<a type="btn" href="../category/addcat.php">Add New Category</a>
</div>

<div class="form-group">
    <label class="control-label">Product Name </label>
    <input type="text" name="p_name" id="p_name"  class="form-control"  placeholder="Enter First Name" value="<?php echo $row['p_name']; ?>" required  />
</div>

<div class="form-group">
    <label class="control-label">Model No.  </label>
    <input type="text" name="p_modelno" id="p_modelno"  class="form-control"  placeholder="Enter First Name" value="<?php echo $row['p_modelno']; ?>" required  />
</div>

<div class="form-group">
    <label class="control-label">Price  </label>
    <input type="text" name="p_price" id="p_price" class="form-control"  placeholder="Enter First Name" value="<?php echo $row['p_price']; ?>" required  />
</div>

<div class="form-group">
    <label class="control-label">Quantity In hand  </label>
    <input type="text" name="p_qih" id="p_qih"  class="form-control"  placeholder="Enter First Name" value="<?php echo $row['p_qih']; ?>" required  />
</div>

<div class="form-group">
    <label class="control-label">Reorder level</label>
    <input type="text" name="p_reorderlvl" id="p_reorderlvl" class="form-control"  placeholder="Enter First Name" value="<?php echo $row['p_reorderlvl']; ?>" required  />
</div>

<div class="form-group">
    <label for="file">Image:</label>
<input type="file" name="file" id="file"><br>
</div>

<div class="form-group">
    <label class="control-label">Other Description </label>
<textarea class="form-control"  name="p_desc" id="p_desc" ><?php echo htmlentities($row['p_desc'], ENT_QUOTES) ; ?>   </textarea>
  </div>
 
  <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'p_desc' );
            </script><script src="../ckeditor/ckeditor.js"></script>

<div class="form-group">
  <input name="submit" value="Next" type="submit" id="submit" class="btn btn-primary" >
</div>

</form>

<?php
} else {
 echo "no results found";
}


// while($row = mysql_fetch_array($result))
//   {
//   echo $row['c_fname'];
//   echo "<br>";
//   }

mysqli_close($bd);
?>


</body>
</html>