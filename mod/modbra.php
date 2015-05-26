<html>
 <head>
  <link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="stylee1.css">
  <script type="text/javascript" src="http://localhost/bootstrap/js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="http://localhost/bootstrap/js/move-top.js"></script>
<script type="text/javascript" src="http://localhost/bootstrap/js/easing.js"></script>
<script type="text/javascript" src="http://localhost/bootstrap/js/startstop-slider.js"></script>
  <script type="text/javascript" src="http://localhost/bootstrap/js/bootstrap.min.js"></script>

<?php
session_start();

$_SESSION['frmaddp']=0;
$_SESSION['frmpedit']=0;
$log=$_SESSION['suser'];

if ($log != 2) {

header ("Location: ../admin/index.php");

}



?>



</head>

  <body>
    <nav class="navbar" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="mod.php">Dashboard</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Catalog<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li><a href="modcat.php">Categories</a></li>
            <li><a href="modpro.php">Product</a></li>
            <li><a href="modatt.php">Attributes</a></li>
            <li><a href="modbra.php">Brands</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sales<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li><a href="modaddcus.php">Customer</a></li>
            <li><a href="modord.php">Orders</a></li>
            <li><a href="modret.php">Returns</a></li>
          </ul>
        </li>
      </ul>
       <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">System<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li><a href="modsett.php">Settings</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li><a href="modrecus.php">Customers</a></li>
            <li><a href="modresal.php">Sales</a></li>
            <li><a href="modrepro.php">Products</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">Log Out</a></li>
      </ul>

       <ul class="nav navbar-nav navbar-right">
        <li><a> <?php
          echo $_SESSION['userr'].", ".$_SESSION['userrn'];
                 ?>
        </a></li>
      </ul>
      

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<table width="1350" border="1" align="center" class="table table-bordered " >
<tr>
  <td width="1120" height="142" bgcolor="#EFF0F1">

<a class="btn" href="../brand/addbrand.php">Add Brand</a>
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
   <!-- <?php echo $r['b_logo']; ?>   --> 
<img  alt="Responsive image" src="http://localhost/shop/web/logo/<?php echo $r['b_logo']; ?>" alt=""  height="60" width="60" />

 </td>
 <td>
 <?php echo $r['b_des']; ?>  
 </td>

 
<td class="some" >
     <a href="../brand/editbrand.php?bid=<?php echo $r['b_ID']; ?>" type="button" >Edit</a>
     <a href="../brand/removebrand.php?bid=<?php echo $r['b_ID']; ?>" type="button" class="glyphicon glyphicon-remove btn-danger"></a>

 </td>

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




