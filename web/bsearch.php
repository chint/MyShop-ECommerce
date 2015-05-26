<html>
<head>
<title>Product Search</title>
<base target="_parent" />
</head>
<link href="http://localhost/shop/web/web/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="http://localhost/shop/web/web/css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="http://localhost/shop/web/web/js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="http://localhost/shop/web/web/js/move-top.js"></script>
<script type="text/javascript" src="http://localhost/shop/web/web/js/easing.js"></script>
<script type="text/javascript" src="http://localhost/shop/web/web/js/startstop-slider.js"></script>
<link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <style>
div.img {
  height: 200;
    width: auto;
  /*margin: 10px;*/
   
    padding-top: 30px;

padding-bottom: 1px;
}
  </style>
  <script>
            $(function(){
  $("#header").load("../headerfooter/header.php"); 
  $("#footer").load("../headerfooter/footer.php"); 
    $("#caro").load("dfs.html"); 
    $("#pag").load("../product/pag.php"); 
    $("#cat").load("../product/cat.php"); 
  });
        </script>
  <div id="header"></div> 


  <div class="wrap">
<body>
<div class="row">
  <div class=" col-md-3">
  <!-- <iframe height=100% width=100% src="http://localhost/shop/product/cat.php" ></iframe> -->
  <div id="cat"></div>  
  </div>

  <div class=" col-md-9">
  <!-- <iframe height=100% width=100% src="http://localhost/shop/web/dfs.html" ></iframe> -->
  
<?php

session_start();
if(empty($_SESSION['logins']))
{

 $uid=-1;

}else{

 $uid=$_SESSION['logins']; 

}

 

if (isset($_GET['b_ID'])) {

  # serach by category code...
 


$b_ID= $_GET['b_ID'];
// $key=2;
echo"<div class='well'>  ";
echo "search results for Brand : ".$_GET['b_name']."<br>";
echo" </div>";
}
    
  

  





$rec_limit = 8;
 include('../database_connection.php');
if(! $bd )
{
  die('Could not bdect: ' . mysqli_error($bd));
}
//mysqli_select_db('shop');
/* Get total number of records  where cat_ID= $catid*/
$sql1 = "SELECT count(p_ID ) FROM product";
$retval = mysqli_query($bd, $sql1 );
if(! $retval )
{
  die('Could not get data: ' . mysqli_error($bd));
}
$row = mysqli_fetch_array($retval, MYSQL_NUM );
$rec_count = $row[0];

if( isset($_GET{'page'} ) )
{
   $page = $_GET{'page'} + 1;
   $offset = $rec_limit * $page ;
}
else
{
   $page = 0;
   $offset = 0;
}
$left_rec = $rec_count - ($page * $rec_limit);

// $sql2 = "SELECT * ".
//        "FROM product WHERE `cat_ID` = '$catid'".
//       "LIMIT $offset, $rec_limit   ";
$sql2 = "SELECT * ".
       "FROM product WHERE `b_ID`='$b_ID'".
      "LIMIT $offset, $rec_limit   ";
 


echo '<div  class="col-md-12"> ';
$retval = mysqli_query($bd, $sql2 );
// echo "here";
if (mysqli_num_rows($retval)==0) {
 echo "<div class='alert alert-warning' role='alert'>no product found,try a different brand.</div>";
}else{

}
 


