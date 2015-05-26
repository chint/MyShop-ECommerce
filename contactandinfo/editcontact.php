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


include('../database_connection.php');
 
 
$a=$_GET['id'];

$result = mysqli_query($bd, "SELECT * FROM `shop`.`contact` WHERE `id` = '$a'");

if ($row = mysqli_fetch_array( $result)) {
//$id = $row['c_id'];
//echo "<script type='text/javascript'>alert('$id');</script>";
?>

<body>
 
<div id="header"></div>  
<div class="col-md-7">
      <div class="well">
   <label class="control-label">Edit Contact Details </label>
<form id="form1" name="form1" method="post" action="savecontact.php?edit=1&id=<?php echo $row['id']; ?>" enctype="multipart/form-data">
<textarea class="form-control"  name="contact" id="contact" > <?php echo htmlentities($row['contact'], ENT_QUOTES) ; ?> </textarea>
 
 
  <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'contact' );
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