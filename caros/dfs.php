<!-- <link href="web/css/style.css" rel="stylesheet" type="text/css" media="all"/> -->
<!-- <link href="web/css/slider.css" rel="stylesheet" type="text/css" media="all"/> -->
<script type="text/javascript" src="web/js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="web/js/move-top.js"></script>
<script type="text/javascript" src="web/js/easing.js"></script>
<script type="text/javascript" src="web/js/startstop-slider.js"></script>

<script type="text/javascript" src="http://localhost/bootstrap/js/bootstrap.min.js"></script>
  <link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
      p {
           -o-text-overflow: ellipsis;   /* Opera */
    text-overflow:    ellipsis;   /* IE, Safari (WebKit) */
    overflow:hidden;              /* don't show excess chars */
    white-space:nowrap;           /* force single line */
    width: 500px;                 /* fixed width */
      }
    </style>
<div id="myCarousel"  class="carousel slide " data-ride="carousel"  style="width: 750px; height:250px; margin: 3  ">

<ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
         <li data-target="#myCarousel" data-slide-to="3"></li>
          <li data-target="#myCarousel" data-slide-to="4"></li>
      </ol>
      <div class="carousel-inner">
 <?php
   session_start();
include('../database_connection.php');
 
$sql1 = "SELECT   `product`.* , `caro`.*,brand.* FROM caro,product,brand WHERE (`product`.`p_ID` =`caro`.`pr`) AND (`product`.`B_ID` =`brand`.`b_ID`)";
$result = mysqli_query($bd,$sql1);
 $x=1;
while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
{
 
 // echo $row['pr'];
  

if($x==1)
{


?>

   <div class="item active">
            <a href="../web/preview.php?p_id=<?php echo $row['p_ID'] ;  ?>"> 
   <div class="img">
          <img    src="proimg/<?php echo $row['pr'] ;  ?>.jpg" alt="First slide"  width="175"  />
          </div>
           <div class="container">
            <div class="carousel-caption">
              <h2><?php echo $row['p_name'] ;  ?></h2>
              <p> <?php echo $row['p_desc']   ?></p>
                 <p>Price: Rs. <?php echo   $row['p_price'] ;  ?></p>
               <!-- <a class="btn btn-primary" href="#" role="button">Learn more</a>  -->
            </div></a>
          </div>
        </div>

<?php
$x=-1;
}

else{
?>
   <div class="item ">
           <a href="../web/preview.php?p_id=<?php echo $row['p_ID'] ;  ?>"> 

           <img    src="proimg/<?php echo $row['pr'] ;  ?>.jpg" alt="First slide"  width="175"  />
                     <div class="container">
            <div class="carousel-caption">
              <h2><?php echo $row['p_name'] ;  ?></h2>
              <p> <?php echo   $row['p_desc'] ;  ?></p>
               <p> Price: Rs.<?php echo   $row['p_price'] ;  ?></p>
               <!-- <a class="btn   btn-primary" href="#" role="button">Learn more</a>  -->
            </div></a>

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