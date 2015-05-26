<html>
 <head>
 <script type="text/javascript" src="http://localhost/bootstrap/js/jquery-1.11.2.min.js"></script> 
<link rel="stylesheet" type="text/css" href="http://localhost/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="stylee1.css">

<script type="text/javascript">

function popitup(url) {
       newwindow=window.open(url,'windowName','height=600,width=600');
       if (window.focus) {newwindow.focus()}
       return false;
     }


     </script>


<?php
session_start();

$_SESSION['admp']=1;
$log=$_SESSION['suser'];

if ($log != 1 && $log != 2) { 
   header ("Location: index.php");
 
}elseif ($log == 1) {

?>
 <script>
            $(function(){
              $("#header").load("adminheader1.php"); 
                        });
 </script>

<?php
 }elseif ($log == 2) {
  ?>
  <script>
            $(function(){
              $("#header").load("modheader.php"); 
                        });
 </script>

 
<?php
}
?>
  
   
</head>



<body>

<div id="header"></div>   
<h1 style="font-size: 30">Brands</h1>
<table width="1350" border="1" align="center" class="table table-bordered " >
<tr>
  <td width="1120" height="142" bgcolor="#EFF0F1">

<a class="btn"  onClick="popitup('../brand/addbrand.php')">Add Brand</a>
 <table id="sumtable" width="200" border="1" align="center" cellpadding="1" cellspacing="1" class="table table-bordered">
  <tr>
    <td class="bg-primary" width=200>  <label class="control-label">Brand ID </label></td>
  <td class="bg-primary"><label class="control-label">Brand Name</label></td>
   <td class="bg-primary" ><label class="control-label">Logo</label></td>
  <td class="bg-primary" ><label class="control-label">Description</label></td>
 <td class="bg-primary"><label class="control-label">Edit/Delete</label></td>
</tr>
<?php
 // session_start();


include('database_connection.php');


$sql="SELECT * FROM `Brand` ";
// $sql="SELECT * FROM `product` WHERE `c_id` = ();";

$result = mysqli_query($bd,$sql);
  while($r = mysqli_fetch_array($result)) {



 ?>

<!-- <div class="form-group"> -->
<tr>
  <td>
    <label class="control-label"><?php echo $r['b_ID']; ?></label>
</td>
<td>
   <!--    --> <?php echo $r['b_name']; ?>
 </td>
<td>
    
   <img    alt="Responsive image" src="http://localhost/shop/web/logo/<?php echo $r['b_logo']; ?>" alt=""  height="60" width="60" />
 </td>
 <td>
 <?php echo $r['b_des']; ?>  
 </td>

 
<td class="some" >
     <a class="btn" onClick="popitup('../brand/editbrand.php?bid=<?php echo $r['b_ID']; ?>')" >Edit</a>
    
     <!-- <a href="../brand/removebrand.php?bid=<?php echo $r['b_ID']; ?>" type="button" class="glyphicon glyphicon-remove btn-danger"></a> -->
 <a href="javascript:AlertIt2(<?php echo $r['b_ID']; ?>);"  type="button" class="glyphicon glyphicon-remove btn-danger"></a>

 </td>
 <script type="text/javascript">
function AlertIt2(id) {
var answer = confirm ("Brand (ID-"+id+") will be removed.Click OK to confirm")
if (answer)
  // alert("../product/prodele.php?pid="+id);
window.location="../brand/removebrand.php?bid="+id;
}
</script>
</tr>
<!-- </div> -->

<?php

 } 

 

?>

</table >
</td>
</tr>
</table>
</body>
  </html>




