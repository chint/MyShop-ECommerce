<html>
 <head>
  <script type="text/javascript" src="http://localhost/bootstrap/js/jquery-1.11.2.min.js"></script> 
<link rel="stylesheet" type="text/css" href="http://localhost/bootstrap/css/bootstrap.min.css">
<script src="../bootstrap/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="stylee1.css">

<script type="text/javascript">

function popitup(url) {
       newwindow=window.open(url,'windowName','height=600,width=650');
       if (window.focus) {newwindow.focus()}
       return false;
     }


     </script>


   <!-- Admin header file -->
<?php
session_start();


$log=$_SESSION['suser'];

if ($log != 1 && $log != 2) { 
   header ("Location: index.php");
 
}elseif ($log == 1) {

?>
 <script>
            $(function(){
              $("#header").load("adminheader1.php"); 
                        });
 </script>

<?php
 }elseif ($log == 2) {
  ?>
  <script>
            $(function(){
              $("#header").load("modheader.php"); 
                        });
 </script>

 
<?php
}
?>
  
   
</head>



<body>

<div id="header"></div>   
<h1 style="font-size: 30">Products</h1>
<table width="1350" border="1" align="center" class="table table-bordered " >
<tr>
  <td width="1120" height="142" bgcolor="#EFF0F1">

<a class="btn" onclick="popitup('../product/addp.php')" >Add Product</a>
 <table id="sumtable" width="200" border="1" align="center" cellpadding="1" cellspacing="1" class="table table-bordered">
  <tr>
    <td class="bg-primary" width=200>  <label class="control-label">Product ID </label></td>
  <td class="bg-primary"><label class="control-label">Category</label></td>
  <td class="bg-primary" ><label class="control-label">Brand</label></td>
  <td class="bg-primary"><label class="control-label">Product Name</label></td>
  <td class="bg-primary"><label class="control-label">Model Number</label></td>
  <td class="bg-primary"><label class="control-label">Price</label></td>
  <td class="bg-primary"><label class="control-label">Quntity In Hand</label></td>
  <td class="bg-primary"><label class="control-label">Preoder Level</label></td>
  <td class="bg-primary"><label class="control-label">Image</label></td>
  <td class="bg-primary"><label class="control-label">Description</label></td>
  <td class="bg-primary"><label class="control-label">Edit/Delete</label></td>
</tr>




<form name="myForm" action="product.php?filter=1" method="post" onsubmit="return validateForm()" data-toggle="validator" role="form">
<tr >
  <td><input class="form-control" type="text" name="pid" /></td>
  <td><input class="form-control" type="text" name="cate"  /></td>
  <td><input class="form-control" type="text" name="brand" /></td>
  <td><input class="form-control" type="text" name="pname"  /></td>
  <td><input class="form-control" type="text" name="mnum"  /></td>
  <td><input class="form-control" type="text" name="price"  /></td>
  <td><input class="form-control" type="text" name="qih"  /></td>
  <td><input class="form-control" type="text" name="reord"  /></td>
  <td><input class="form-control" type="text" name="pass"  disabled/></td>
  <td><input class="form-control" type="text" name="uname" disabled /></td>
 <td><input name="submit" type="submit" id="submit" class="btn btn-primary btn-sm" value="Filter">
<a href="../admin/product.php">Reset</a>
 </td>
 </tr>

</form>



<?php

