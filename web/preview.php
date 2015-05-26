
<!DOCTYPE HTML>
<link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="stylee1.css">
  <script type="text/javascript" src="http://localhost/bootstrap/js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="http://localhost/bootstrap/js/move-top.js"></script>
<script type="text/javascript" src="http://localhost/bootstrap/js/easing.js"></script>
<script type="text/javascript" src="http://localhost/bootstrap/js/startstop-slider.js"></script>
  <script type="text/javascript" src="http://localhost/bootstrap/js/bootstrap.min.js"></script>
      <script src="../ckeditor/ckeditor.js"></script>
        <script>
            
            $(function(){
  $("#header").load("../headerfooter/header.php"); 
  $("#footer").load("../headerfooter/footer.php"); 
   $("#cat").load("http://localhost/shop/product/cat.php"); 
  });
        </script>

  <div id="header"></div>
<!-- <iframe height=50 width=100% src="http://localhost/shop/customer\welcome.php" ></iframe> -->
 <div class="wrap">
<body>
 
	
       	


	<?php
	 session_start();
include('../database_connection.php');
$id=$_GET['p_id'];

if( empty($_SESSION['logins'])){
 echo "<div class='alert alert-info' role='alert'>You must login to add products to the cart.</div>";
 $uid=-1;
}
else{
  $uid=$_SESSION['logins'];
}


// $id=225;
$sql1 = "SELECT `brand`.`b_name` AS brand ,`category`.`c_name` AS cat,`product`.*
FROM product, brand, category
WHERE ((`product`.`cat_ID` =`category`.`c_ID`) AND (`product`.`B_ID` =`brand`.`b_ID`)AND(`product`.`p_ID` =$id))";
$result = mysqli_query($bd,$sql1);
	$r = mysqli_fetch_assoc($result);
?>
 <ol class="breadcrumb">
  <li><a href="../web">Home</a></li>
  <li><a href="../web/prosearch.php?cat=1&catid=<?php echo $r['cat_ID']; ?>"><?php echo $r['cat']; ?> </a></li>
  <li class="active"><?php echo $r['p_name']; ?> </li>
</ol>
<!-- <div class="well"> -->
<div class="row">


  <div class="col-md-3">
   
  <!-- <iframe height=300 width=100% src="http://localhost/shop/product/cat.php" ></iframe> -->
   <div id="cat"></div> 
  </div>
  
<div class="col-md-9">
<div class="well">
  	<div class="row">
 <div class="col-md-5">
<!-- <div class="well"> -->
  	 <div class="form-group">
  	 <h2><?php echo $r['p_name']; ?> </h2>
    <img  class="img-thumbnail"  alt="Responsive image" src="http://localhost/shop/web/proimg/<?php echo $r['p_image']; ?>" alt=""    />
    </div>
  

	 	
<!-- </div> -->
</div>


  	<div class="col-md-4">
  		
<!-- <div class="well"> -->
 <div class="price">
 <p>Price: <span>Rs.<?php echo $r['p_price']; ?>.00</span></p>
					</div>
					<!-- href="http://localhost/shop/customer/addtocart.php?c_id=<?php echo $uid; ?>&p_id=<?php echo $r['p_ID']; ?>" -->
					<form id="form1" name="form1" method="post" action="../customer/addtocart.php?c_id=<?php echo $uid; ?>&p_id=<?php echo $r['p_ID']; ?>" >
 <div class="form-group">
						<div class="available">
						<p>Available Options :</p>
					 
						Quantity:
						<select name="qtty" id="qtty">
<?php
 $qih=$r['p_qih'];  
if($qih>=10)
{ $i=1;
	while($i<=10)
	{	echo "<option value='$i'>$i</option>";
		$i++;
	}
}else{$i=1;
	while($i<=$qih)
	{	echo "<option value='$i'>$i</option>";
		$i++;
	}
}
?>
 
						</select> 
					 
					</div>

<?php 

$rodr=$r['p_reorderlvl'];  
if($qih<=$rodr)
{
?>


  <button type="submit" class="btn btn-danger  btn-lg disabled"> Out of stock <span class="glyphicon glyphicon-remove-circle"   ></span></button>
<?php
 }else{
?>


  <button type="submit" class="btn btn-primary btn-lg"> ADD TO CART <span class="glyphicon glyphicon-ok-sign"></span></button>
<?php
}
?>

</div></form>
  	</div>  	</div> </div> 

<div class="well"><div class="row">
  <div class="col-md-12">
<table class="table table-hover">
<tr class="active">
 <td colspan="3" class="info"><label class="control-label">General</label></td>
  
 </tr>
 <tr class="active">
 <td ><label class="control-label"> Name</label></td>
 <td> <h6><?php echo $r['p_name']; ?> </h6></td>
 </tr>
 <tr class="active">
 <td><label class="control-label">  Model No.</label></td>
 <td> <h6> <?php echo $r['p_modelno']; ?> <h6> </td>
 </tr>
 <tr class="active">
 <td><label class="control-label">  Brand</label></td>
 <td> <h6><?php echo $r['brand']; ?></h6></td>
 </tr>
  </tr>
 <tr class="active">
 <td><label class="control-label">  Category</label></td>
 <td> <h6><?php echo $r['cat']; ?></h6></td>
 </tr>
 <tr class="active">
 <td><label class="control-label">Other Desc. </label></td>
 <td>  <h6>
 <?php 
 // echo htmlentities($r['p_desc'], ENT_QUOTES) ;  
  echo $r['p_desc'];   

 ?>
 </h6></td>
 </tr>
  <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'p_desc' );
            </script><script src="../ckeditor/ckeditor.js"></script>
 

   <tr class="active">
 <td colspan="3" class="info"><label class="control-label">Other Attributes</label></td>
  
 </tr>   
  <?php
$sql2 = "SELECT `pro_att`.`p_id`,`attribute`.`a_name`,`attribute`.`a_desc` ,`pro_att`.`value` FROM   pro_att ,attribute
WHERE  ( `pro_att`.`p_ID` ='$id') AND ( `attribute`.`a_id` =`pro_att`.`att_id`) ";
$result = mysqli_query($bd,$sql2);
  while($r2 = mysqli_fetch_array($result)) {
  ?>
  <tr class="active">
 <td><label class="control-label"><?php echo $r2['a_name']; ?></label></td>
 <td><h6><?php echo $r2['value']." ".$r2['a_desc'] ; ?></h6></td>
 </tr>
 
<?php } ?>
 </table>

  </div> </div>
   
</div>

  	</div>


	</div>
  <!-- <div class="col-md-7"> -->

	</div>
 
<!-- </div> -->
 
				 
			 
		 
 	 
    </div>
 </div>
   
   <script type="text/javascript">
		$(document).ready(function() {			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>   </div>
</body>
<div id="footer"></div>
</html>

