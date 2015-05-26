<!-- <link href="web/css/style.css" rel="stylesheet" type="text/css" media="all"/> -->
<!-- <link href="web/css/slider.css" rel="stylesheet" type="text/css" media="all"/> -->
<script type="text/javascript" src="web/js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="web/js/move-top.js"></script>
<script type="text/javascript" src="web/js/easing.js"></script>
<script type="text/javascript" src="web/js/startstop-slider.js"></script>

<script type="text/javascript" src="http://localhost/bootstrap/js/bootstrap.min.js"></script>
  <link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<div id="myCarousel"  class="carousel slide " data-ride="carousel"  style="width: 900px; height:250px; margin: 3  ">

<ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
 <?php
   session_start();
include('../database_connection.php');
 
$sql1 = "SELECT   `product`.* , `caro`.* FROM caro,product WHERE (`product`.`p_ID` =`caro`.`pr`)";
$result = mysqli_query($bd,$sql1);
 $x=1;
while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
{
 
 // echo $row['pr'];
  

if($x==1)
{


?>

   <div class="item active">
   <div class="img">
          <img    src="proimg/<?php echo $row['pr'] ;  ?>.jpg" alt="First slide"  width="200"  />
          </div>
           <div class="container">
            <div class="carousel-caption">
              <h2><?php echo $row['p_name'] ;  ?></h2>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
               <!-- <a class="btn btn-primary" href="#" role="button">Learn more</a>  -->
            </div>
          </div>
        </div>

<?php
$x=-1;
}


else{

?>

   <div class="item ">
 
          <img    src="proimg/<?php echo $row['pr'] ;  ?>.jpg" alt="First slide"  width="200"  />
          
           <div class="container">
            <div class="carousel-caption">
              <h2><?php echo $row['p_name'] ;  ?></h2>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
               <!-- <a class="btn   btn-primary" href="#" role="button">Learn more</a>  -->
            </div>
          </div>
        </div>

<?php

}


}
 ?>


      <!-- Indicators
class="carousel slide container" style="width: 700px; margin: 0 auto" 
     
        -->
      
 
      


 

      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>