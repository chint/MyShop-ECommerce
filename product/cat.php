 <link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<ul name="B_ID"  class="list-group">
	<li class="list-group-item"><div class="well "> <h4> <center>Categories</center> </h4>   </div>   </li>
 

        <?php 
   
      include('database_connection.php');
      $result = mysqli_query($bd,"SELECT * FROM `category`");
    while($r = mysqli_fetch_array($result)) {
      ?>
 
<li class="list-group-item"><b><a target="_parent" href="../web/prosearch.php?cat=1&catid=<?php echo $r['c_ID']; ?>"><?php echo $r['c_name'];   ?></a ></b></li>
	
  <?php
}
  ?>

</ul>
 <!-- <button type="button" class="btn btn-default">1</button> 
<div class="btn-group-vertical">

<ul class="list-group">
  <button type="button" class="btn btn-default navbar-btn"><?php echo $r['b_name'];   ?></button>
 -->