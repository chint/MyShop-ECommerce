<html>
 <head>

   <script type="text/javascript" src="http://localhost/bootstrap/js/jquery-1.11.2.min.js"></script> 
   <script type="text/javascript" src="http://localhost/bootstrap/js/bootstrap.min.js"></script>

   <link rel="stylesheet" type="text/css" href="http://localhost/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="stylee1.css">
 

 
<?php
session_start();


$log=$_SESSION['suser'];

if ($log != 1) {

header ("Location: index.php");

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
      <a class="navbar-brand" href="http://localhost/shop/admin/home.php">Dashboard</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Catalog<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li><a href="http://localhost/shop/admin/product.php">Product</a></li>
          	<li><a href="http://localhost/shop/admin/categories.php">Categories</a></li>
            <li><a href="http://localhost/shop/admin/attribute.php">Attributes</a></li>
            <li><a href="http://localhost/shop/admin/brand.php">Brands</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sales<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
          	<li><a href="http://localhost/shop/admin/customer.php">Customer</a></li>
            <li><a href="http://localhost/shop/admin/order.php">Orders</a></li>
            <li><a href="http://localhost/shop/admin/returns.php">Returns</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Extensions<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li><a href="http://localhost/shop/admin/supplier.php">Suppliers</a></li>
            <li><a href="http://localhost/shop/admin/inventory.php">Inventory</a></li>
            <li><a href="http://localhost/shop/admin/shipping.php">Shipping</a></li>
          </ul>
        </li>
      </ul>
       <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">System<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li><a href="http://localhost/shop/admin/adminsuser.php">System Users</a></li>
            <li><a href="../contactandinfo/contact.php">Contact Details</a></li>
              <li><a href="../shipmethods/shipmethods.php"> Shipping Methods</a></li>
                 <li><a href="../paymethod/paymethods.php">Payment Methods</a></li>
            <li><a href="../caros/editcaro.php">Carosel</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li><a href="../reports/cusreport.php">Order Reports</a></li>
            <li><a href="../reports/returnreport.php">Returns Reports</a></li>
            <li><a href="../reports/shipreportall.php">Shipping Reports</a></li>
            <li><a href="../reports/productreport.php">Product Reports</a></li>
            <li><a href="../reports/cusorderreport.php">Customer Orders Report</a></li>
              <li><a href="../reports/payreport.php">Payment Report</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../admin/logout.php">Log Out</a></li>
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

</body>
	</html>