  <link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <?php
include('database_connection.php');

$sql2 = "SELECT * FROM  product  ";

echo '<div class="row">';
$result = mysqli_query($bd,$sql2);
  while($r = mysqli_fetch_array($result)) {

  ?>
<!-- <div class="grid_1_of_4 images_1_of_4"> -->

					 
					<!-- <div class="price-details"> -->
				       <!-- <div class="price-number"> -->
							<!-- <p><span class="rupees">$<?php echo $r['p_price']; ?> </span></p> -->
					    <!-- </div> -->
					       		<!-- <div class="add-cart">								 -->
									<!-- <h4></h4> -->
									<!-- <a href="preview.html"><span class="label label-primary">Add to Cart</span></a> -->
							     <!-- </div> -->
							 <!-- <div class="clear"></div> -->
					<!-- </div>	 		 -->
				<!-- </div> -->
				
  <div class="col-sm-6 col-md-4">
    <!-- <div class="thumbnail"> -->
     
<a href="preview.html"><img  height="100" width="100" alt="Responsive image" src="http://localhost/shop/web/proimg/<?php echo $r['p_image']; ?>" alt="" /></a>
      <div class="caption">
       <h3><?php echo $r['p_name']; ?> </h3>
        <p>...</p>
        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
      </div>
    </div>
  <!-- </div> -->

				<?php
}
echo '</div>';
?>

