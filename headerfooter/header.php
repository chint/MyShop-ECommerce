<head>
<title>|~ Online Shop ~|</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="../web/web/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="../web/web/css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="../web/web/js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="../web/web/js/move-top.js"></script>
  <script type="text/javascript" src="http://localhost/bootstrap/js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="http://localhost/bootstrap/js/move-top.js"></script>
<script type="text/javascript" src="http://localhost/bootstrap/js/easing.js"></script>
<script type="text/javascript" src="http://localhost/bootstrap/js/startstop-slider.js"></script>
<!--    <script type="text/javascript" src="http://localhost/bootstrap/js/bootstrap.min.js"></script>   -->

<script type="text/javascript" src="http://localhost/bootstrap/js/bootstrap.min.js"></script>
  <link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<style type="text/css">
 
  .navbar-top {
  background-color:#428bca;
    color:#ffffff;
    border-radius:0;
}

/*.btn-margin-left {
    margin-left: 2px;
}
.btn-margin-right {
    margin-right: 2px;
}*/
.navbar-top .navbar-nav > li > a {
    color:#fff;
    padding-left:9px;
    padding-right:9px;
}

.navbar-top .navbar-nav > li > a:hover, .nav > li > a:focus {
    text-decoration:none;
    background-color: #3399FF;
}

.navbar-top {
    min-height: 1px;
}

.navbar-top ul li a {
  font-size:      0.9em;
    line-height: 20px;
    height: 25px;
    padding-top: 1 ;
}

.navbar-top  > li > a {
    color:#fff;
    padding-left:20px;
    padding-right:20px;
}

/*.navbar-top {
    min-height: 0px;
}
 .navbar-top  {
    height: 20px;  
}*/

  .navbar-custom {
  background-color:#428bca;
    color:#ffffff;
    border-radius:0;
}
  
.navbar-custom .navbar-nav > li > a {
    color:#fff;
    padding-left:20px;
    padding-right:20px;
}
.navbar-custom .navbar-nav > .active > a, .navbar-nav > .active > a:hover, .navbar-nav > .active > a:focus {
    color: #ffffff;
  background-color:transparent;
}
      
.navbar-custom .navbar-nav > li > a:hover, .nav > li > a:focus {
    text-decoration: none;
    background-color: #3399FF;
}
      
.navbar-custom .navbar-brand {
    color:#eeeeee;
}
.navbar-custom .navbar-toggle {
    background-color:#eeeeee;
}
.navbar-custom .icon-bar {
    background-color:#33aa33;
}
</style>

<body   >
  <div class="wrap">
      <nav class="navbar-xs navbar-top  navbar-static  ">
  <div class="collapse navbar-collapse" ng-controller="HeaderController">
  <!--   <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div> -->
    <div>
      <ul class="nav navbar-nav navbar-right">
 
        <?php
 session_start();
 if(!empty($_SESSION['OK']))
     {
        if(!empty($_SESSION['Admin'])){
          // echo '<ul><li><a href="http://localhost/shop/customer/adduser.html">Register</a></li>
          // <li><a href="#">Add Product</a></li>
          // <li><a href="#">Add category</a></li>
          // <li><a href="#">Supplier</a></li>
          // <li><a href="#">My Account</a></li></ul>';
                
                 }else{

           echo '
      <li><a href="../logorreg/account.php">My Account</a></li>
        <li><a href="#">Delivery</a></li>
            <li><a href="../customer/cart.php">Cart</a></li>
            <li><a href="../customer/checkout.php">Checkout</a></li>';
        }
     }else{
           echo '<li><a href="../logorreg/adduser.php">Register</a></li>';
} ?>

          



            </ul>
    </div>
  </div>
</nav>

  <div class="header">
    <!-- <div class="headertop_desc"> -->
      <!-- <div class="call">
         <p><span>Need help?</span> call us <span class="number">999</span></span></p>
   
      <!-- <div class="clear"></div> -->
    <!-- </div> -->
    <div class="header_top">
      <div class="logo">
        <a href="../web"><img height=120 src="../web/web/images/logo.jpg" alt="" /></a>
      </div>

        <div class="cart">

 
        <iframe height=100 width=200 src="http://localhost/shop/customer/welcome.php" ></iframe>
            
        </div>

        <script type="text/javascript">

     function HeaderController($scope, $location) 
{ 
    $scope.isActive = function (viewLocation) { 
        return viewLocation == $location.path();
       alert($location);
    };
}


      function DropDown(el) {
        this.dd = el;
        this.initEvents();
      }
      DropDown.prototype = {
        initEvents : function() {
          var obj = this;

          obj.dd.on('click', function(event){
            $(this).toggleClass('active');
            event.stopPropagation();
          }); 
        }
      }

      $(function() {

        var dd = new DropDown( $('#dd') );

        $(document).click(function() {
          // all dropdowns
          $('.wrapper-dropdown-2').removeClass('active');
        });

      });





    </script>
      
     <!-- <iframe  width=100% src="http://localhost/shop/product/naw.html" ></iframe> -->
 


   <div class="clear"></div>
  </div>
     
  <div class="header_slide">

</head>

<nav class="navbar navbar-custom">
  <div class="collapse navbar-collapse" ng-controller="HeaderController">
    
    <div>
      <ul class="nav navbar-nav">
        <!-- <li ng-class="{ active: isActive(true)}"> -->
       <li>  <a href="../web/">Home</a></li>
              <li><a href="../web/probrowse.php ">Products</a></li>
                 <li><a href="../web/bbrowse.php">Brands</a></li>
                 <li><a href="../web/services.php">Services</a></li>
          
            <li><a href="../web/contact.php">Contact</a></li>
            <li><a href="../web/about.php">About Us</a></li>
            </ul>
         <form class="navbar-form navbar-right" role="search"  action="../web/prosearch.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <input type="text" class="form-control" name="srch" placeholder="Enter product..." required>
        </div>
        <button type="submit" class="btn btn-default" > Search <span class="glyphicon glyphicon-search"></span>  </button>
      </form>
    </div>
  </div>
</nav>

<script type="text/javascript" src="http://localhost/bootstrap/js/bootstrap.min.js"></script>
  <link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">
