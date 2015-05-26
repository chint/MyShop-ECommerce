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

$result = mysqli_query($bd, "SELECT * FROM `shop`.`attribute` WHERE `a_id` = '$_GET[aid]'");

if ($row = mysqli_fetch_array( $result)) {
//$id = $row['c_id'];
//echo "<script type='text/javascript'>alert('$id');</script>";
?>
</head>

<body>
<div id="header"></div> 
  <div class="col-md-7">
      <div class="well">

<form name="myForm" action="updateattri.php?a_id=<?php echo $row['a_id']; ?>" method="post" onSubmit="return validateForm()">

<div class="form-group">
    <label class="control-label">Attribute Name</label>
    <input type="text" name="a_name" id="a_name" class="form-control"  placeholder="Enter Attribute Name " value="<?php echo $row['a_name']; ?>" required/>
</div>


<div class="form-group">
    <label class="control-label">Attribute Description</label>
    <input type="text" name="a_desc" id="a_desc" class="form-control"  placeholder="Enter Attribute Description" value="<?php echo $row['a_desc']; ?>" />
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