include('database_connection.php');
if(isset($_GET['filter'])){


$sql="SELECT product.p_ID, category.c_ID, brand.b_ID, product.p_name, product.p_modelno, product.p_price, product.p_qih,
             product.p_reorderlvl, product.p_image, product.p_desc
   FROM 
     `product`
          INNER JOIN category
                   ON product.cat_ID = category.c_ID
          INNER JOIN brand 
                   ON product.B_ID = brand.b_ID          
          WHERE
  `p_ID` = '$_POST[pid]' or `c_name` like '$_POST[cate]' or `b_name` = '$_POST[brand]' or  
 `p_name` = '$_POST[pname]' or `p_modelno` = '$_POST[mnum]' or `p_price` = '$_POST[price]' or
  `p_qih` = '$_POST[qih]' or `p_reorderlvl` = '$_POST[reord]' ORDER BY p_ID DESC";

$result = mysqli_query($bd,$sql);
   if(mysqli_num_rows($result)==0){
  echo "<tr><td colspan='11'><div class='alert alert-info' role='alert'> No result Found. <a  href='product.php'><button type='button' class='btn btn-success' >Reset</button></a> </div></td></tr>";
}
  while($r = mysqli_fetch_array($result)) {

?>

 


<tr  id="row<?php echo $r['p_ID']; ?>" >

  <td >
    <label class="control-label"><?php echo $r['p_ID']; ?></label>
</td>
<td>
<?php 
   
      include('database_connection.php');
      $cat = $r['c_ID'];
      $result1 = mysqli_query($bd,"SELECT * FROM `category` WHERE `c_ID` = '$cat'");
       $r1 = mysqli_fetch_array($result1);
       echo $r1['c_name'];
      ?>

 </td>

 <td>
     <?php 
   
      include('database_connection.php');
      $br = $r['b_ID'];
      $result2 = mysqli_query($bd,"SELECT * FROM `brand` WHERE `b_ID` = '$br'");
       $r2 = mysqli_fetch_array($result2);
       echo $r2['b_name'];
      ?>
 </td>

 <td>
     <?php echo $r['p_name']; ?>  
 </td>

 <td>
 <?php echo $r['p_modelno']; ?> 
 </td>

 <td>
 <?php echo $r['p_price']; ?>  
 </td>

 <td class=<?php if($r['p_qih']==$r['p_reorderlvl']){ echo "danger";  }  ?>>
 <?php echo $r['p_qih']; ?> 
 </td>

 <td >
 <?php echo $r['p_reorderlvl']; ?> 
 </td>

  <td>
  <img    alt="Responsive image" src="http://localhost/shop/web/proimg/<?php echo $r['p_image']; ?>" alt=""  height="60" width="60" />
 </td>
 <td>
 <?php echo $r['p_desc']; ?> 
 </td>

<td class="some" >
     <a class="btn" onClick="popitup('../product/pedit.php?pid=<?php echo $r['p_ID']; ?>')">Edit</a>

     <!-- <a href="../product/prodele.php?pid=<?php echo $r['p_ID']; ?>" type="button" class="glyphicon glyphicon-remove btn-danger"></a><br/> -->
     <a class="btn" onClick="popitup('../product/view.php?pid=<?php echo $r['p_ID']; ?>')" >View</a>
    <a href="javascript:AlertIt2(<?php echo $r['p_ID']; ?>);"  type="button" class="glyphicon glyphicon-remove btn-danger"></a>
 
 </td>
  <script type="text/javascript">
function AlertIt2(id) {
var answer = confirm ("Product (ID-"+id+") will be removed.Click OK to confirm")
if (answer)
  // alert("../product/prodele.php?pid="+id);
window.location="../product/prodele.php?pid="+id;
}
</script>
</tr>





<?php

}
} else{
   
  $sql="SELECT * FROM `product` ORDER BY p_ID DESC";


$result = mysqli_query($bd,$sql);
  while($r = mysqli_fetch_array($result)) {



 ?>

<!-- <div class="form-group"> -->
<tr id="row<?php echo $r['p_ID']; ?>">
  <td>
    <label class="control-label"><?php echo $r['p_ID']; ?></label>
</td>
<td>
<?php 
   
      include('database_connection.php');
      $cat = $r['cat_ID'];
      $result1 = mysqli_query($bd,"SELECT * FROM `category` WHERE `c_ID` = '$cat'");
       $r1 = mysqli_fetch_array($result1);
       echo $r1['c_name'];
      ?>

 </td>

 <td>
     <?php 
   
      include('database_connection.php');
      $br = $r['B_ID'];
      $result2 = mysqli_query($bd,"SELECT * FROM `brand` WHERE `b_ID` = '$br'");
       $r2 = mysqli_fetch_array($result2);
       echo $r2['b_name'];
      ?>
 </td>

 <td>
     <?php echo $r['p_name']; ?>  
 </td>

 <td>
 <?php echo $r['p_modelno']; ?> 
 </td>

 <td>
 <?php echo $r['p_price']; ?>  
 </td>
<?php

 if($r['p_qih']==$r['p_reorderlvl'])
{ 
  echo "<td class=\"danger\">".$r['p_qih']."</td>";  
 // echo "<td valign=\"top\"><form method='POST' action='SaveParameters.php'>";
}  else 
{
  echo "<td  >".$r['p_qih']."</td>"; 
}
?>
  <!-- <td class="danger"> <?php echo $r['p_qih']; ?></td> -->

 <td>
 <?php echo $r['p_reorderlvl']; ?> 
 </td>

  <td>
  <img    alt="Responsive image" src="http://localhost/shop/web/proimg/<?php echo $r['p_image']; ?>" alt=""  height="60" width="60" />
 </td>
 <td>
 <?php echo $r['p_desc']; ?> 
 </td>

<td class="some" >
     <a class="btn" onClick="popitup('../product/pedit.php?pid=<?php echo $r['p_ID']; ?>')">Edit</a>

     <!-- <a href="../product/prodele.php?pid=<?php echo $r['p_ID']; ?>" type="button" class="glyphicon glyphicon-remove btn-danger"></a><br/> -->
     <a class="btn" onClick="popitup('../product/view.php?pid=<?php echo $r['p_ID']; ?>')" >View</a>
<a href="javascript:AlertIt2(<?php echo $r['p_ID']; ?>);"  type="button" class="glyphicon glyphicon-remove btn-danger"></a>


 </td>
  <script type="text/javascript">
function AlertIt2(id) {
var answer = confirm ("Product (ID-"+id+") will be removed.Click OK to confirm")
if (answer)
  // alert("../product/prodele.php?pid="+id);
window.location="../product/prodele.php?pid="+id;
}
</script>
</tr>
<!-- </div> -->

<?php

 } 

 }

?>

</table >
</td>
</tr>
</table>
</body>
  </html>




