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
$a=$_GET['cid'];

$result = mysqli_query($bd, "SELECT * FROM `shop`.`Category` WHERE `c_ID` = '$a'");

if ($row = mysqli_fetch_array( $result)) {
//$id = $row['c_id'];
//echo "<script type='text/javascript'>alert('$id');</script>";
?>

<body>
 
<div id="header"></div>  
<div class="col-md-7">
      <div class="well">
  
<form id="form1" name="form1" method="post" action="updatecat.php?c_ID=<?php echo $row['c_ID']; ?>" enctype="multipart/form-data">


<div class="form-group">
  <label class="control-label">Category ID: </label>
   
    
    <input class="form-control" type="text" name="c_ID" id="c_ID" value="<?php echo $row['c_ID']; ?>" disabled/>
  </div>
  

 

  <div class="form-group">
  <label class="control-label">Category Name: </label>
   
    
    <input class="form-control" type="text" name="c_name" id="c_name" value="<?php echo $row['c_name']; ?>" required/>
  </div>

  <div class="form-group">
  <label class="control-label">Category Description</label>
   
    <input class="form-control" type="text" name="c_desc" id="c_desc" value="<?php echo $row['c_desc']; ?>"  />
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