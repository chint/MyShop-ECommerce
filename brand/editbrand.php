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





<?php
include('database_connection.php');



// $sql="SELECT * from `shopping`.`cus`;"
//$sql = "SELECT `c_fname` FROM `shopping`.`cus` WHERE `un` = $_POST[srch]";

$result = mysqli_query($bd, "SELECT * FROM `shop`.`brand` WHERE `b_ID` = '$_GET[bid]'");

if ($row = mysqli_fetch_array( $result)) {
//$id = $row['c_id'];
//echo "<script type='text/javascript'>alert('$id');</script>";
?>
</head>

<body>
<div id="header"></div>   
  <div class="col-md-7">
      <div class="well">

<form name="myForm" action="updatebrand.php?b_ID=<?php echo $row['b_ID']; ?>" method="post" onSubmit="return validateForm()" enctype="multipart/form-data">

<div class="form-group">
    <label class="control-label">Brand ID</label>
    <input type="number" name="b_name" id="b_name" class="form-control"  value="<?php echo $row['b_ID']; ?>" disabled/>
</div>

<div class="form-group">
    <label class="control-label">Brand Name</label>
    <input type="text" name="b_name" id="b_name" class="form-control"  placeholder="Enter Brand Name " value="<?php echo $row['b_name']; ?>" required/>
</div>

<div class="form-group">
    <label class="control-label">Brand Logo</label>
    <!-- <input type="text" name="b_logo" id="b_logo" class="form-control"  placeholder="Enter Brand Logo Loction" value="<?php echo $row['b_logo']; ?>" required/> -->
    <input type="file" name="file" id="file"><br>
</div>

<div class="form-group">
    <label class="control-label">Brand Description</label>
    <input type="text" name="b_des" id="b_des" class="form-control"  placeholder="Enter Brand Description " value="<?php echo $row['b_des']; ?>" />
</div>
 <div class="form-group">
  <input name="submit" type="submit" id="submit" class="btn btn-primary" >
</div>
  </form>
  </div>
</div>

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
  <html>