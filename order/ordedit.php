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
  $result3 = mysqli_query($bd,"SELECT * FROM `order` WHERE `or_ID` = '$_GET[oid]'");
       $r3 = mysqli_fetch_array($result3);  ?>
</head>
<body>
<div id="header"></div> 

<form name="myForm" action="updateord.php?or_ID=<?php echo $r3['or_ID']; ?>" method="post" onsubmit="return validateForm()" data-toggle="validator" role="form">


<table border="1" align="center" class="table table-bordered " >
<tr>
  <td bgcolor="#EFF0F1">

 <table id="sumtable" width="200" border="0" align="center" class="table">

   

 <tr><td><b>Order Edit</b></td><td></td></tr>

    <tr>
    <td><font size="2">Order Status:</font></td>
    <td><font size="2">
      <select name="cofirme">
           <option value="not confirmed" <?php if($r3['status'] == "notconfirmed" || $r3['status'] == "not confirmed"){
             echo "selected";

            }    ?> >Not Confirmed</option>

           <option value="confirmed" <?php if($r3['status'] == "confirmed"){
             echo "selected";

            }    ?>>Confirmed</option>
      </select>
      </font></td>
  </tr>
  <tr><td></td><td> <input name="submit" type="submit" id="submit" class="btn btn-primary btn-sm" ></td></tr>

  </table>
  </td>
  </tr>
  </table>
  </body>
  </html>