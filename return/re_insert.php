<html>
<head>

	<script type="text/javascript" src="http://localhost/bootstrap/js/jquery-1.11.2.min.js"></script> 
	<link rel="stylesheet" type="text/css" href="http://localhost/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/shop/admin/stylee1.css">

<script type="text/javascript">

</script>
</head>

<body>

<table width="600" border="0" align="center"  >
<tr>

<td>

<?php  
session_start();
include('database_connection.php');



if(empty($_GET) && empty($_POST)){
  header("location: return.php");
}

elseif (!empty($_GET['p_id'])){


        
          echo "<br>";
         

     
     $sqltemp = "INSERT INTO `shop`.`returntemp` (`P_ID`, `qty`) VALUES ('$_GET[p_id]', '$_POST[qty]') ON DUPLICATE KEY UPDATE `qty`='$_POST[qty]';";


if (!mysqli_query($bd, $sqltemp))
  {
  die('Error: ' . mysqli_error($bd));
  }
// echo "1 record added";

mysqli_close($bd);
  
   } elseif(empty($_GET['pid']))  {

  $sqltrun = "TRUNCATE TABLE `returntemp`;";
   mysqli_query($bd, $sqltrun);

$_SESSION['Or_ID']=$_POST['Or_ID'];

   }
$Or_ID= $_SESSION['Or_ID'];  
  ?>




<table border="1" align="center" class="table table-bordered " >
<tr>
  <td bgcolor="#EFF0F1">

 <table id="sumtable" width="200" border="0" align="center" class="table">

<?php
  include('database_connection.php');
  $result3 = mysqli_query($bd,"SELECT * FROM `order` WHERE `or_ID` = '$Or_ID'");
       $r3 = mysqli_fetch_array($result3);

   $result4 = mysqli_query($bd,"SELECT * FROM `cus` WHERE `c_id` = '$r3[c_ID]'");
       $r4 = mysqli_fetch_array($result4);

   $result5 = mysqli_query($bd,"SELECT * FROM `cart` WHERE `crt_ID` = '$r3[crt_ID]'");
       $r5 = mysqli_fetch_array($result5);

   $result6 = mysqli_query($bd,"SELECT * FROM `payment` WHERE `pay_ID` = '$r3[pay_ID]'");
       $r6 = mysqli_fetch_array($result6);  
  ?>     
	



<tr><td><b>Order Detials</b></td><td></td></tr>

    <tr>
    <td><font size="2"><b>Customer:</b></font></td>
    <td><font size="2"><?php echo $r4['c_fname']." ".$r4['c_mname']." ".$r4['c_lname']; ?></font></td>
  </tr>

    <tr>
    <td><font size="2"><b>Order ID:</b></font></td>
    <td><font size="2"><?php echo $r3['or_ID']; ?></font></td>
  </tr>

  <tr>
    <td><font size="2"><b>Order Date:</b></font></td>
    <td><font size="2"><?php echo $r3['or_date']; ?></font></td>
  </tr>

   <tr>
    <td><font size="2"><b>Total:</b></font></td>
    <td><font size="2"><?php echo "Rs :".$r6['pay_amount']; ?></font></td>
  </tr>
 <tr><td></td><td></td></tr>
 
 </table>



  <table id="sumtable" width="200" border="0" align="center" class="table">
<tr><td><b>Add To Returns</b></td><td></td></tr>
  <tr>
    <td><font size="2"><b>Product</b></font></td>
    <td><font size="2"><b>Model</b></font></td>
    <td><font size="2"><b>Quantity</b></font></td>
   
  </tr> 

  <?php

$sql="SELECT * FROM `cart_product` WHERE `crt_ID` = '$r3[crt_ID]'";

$result8 = mysqli_query($bd,$sql);
  while($r8 = mysqli_fetch_array($result8)) {
?>


  <tr>

  
  <form id="form1" name="form1" method="post" action="re_insert.php?p_id=<?php echo $r8['p_ID']; ?>" enctype="multipart/form-data">

  <?php

       $result9 = mysqli_query($bd,"SELECT * FROM `product` WHERE `p_ID` = '$r8[p_ID]'");
       $r9 = mysqli_fetch_array($result9);  

  ?>
  
  

    <td><font size="2"> <?php echo $r9['p_name']; ?> </font></td>
    <td><font size="2"> <?php echo $r9['p_modelno']; ?> </font></td>
    <td>
   	 
   	 <select name="qty" id="qty">
        <?php 
   
           include('database_connection.php');
           $result = mysqli_query($bd,"SELECT * FROM `cart_product` WHERE `crt_ID` = '$r3[crt_ID]' AND `p_ID` = '$r8[p_ID]' ");
           $r15 = mysqli_fetch_array($result);
    for ($i=1; $i >= $r15['qty']; $i++) { 
    	# code...
          ?>
 
           <option  value="<?php echo $i; ?>"> <?php echo $i; ?></option>

         <?php
                         }
          ?>

     </select>



   </td>
<td><input name="submit" type="submit" id="submit" class="btn btn-primary" ></td>
</form>
  
   

    </tr>  

    <?php

    } ?>	

    </td>
    </tr>
    </table>

     <table id="sumtable" width="200" border="0" align="center" class="table">
<tr><td><b>Returns</b></td><td></td></tr>
  <tr>
    <td><font size="2"><b>Product</b></font></td>
    <td><font size="2"><b>Model</b></font></td>
    <td><font size="2"><b>Quantity</b></font></td>
   
  </tr> 
 
    <?php
    $flag=0;
    $sql="SELECT * FROM `returntemp`";
    $result10 = mysqli_query($bd,$sql);
  while($r10 = mysqli_fetch_array($result10)) {
    $flag=1;

?>

 <tr>
<?php


       $result11 = mysqli_query($bd,"SELECT * FROM `product` WHERE `p_ID` = '$r10[P_ID]'");
       $r11 = mysqli_fetch_array($result11);  


  ?>
 <td><font size="2"> <?php echo $r11['p_name']; ?> </font></td>
 <td><font size="2"> <?php echo $r11['p_modelno']; ?> </font></td>
 <td><font size="2"> <?php echo $r10['qty']; ?> </font></td>
 <td>  <a href="removereturn.php?pid=<?php echo $r10['P_ID']; ?>" type="button" class="glyphicon glyphicon-remove btn-danger"></a></td>


  </tr>
<?php 
}
?><tr></tr>
<tr>
<td></td>
<td></td>
<td></td>
<td> <button class="btn btn-info" onClick="location.href='returninfo.php'"  <?php if($flag==0){ echo "disabled"; } ?> >Next</button> </td>
</tr>
  </table>

</td>
</tr>
</table>

</body>
</html>