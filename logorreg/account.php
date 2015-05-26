<link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="stylee1.css">
   <script src="../bootstrap/jquery/jquery-1.11.2.js"></script> 
<script type="text/javascript" src="http://localhost/bootstrap/js/move-top.js"></script>
<script type="text/javascript" src="../bootstrap/js/easing.js"></script>
<script type="text/javascript" src="../bootstrap/js/startstop-slider.js"></script>
  <!-- // <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script> -->
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> -->
        <script>
            $(function(){
  $("#header").load("../headerfooter/header.php"); 
  $("#footer").load("../headerfooter/footer.php"); 
    $("#caro").load("http://localhost/shop/web/dfs.html"); 
    $("#pag").load("http://localhost/shop/product/pag.php"); 
    $("#cat").load("http://localhost/shop/product/cat.php"); 
  });
        </script>
  <div id="header"></div>   
   <div class="wrap">
<!-- <iframe height=50 width=100% src="http://localhost/shop/customer\welcome.php" ></iframe> -->

  <body>
<script type="text/javascript" src="http://localhost/bootstrap/js/bootstrap.min.js"></script>
  <link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<div class="well well-sm">

<h3>My Dashboard</h3>
  </div>


  <div class="row">
  <div class="col-md-3 ">
<div class="well well-sm">
<table class="table table-bordered">
  <tr> <td>
 <label><h4><a href="accountedit.php">Edit My Account Details</a> </h4></label>
 </td> </tr>
  <tr><td>
    <label><h4> <a href="accountorder.php" >My Orders</a> </h4></label>
  </td></tr>
</table>
  </div>
  </div>

<?php

 session_start();
include('../database_connection.php');

$a=$_SESSION['logins'];
 
 
$result = mysqli_query($bd, "SELECT * FROM `shop`.`cus` WHERE `c_id` = '$a' ");

if ($row = mysqli_fetch_array($result)) {
 
?>


  <div class="col-md-9 ">
<div class="well well-sm">

<h3>My Account Details</h3>
<!-- <form name="myForm" action="update.php?c_id=<?php echo $row['c_id']; ?>" method="post" onsubmit="return validateForm()" data-toggle="validator" role="form"> -->
<table  class="table table-condensed">

  <tr><td>  <label class="control-label">First Name: </label></td>
    <td><?php echo $row['c_fname']; ?>  </td></tr>

    <tr><td>  <label class="control-label">Middle Name: </label></td>
    <td><?php echo $row['c_mname']; ?>  </td></tr>

   <tr><td>  <label class="control-label">Last Name: </label></td>
    <td><?php echo $row['c_lname']; ?>  </td></tr>

 <tr><td>  <label class="control-label">E-mail: </label></td>
    <td><?php echo $row['c_email']; ?>  </td></tr>

    <tr><td>  <label class="control-label">Date of Birth: </label></td>
    <td><?php echo $row['c_dob']; ?>  </td></tr>

        <tr><td>  <label class="control-label">Telephone No.: </label></td>
    <td><?php echo $row['c_tp']; ?>  </td></tr>

    <tr><td>  <label class="control-label">Date of Birth: </label></td>
      <td><?php echo $row['c_dob']; ?>  </td></tr>

        <tr><td>  <label class="control-label">Shipping Address: </label></td>
    <td><?php echo $row['c_shaddr1']; ?>  </td></tr>
    <tr><td>  </td>
    <td><?php echo $row['c_shaddr2']; ?>  </td></tr>
    <tr><td>   </td>
    <td><?php echo $row['c_shaddr3']; ?>  </td></tr>

  <tr><td>  <label class="control-label">Billing Address: </label></td>
    <td><?php echo $row['c_baddr1']; ?>  </td></tr>
    <tr><td>  </td>
    <td><?php echo $row['c_baddr2']; ?>  </td></tr>
    <tr><td>   </td>
    <td><?php echo $row['c_baddr3']; ?>  </td></tr>

<tr><td>  <label class="control-label">User Name : </label></td>
      <td><?php echo $row['un']; ?>  </td></tr>
<tr><td>  <label class="control-label" type="password">Password : </label></td>
      <td > <input type="password" value="<?php echo $row['pw']; ?>" readonly="readonly">  </td></tr>
</table>
 

  

  
<div class="form-group">
<a href="accountedit.php"> <button type="button" class="btn btn-primary">Edit Account</button></a>
 
</div>

<!-- </form> -->
<?php
} else {
 echo "no results found";
}

 

mysqli_close($bd);
?>

  </div>
  </div>
</div>

 

  
 </div>
 
</div>

   
</body>
<div id="footer"></div>
</html>