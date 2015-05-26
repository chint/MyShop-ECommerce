<html>
<head>

  <link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<?php


include('database_connection.php');



// $sql="SELECT * from `shopping`.`cus`;"
//$sql = "SELECT `c_fname` FROM `shopping`.`cus` WHERE `un` = $_POST[srch]";

$result = mysqli_query($bd, "SELECT * FROM `shop`.`inventory` WHERE `inv_ID` = '$_POST[inv_ID]'");

if ($row = mysqli_fetch_array( $result)) {
//$id = $row['c_id'];
//echo "<script type='text/javascript'>alert('$id');</script>";
?>

<body>

  <div class="col-md-7">
      <div class="well">

<form name="myForm" action="updateinventory.php?inv_ID=<?php echo $row['inv_ID']; ?>" method="post" onSubmit="return validateForm()" data-toggle="validator">

<div class="form-group">
    <label class="control-label">Inventory ID</label>
    <input type="number" name="inv_id" id="inv_id" class="form-control"  value="<?php echo $row['inv_ID']; ?>" disabled/>
</div>


  <div class="form-group">
    <label class="control-label">Supplier ID</label>
    <input type="number" name="s_id" id="s_id" class="form-control"  placeholder="Enter Supplier ID" value="<?php echo $row['sup_ID']; ?>" required/>
</div>

<div class="form-group">
    <label class="control-label">User ID</label>
    <input type="number" name="u_id" id="u_id" class="form-control"  placeholder="Enter User ID" value="<?php echo $row['u_ID']; ?>" required/>
</div>

<div class="form-group">
    <label class="control-label">Date</label>
    <input type="date" name="date" id="date" class="form-control"  placeholder="Enter Date" value="<?php echo $row['p_add_date']; ?>" required/>
</div>
 
 <div class="form-group">
    <label class="control-label">Purchased Price</label>
    <input type="number" name="p_price" id="p_price" class=" form-control"  placeholder="Enter Purchased Price" value="<?php echo $row['purchased_price']; ?>" required/>
  
</div>
  
  <div class="form-group">
    <label class="control-label">Unit Price</label>
    <input type="number" name="u_price" id="u_price" class="form-control"  placeholder="Enter Purchased Unit Price" value="<?php echo $row['purchased_unit_price']; ?>" required/>
</div>
  
 <div class="form-group">
  <input name="submit" type="submit" id="submit" class="btn btn-primary" >
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
  <html>