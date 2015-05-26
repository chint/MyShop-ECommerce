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

   <!-- Admin header file -->
<script>
            $(function(){
  $("#header").load("adminheader1.php"); 
  $("#pag").load("chart.php"); 
  });
        </script>

 <?php
session_start();


$log=$_SESSION['suser'];

if ($log != 1) {

header ("Location: index.php");

}


?>       

</head>



<body>

<div id="header"></div>   
<h1 style="font-size: 30">System Users</h1>
</nav>
<table width="1350" border="1" align="center" class="table table-bordered " >
<tr>
  <td width="1120" height="142" bgcolor="#EFF0F1">

<a class="btn" onclick="popitup('../suser/addsuser.php')" >Add System User</a>
 <table id="sumtable" width="200" border="1" align="center" cellpadding="1" cellspacing="1" class="table table-bordered">
  <tr>
    <td class="bg-primary" width=200>  <label class="control-label">User ID </label></td>
  <td class="bg-primary"><label class="control-label">Name </label></td>
  <td class="bg-primary" ><label class="control-label">E-mail </label></td>
  <td class="bg-primary"><label class="control-label">User Name</label></td>
  <td class="bg-primary"><label class="control-label">User Password</label></td>
  <td class="bg-primary"><label class="control-label">User Type</label></td>
  <td class="bg-primary"><label class="control-label">Edit/Delete</label></td>
</tr>
<?php
 // session_start();


include('database_connection.php');


$sql="SELECT * FROM `suser` ";
// $sql="SELECT * FROM `product` WHERE `c_id` = ();";

$result = mysqli_query($bd,$sql);
  while($r = mysqli_fetch_array($result)) {



 ?>

<!-- <div class="form-group"> -->
<tr>
  <td>
    <label class="control-label"><?php echo $r['c_id']; ?></label>
</td>
<td>
   <!--    --> <?php echo $r['su_fname']; ?> <?php echo $r['su_lname']; ?>
 </td>

 <td>
 <?php echo $r['su_email']; ?>  
 </td>

 
 <td>
 <?php echo $r['su_un']; ?> 
 </td>

  <td>
 <?php echo $r['su_pw']; ?> 
 </td>

  <td>
 <?php echo $r['su_type']; ?> 
 </td>


<td class="some" >
     <a onclick="popitup('../suser/suseredit.php?cid=<?php echo $r['c_id']; ?>')" type="button"  class="btn" >Edit</a>
     <!-- <a href="../suser/suserdele.php?cid=<?php echo $r['c_id']; ?>" type="button" class="glyphicon glyphicon-remove btn-danger"></a> -->
<a href="javascript:AlertIt2(<?php echo $r['c_id']; ?>);"  type="button" class="glyphicon glyphicon-remove btn-danger"></a>
 </td>
  <script type="text/javascript">
function AlertIt2(id) {
var answer = confirm ("System user (ID-"+id+") will be removed.Click OK to confirm")
if (answer)
  // alert("../product/prodele.php?pid="+id);
window.location="../suser/suserdele.php?cid="+id;
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




