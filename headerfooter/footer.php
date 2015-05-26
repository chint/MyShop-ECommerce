 
<html>
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="../web/web/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="../web/web/css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="../web/web/js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="../web/web/js/move-top.js"></script>
<script type="text/javascript" src="../web/web/js/easing.js"></script>
<script type="text/javascript" src="../web/web/js/startstop-slider.js"></script>

<script type="text/javascript" src="http://localhost/bootstrap/js/bootstrap.min.js"></script>
  <link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  
</head>
<body>

 <div class="footer">
      <div class="wrap">  
       <div class="section group">
        <div class="col_1_of_4 span_1_of_4">
            <h4>Information</h4>
            <ul>
             <li>  <a href="../web/">Home</a></li>
              <li><a href="../web/probrowse.php ">Products</a></li>
                 <li><a href="../web/services.php">Services</a></li>
              <li><a href="../web/contact.php">Customers</a></li>
            <li><a href="../web/contact.php">Contact</a></li>
            <li><a href="../web/about.php">About Us</a></li>
            </ul>
          </div>

        <div class="col_1_of_4 span_1_of_4">
          <h4>My account</h4>
            


            <ul>


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
      <li><a href="../customer/account.php">My Account</a></li>
        <li><a href="#">Delivery</a></li>
            <li><a href="../customer/cart.php">Cart</a></li>
            <li><a href="../customer/checkout.php">Checkout</a></li>';
        }
     }else{
           echo '<li><a href="../logorreg/adduser.php">Register</a></li>';
} ?>
             <!--  <li><a href="contact.html">Sign In</a></li>
              <li><a href="index.html">View Cart</a></li>
              <li><a href="#">My Wishlist</a></li>
              <li><a href="#">Track My Order</a></li>
              <li><a href="contact.html">Help</a></li> -->
            </ul>
        </div>
         <div class="col_1_of_4 span_1_of_4">
       
          <h4>Contact</h4>
<?php
 
include('../database_connection.php');
$sql="SELECT * FROM `contact` ";
$result = mysqli_query($bd,$sql);
  while($r = mysqli_fetch_array($result)) {
 ?>
<tr >
  <td>
    <label class="control-label"></label>
    <?php echo htmlspecialchars_decode($r['contact']) ; ?>
</td>
 </tr>
<?php
 }
?>
       
        </div>
        <div class="col_1_of_4 span_1_of_4">
         
           
              <h4>Follow Us</h4>
 <div class="social-icons">
                  <ul>
                    <li><a href="#" target="_blank"><img src="../web/web/images/facebook.png" alt="" /></a></li>
                    <li><a href="#" target="_blank"><img src="../web/web/images/twitter.png" alt="" /></a></li>
                    <li><a href="#" target="_blank"><img src="../web/web/images/skype.png" alt="" /> </a></li>
                    <li><a href="#" target="_blank"> <img src="../web/web/images/dribbble.png" alt="" /></a></li>
                    <li><a href="#" target="_blank"> <img src="../web/web/images/linkedin.png" alt="" /></a></li>
                    <div class="clear"></div>
                 </ul>

              </div>
        </div>
      </div>      
        </div>
       <!--  <div class="copy_right">
        <p>Company Name © All rights Reseverd | Design by  <a href="http://w3layouts.com">W3Layouts</a> </p>
       </div> -->
    </div>
    <script type="text/javascript">
    $(document).ready(function() {      
      $().UItoTop({ easingType: 'easeOutQuart' });
      
    });
  </script>
 
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>

</body>
</html>