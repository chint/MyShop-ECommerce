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

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="jquery.min.js" type="text/javascript"></script>
<html>

<body>
<div id="header"></div>   

 <link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript">


</script>

<div class="col-md-7">
      <div class="well">
  
<form id="form1" name="form1" method="post" action="insertcat.php" enctype="multipart/form-data">



  

 

  <div class="form-group">
  <label class="control-label">Category Name: </label>
   
    
    <input class="form-control" type="text" name="c_name" id="c_name" required />
  </div>

  <div class="form-group">
  <label class="control-label">Category Description</label>
   
    <input class="form-control" type="text" name="c_desc" id="c_desc"  />
  </div>

 

     <div class="form-group">
  <input name="submit" type="submit" id="submit" class="btn btn-primary" >
</div>

  </form>
</div>
</div>
</body>
</html>