<html>
<head>

 <script type="text/javascript" src="http://localhost/bootstrap/js/jquery-1.11.2.min.js"></script> 
<link rel="stylesheet" type="text/css" href="http://localhost/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="http://localhost/shop/admin/stylee1.css">

  
<?php
session_start();

$_SESSION['frmaddp']=1;
$_SESSION['frmpedit']=0;
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

<form id="form1" name="form1" method="post" action="re_insert.php" enctype="multipart/form-data">
</br>

<div class="col-md-12">
      <div class="form-group">
  




   <label class="control-label">Order ID: </label>

    <input name="Or_ID" type="number" id="Or_ID"  class="form-control"/>
 </td>

</tr>
<tr>
 <td>
   <input name="submit" type="submit" id="submit" class="btn btn-primary" >
</td>
</tr>
 </form>
 
 </table>
 </br>
</br>

</body>
</html>