<html>
<head>

 <script type="text/javascript" src="http://localhost/bootstrap/js/jquery-1.11.2.min.js"></script> 
<link rel="stylesheet" type="text/css" href="http://localhost/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="http://localhost/shop/admin/stylee1.css">

  
<?php
session_start();


$log=$_SESSION['suser'];
$_SESSION['insattri']=1;

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
              $("#header").load("../admin/adminheader.php"); 
                        });
 </script>

 
<?php
}
?>


</head>
 
<body>
<div id="header"></div>   
  <div class="col-md-7">
      <div class="well">

<form name="myForm" action="insertattri.php" method="post" onSubmit="return validateForm()">

  <div class="form-group">
    <label class="control-label">Attribute Name</label>
    <input type="text" name="a_name" id="a_name" class="form-control"  placeholder="Enter Attribute Name " required/>
</div>


<div class="form-group">
    <label class="control-label">Attribute Description</label>
    <input type="text" name="a_desc" id="a_desc" class="form-control"  placeholder="Enter Attribute Description " required/>
</div>
 <div class="form-group">
  <input name="submit" type="submit" id="submit" class="btn btn-primary" >
</div>
  </form>
  </div>
</div>
  </body>
  <html>