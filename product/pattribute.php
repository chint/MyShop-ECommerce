<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="jquery.min.js" type="text/javascript"></script>
 <link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<script type="text/javascript">
  function sessioncl(){
   
  }

</script>


</head>

<?php
session_start();
$_SESSION['frmpattribute']=1;
?>

<body>



 
<div class="col-md-7">
      <div class="well">
<form name="myForm" action="pfinish.php" method="post" onsubmit="return validateForm()">
<div >
    <span class="sr-only">Enter Product Attributes</span>
  
</div>
<table id="dataTable"  class="table table-bordered">
<tr>
<td class="bg-primary" colspan="3">
  Attributes For Product ID <?php echo "- ".$_SESSION['productid'];  ?>
</td>

</tr>
 <tr><td class="bg-primary">  <label class="control-label">Attribute </label></td>
  <td class="bg-primary"><label class="control-label">Value </label></td> 
 <td class="bg-primary"><label class="control-label">Unit </label></td></tr>
   <?php 
   
      include('database_connection.php');
     $result = mysqli_query($bd,"SELECT * FROM `attribute`");
    while($r = mysqli_fetch_array($result)) {
      ?>
  
 <tr>
 <td >
  <label class=" label label-info"><?php echo $r['a_name'];   ?> </label>
  
</td>
  <td><input name="<?php echo $r['a_name']; ?>" type="text" id="a_val" /></td>
   <td align="left">
  <label class=" label label-info" ><?php echo $r['a_desc'];   ?> </label>
  
</td>
</tr>
  <?php
}
  ?>

  <tr><td colspan="2" align="right"> 
    <div class="form-group">
      <input name="submit" type="submit" id="submit" class="btn btn-primary" onClick="sessioncl();" >
  </div>
</td>
</tr>
</table>
<!-- <a type="btn" href="../attribute/addattribute.php">Add New Attribute</a> -->
<a href="javascript:AlertIt();">Add New Attribute</a>

  
</form>

<script type="text/javascript">
function AlertIt() {
var answer = confirm ("Unsaved attribute values will be discarted.Click OK to continue")
if (answer)
window.location="../attribute/addattribute.php";
}
</script>

</div>
</div>




</body>
</html>