<link href="web/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="web/css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="web/js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="web/js/move-top.js"></script>
<script type="text/javascript" src="web/js/easing.js"></script>
<script type="text/javascript" src="web/js/startstop-slider.js"></script>

<script type="text/javascript" src="http://localhost/bootstrap/js/bootstrap.min.js"></script>
  <link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<?php
 session_start();
 if(!empty($_SESSION['OK']))
     {
        if(!empty($_SESSION['Admin'])){
          echo '<div class="account_desc"><ul><li><a href="http://localhost/shop/customer/adduser.html">Register</a></li>
					<li><a href="#">Add Product</a></li>
					<li><a href="#">Add category</a></li>
					<li><a href="#">Supplier</a></li>
					<li><a href="#">My Account</a></li></ul><div>';
                 }else{
           echo '<div class="account_desc"><ul>
					<li><a href="#">Delivery</a></li>
					<li><a href="#">Checkout</a></li>
					<li><a href="#">My Account</a></li></ul><div>';
        }
     }else{
           echo '<div class="account_desc"><ul><li><a href="http://localhost/shop/customer/adduser.html">Register</a></li>
					</ul><div>';
} ?>