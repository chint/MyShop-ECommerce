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
      <a class="navbar-brand" href="home.php">Dashboard</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Catalog<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
          	<li><a href="categories.php">Categories</a></li>
            <li><a href="product.php">Product</a></li>
            <li><a href="attribute.php">Attributes</a></li>
            <li><a href="brand.php">Brands</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sales<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
          	<li><a href="customer.php">Customer</a></li>
            <li><a href="order.php">Orders</a></li>
            <li><a href="adminret.php">Returns</a></li>
          </ul>
        </li>
      </ul>
       <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">System<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li><a href="adminsuser.php">System Users</a></li>
            <li><a href="adminsett.php">Settings</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li><a href="cusreport.php">Customers Reports</a></li>
            <li><a href="salereport.php">Sales Reports</a></li>
            <li><a href="proreport.php">Products Reports</a></li>
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

</body>
	</html>