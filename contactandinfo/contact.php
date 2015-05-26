<html>
 <head>
   <script type="text/javascript" src="http://localhost/bootstrap/js/jquery-1.11.2.min.js"></script> 
   <link rel="stylesheet" type="text/css" href="http://localhost/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="../stylee1.css">
   <script type="text/javascript">

function popitup(url) {
       newwindow=window.open(url,'windowName','height=600,width=600');
       if (window.focus) {newwindow.focus()}
       return false;
     }


     </script>



   <!-- Admin header file -->
<?php
session_start();


$log=$_SESSION['suser'];

if ($log != 1 && $log != 2) { 
   header ("Location: index.php");
 
}elseif ($log == 1) {

?>
 <script>
            $(function(){
              $("#header").load("../admin/adminheader1.php"); 
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

<table width="1350" border="1" align="center" class="table table-bordered " >
<tr>
  <td width="1120" height="142" bgcolor="#EFF0F1">
 
 <table width="100" height="63" border="1" align="center" valign="middle" cellpadding="1" cellspacing="1" class="table table-bordered" id="sumtable">
  <tr>
    <td  class="bg-primary" >  <label class="control-label">Site Contact Details </label></td>
 
</tr>
 


<?php
 
include('../database_connection.php');


$sql="SELECT * FROM `contact` ";
// $sql="SELECT * FROM `product` WHERE `c_id` = ();";

$result = mysqli_query($bd,$sql);
  while($r = mysqli_fetch_array($result)) {



 ?>



<!-- <div class="form-group"> -->
<tr   >
  <td>
    <label class="control-label"></label>
    <?php echo htmlspecialchars_decode($r['contact']) ; ?>
</td>
 



</tr>
<tr>
  
  <td class="some" >
     <a onclick="popitup('../contactandinfo/editcontact.php?id=<?php echo $r['id']; ?>')" type="button" class="btn">Edit</a>
    
 </td>
</tr>
<!-- </div> -->

<?php

 
 }

?>

</table >

</tr>
  </td>
</table>
</body>
  </html>