if(! $retval )
{
  die('Could not get data: ' . mysqli_error($bd));
}
while($row = mysqli_fetch_array($retval, MYSQL_ASSOC))
{
  // echo "here";
    // echo "EMP ID :{$row['p_ID']}  <br> ".
    //      "EMP NAME : {$row['p_name']} <br> ".
    //      "EMP SALARY : {$row['p_price']} <br> ".
    //      "--------------------------------<br>";
         ?>

           <div  class="col-md-3"  >
      <div class="thumbnail" >

<div class="img">
  <a target="_parent" href="../web/preview.php?p_id=<?php echo $row['p_ID']; ?>">
  <img  alt="Responsive image" src="http://localhost/shop/web/proimg/<?php echo $row['p_image']; ?>" alt="" />
</a>
               </div>
             <h4 style="white-space: nowrap; overflow: hidden;text-overflow: ellipsis;"><?php echo $row['p_name']; ?> </h4>
          <div class="price-details">
               <div class="price-number">
              <span class="rupees">Rs.<?php echo $row['p_price']; ?> </span>
              </div>
                    <div class="add-cart">                
                  <!-- <h4></h4> -->
                  <?php 
$qih=$row['p_qih'];
$rodr=$row['p_reorderlvl'];  
if($qih<=$rodr)
{
?>

   <span class="label label-danger">Out of Stock</span> 
  <!-- <button type="submit" class="btn btn-danger  btn-lg disabled"> Out of stock <span class="glyphicon glyphicon-remove-circle"   ></span></button> -->
<?php
 }else{
?>
  <a href="http://localhost/shop/customer/addtocart.php?c_id=<?php echo $uid; ?>&p_id=<?php echo $row['p_ID']; ?>"><span class="label label-primary">Add to Cart</span></a>

  <!-- <button type="submit" class="btn btn-primary btn-lg"> ADD TO CART <span class="glyphicon glyphicon-ok-sign"></span></button> -->
<?php
}
?>
   <!-- <a target="_parent" href="http://localhost/shop/customer/addtocart.php?c_id=<?php echo $uid; ?>&p_id=<?php echo $row['p_ID']; ?>"><span class="label label-primary">Add to Cart</span></a> -->
                   </div>
               <div class="clear"></div>

               </div>

             </div>
           </div>
         <?php
} 
echo "</div> ";

if (isset($_GET['b_ID'])) 
{
echo "<nav>  <ul class='pager'>";

  if( $left_rec < $rec_limit )
// else if( $left_rec < 0 )
{
   $last = $page - 2;
   // echo "<a href=\"probrowse.php?page=$last\"> l Last 10 Records</a>";
   // <li class="next"><a href="#">Newer <span aria-hidden="true">&rarr;</span></a></li>
          // echo "<li><a href='\"probrowse.php?page=$last\"'>Previous </a> </li>";
   echo "<li class='previous'><a href='bsearch.php?page=$last&b_ID=$b_ID'><span aria-hidden='true'> </span> <span class='glyphicon  glyphicon-arrow-left' aria-hidden='true'></span>Previous</a></li>";
   echo "<li class='next disabled'><a href=''>Next <span class='glyphicon  glyphicon-arrow-right' aria-hidden='true'> </a></li>";
                  
}
else if( $page > 0 )
{
   $last = $page - 2;
   // echo "<a href=\"probrowse.php?page=$last\">Last 10 Records</a> |";
   // echo "<a href=\"probrowse.php?page=$page\">Next 10 Records</a>";
 echo "<li class='previous'><a href='bsearch.php?page=$last&b_ID=$b_ID'><span aria-hidden='true'> </span> <span class='glyphicon  glyphicon-arrow-left' aria-hidden='true'></span>Previous </a></li>";
 
echo "<li class='next'><a href='bsearch.php?page=$page&b_ID=$b_ID'><span aria-hidden='true'> </span> Next<span class='glyphicon  glyphicon-arrow-right' aria-hidden='true'></span></a></li>";


}
else if( $page == 0 )
{
   // echo "<a href=\"probrowse.php?page=$page\">Next 10 Records</a>";
echo "<li class='next'><a href='bsearch.php?page=$page&b_ID=$b_ID'><span aria-hidden='true'> </span> Next<span class='glyphicon  glyphicon-arrow-right' aria-hidden='true'></span></a></li>";


}

echo "</ul></nav>";

} 


// if( $page > 0 )
// {
//    $last = $page - 2;
//    echo "<a href=\"bsearch.php?page=$last&catid=$catid\">Last 10 Records</a> |";
//    echo "<a href=\"bsearch.php?page=$page&catid=$catid\">Next 10 Records</a>";
   
// }
// else if( $page == 0 )
// {
//    echo "<a href=\"bsearch.php?page=$page&catid=$catid\">Next 10 Records</a>";
// }
// else if( $left_rec < $rec_limit )
// {
//    $last = $page - 2;
//    echo "<a href=\"bsearch.php?page=$last&catid=$catid\">Last 10 Records</a>";
// }
mysqli_close($bd);
?>
  </div>
    
</div>
</body>
</div>
<div id="footer"></div>
</html>