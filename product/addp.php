<html>
<head>

 <script type="text/javascript" src="http://localhost/bootstrap/js/jquery-1.11.2.min.js"></script> 
<link rel="stylesheet" type="text/css" href="http://localhost/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="http://localhost/shop/admin/stylee1.css">

    <script src="../ckeditor/ckeditor.js"></script>
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

<form id="form1" name="form1" method="post" action="pinsert.php" enctype="multipart/form-data">
</br>

<div class="col-md-12">
      <div class="form-group">
  




   <label class="control-label">Product ID: </label>
   
    
   
     <?php 
   
      include('database_connection.php');
      $result = mysqli_query($bd,"SELECT `p_ID` FROM `shop`.`product` ORDER BY p_ID DESC LIMIT 1;");
    while($r = mysqli_fetch_array($result)) {
      $id= $r['p_ID']+1;
      ?>

    <input name="p_ID" type="text" id="p_ID" value="<?php echo $id; ?>" readonly="readonly"  class="form-control"/>
      <?php
}
  ?>
   
</div>
  <div class="form-group">
  
   <label class="control-label">Brand: </label>
    

      <select name="B_ID" class="form-control"  required>
      <option disabled selected></option>
        <?php 
   
      include('database_connection.php');
      $result = mysqli_query($bd,"SELECT * FROM `brand`");
    while($r = mysqli_fetch_array($result)) {
      ?>
 
<option  value="<?php echo $r['b_ID']; ?>"><?php echo $r['b_name'];   ?></option>

  <?php
}
  ?>

</select>
<a type="btn" href="../brand/addbrand.php">Add New Brand</a>

  </div>
   <div class="form-group">
  
   <label class="control-label">Category: </label>
 
    
    <select name="C_ID" class="form-control" required>
 <option disabled selected></option>
   <?php 
   
      include('database_connection.php');
      $result = mysqli_query($bd,"SELECT * FROM `category`");
    while($r = mysqli_fetch_array($result)) {
      ?>
 
<option value="<?php echo $r['c_ID']; ?>"><?php echo $r['c_name'];   ?></option>

  <?php
}
  ?>
</select>
<a type="btn" href="../category/addcat.php">Add New Category</a>
  </div>
  <div class="form-group">
  <label class="control-label">Product Name: </label>
   
    
    <input class="form-control" type="text" name="p_name" id="p_name" required/>
  </div>

  <div class="form-group">
  <label class="control-label">Model No: </label>
   
    <input class="form-control" type="text" name="p_modelno" id="p_modelno" required />
  </div>

 <div class="form-group">
  <label class="control-label">Price: </label>
    <div class="input-group">
    <div class="input-group-addon">Rs.</div><input class="form-control" type="number" name="p_price" id="p_price" required />
    <div class="input-group-addon">.00</div>
  </div>  </div>
  
  <div class="form-group">
  <label class="control-label">Quantity In hand: </label>
   
    <input class="form-control" type="number" name="p_qih" id="p_qih" required/>
  </div>

  <div class="form-group">
  <label class="control-label">Reorder Level: </label>
   
    <input class="form-control" type="text" name="p_reorderlvl" id="p_reorderlvl" required/>
  </divnumber
  <div class="form-group">
  <!-- <label class="control-label">Image: </label> -->
   <label for="file">Image:</label>
<input type="file" name="file" id="file" required><br>
  </div>

<div class="form-group">
  <label class="control-label">Other Desc: </label>
     <!-- <input class="form-control" type="text" name="p_desc" id="p_desc"/> -->
 
<textarea class="form-control"  name="p_desc" id="p_desc" >   </textarea>
  </div>
 
  <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'p_desc' );
            </script>
  


     <div class="form-group">
  <input name="submit" value="Next" type="submit" id="submit" class="btn btn-primary" >
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