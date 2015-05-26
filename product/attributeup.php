<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="jquery.min.js" type="text/javascript"></script>
 <link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<head>
<?php
 $id=$_GET['pid'];
 session_start();
 $_SESSION['frmpedit']=1;
 $_SESSION['frmpattribute']=0;
  
?>

</head>
<body> 



<div class="col-md-7">
      <div class="well">
<form name="myForm" action="pupdatefinish.php?p_id=<?php echo $id; ?>" method="post" onsubmit="return validateForm()">

<table id="dataTable"  class="table table-bordered">
<tr>
<td class="bg-primary" colspan="4">
  Attributes For Product ID <?php echo " - ". $id;  ?>
</td>

</tr>
 <tr><td class="bg-primary">  <label class="control-label">Attribute </label></td>
  <td class="bg-primary"><label class="control-label">Value </label></td>
  <td class="bg-primary"><label class="control-label">Unit </label></td>
<td class="bg-primary"><label class="control-label">Remove </label></td>

  </tr>
 
   <?php 
  
   
      include('database_connection.php');
     $result = mysqli_query($bd,"SELECT `attribute`.* ,`pro_att`.* FROM `shop`.`pro_att` RIGHT JOIN `shop`.`attribute` ON `pro_att`.`p_id`=$id AND `attribute`.`a_id`=`pro_att`.`att_id`");
    while($r = mysqli_fetch_array($result)) {
      ?>
 
 <tr>
  <td >
  <label class=" label label-info"> 
    <?php echo $r['a_name'];   ?> 
  </label></td>

  <td><input name="<?php echo $r['a_name']; ?>" type="text" id="a_val" value= "<?php echo $r['value']; ?> "/></td>
  <td align="left">
  <label class=" label label-info" ><?php echo $r['a_desc'];   ?> </label>
  
</td>
<td align="left">
  <a href="javascript:AlertIt2();"  type="button" class="glyphicon glyphicon-remove btn-danger"></a>
  <script type="text/javascript">
function AlertIt2() {
var answer = confirm ("Attribute Value will be removed.Click OK to continue")
if (answer)
window.location="../product/delproatt.php?att_id=<?php echo $r['att_id'];?>&pid=<?php echo $id;?>";
}
</script>
</td>
</tr>
  <?php
}
  ?>

  <tr><td colspan="3" align="right"> 
    <div class="form-group">
      <input name="submit" type="submit" id="submit" class="btn btn-primary" >
  </div>
</td>
</tr>
</table>
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