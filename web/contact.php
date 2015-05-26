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
 
  });
        </script>
  <div id="header"></div>	  
   <div class="wrap">

<body>

<!--  <div class="row">
<div id="caro"></div>
 </div> -->

<div class="row">
  

  <div class=" col-md-12">
  <!-- <iframe height=100% width=100% src="http://localhost/shop/web/dfs.html" ></iframe> -->
  <h2 class="title">Contact Info</h2>
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
    
</div>
<!-- 
	 <div class="row"> 
	 <div class="well well-sm">

<h3><a href="probrowse.php">All Products</a></h3>
  </div>
	  <div id="pag"></div>	
	  </div> -->


   </div>
</div>
 
</body>
<div id="footer"></div>
</html>

