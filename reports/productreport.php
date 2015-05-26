<html>
 <head>
  <script type="text/javascript" src="http://localhost/bootstrap/js/jquery-1.11.2.min.js"></script> 
  <link rel="stylesheet" type="text/css" href="http://localhost/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="stylee1.css">
    <script>
function myFunction() {
         
    window.print();
 
}
 
</script>


 <style type="text/css" media="print" >

   @media print {   
   .tt { display: validate; } 
    .noprint { display: none; }
    button.btn  { display: none; }
     input.btn  { display: none; } 
     /*input.form-control{display: none;}*/

}
 
</style>
<script type="text/javascript">

function popitup(url) {
       newwindow=window.open(url,'windowName','height=600,width=600');
       if (window.focus) {newwindow.focus()}
       return false;
     }


     </script>
  
       <?php
session_start();


$log=$_SESSION['suser'];

if ($log != 1 && $log != 2) { 
   header ("Location: index.php");
 

 // Load Admin Header
}elseif ($log == 1) {

?>
 <script>
            $(function(){
              $("#header").load("../admin/adminheader1.php"); 
                        });
 </script>

<?php

// Load Mod Header
 }elseif ($log == 2) {
  ?>
  <script>
            $(function(){
              $("#header").load("../admin/modheader.php"); 
                        });
 </script>

 
<?php
}
?>
  
   
</head>



<body>

<div id="header"></div>   
 
 <form class="form-inline" name="myForm" action="productreport.php?filter=1" method="post" onsubmit="return validateForm()" data-toggle="validator" role="form">
<table width="750" border="0" align="center"  >
  
<tr>

<?php
 $r3=null;
if(isset($_GET['filter']))
  {
?>
  <div class="form-group">
    <td><label  >Start Date :- </label></td>
    <td>    
    <input class="form-control" type="date" required name="date1" id="or_ID" value="<?php echo $_POST['date1']; ?>" />
    
    </td>
    </div>

 <div class="form-group">
<td><label  >End Date :- </label></td>
     <td>
     
     <input class="form-control" type="date" required name="date2" id="or_ID" value="<?php echo $_POST['date2']; ?>" />
   
     </td> </div>
        <!-- <label class="p" hidden  >Order Report</label>  -->
        <p ><label  >Product Sales Report</label></p>
<?php
}else{
?>
 <div class="form-group">
    <td><label class="noprint">Start Date :- </label></td>
    <td class="noprint">    
    <input type="date" class="form-control"  required name="date1" id="or_ID"     />
    
    </td>
    </div>

 <div class="form-group">
<td><label class="noprint">End Date :- </label></td>
     <td class="noprint">
     
     <input class="form-control" type="date" required name="date2" id="or_ID"   />
   
     </td> </div>


    <!--   -->
    <p  ><label  >Product Sales Report  (All  )</label></p>
<?php

}
?>
     



  <td>
    <div class="form-group">
  <input name="submit" type="submit" id="submit" class="btn btn-primary btn-sm" value="Filter">
     </div>
    </td>

    <td>
   <div class="form-group">
      <a href="productreport.php" type="button" class="noprint">Reset</a>
         </div>
    </td>

</tr>

</table>
  </form>
  <button  id="show" onclick="myFunction()" class="btn btn-success" >Print this Document</button>
<table width="1350" border="1" align="center" class="table table-bordered " >
<tr>
  <td width="1120" height="142" bgcolor="#EFF0F1">

 <table id="sumtable" width="200" border="1" align="center" cellpadding="1" cellspacing="1" class="table table-bordered">
  <tr>
    <td class="bg-primary" width=200>  <label class="control-label">Product Name  </label></td>
  <td class="bg-primary"><label class="control-label">Product ID </label></td>
  <td class="bg-primary" ><label class="control-label">Quantity</label></td>
   <td class="bg-primary" ><label class="control-label">Unit Price</label></td>
 <td class="bg-primary"><label class="control-label">Total</label></td>
 <!-- <td class="bg-primary"><label class="control-label">Total</label></td> -->
 
</tr>


<form name="myForm" action="productreport.php?filter=1" method="post" onsubmit="return validateForm()" data-toggle="validator" role="form">

<!-- <tr>
  <td><input class="form-control" type="text" name="oid" id="or_ID" /></td>
  <td><input class="form-control" type="text" name="cname" id="or_ID" /></td>
  <td><select name="status" class="form-control" >
       <option value=""></option> 
       <option value="0">Not Shipped</option>
       <option value="1">Shipped</option>
       </select></td>
  <td><input class="form-control" type="date" name="date" id="or_ID" /></td>
 
  <td><input name="submit" type="submit" id="submit" class="btn btn-primary btn-sm" value="Filter"></td>
</tr> -->
  </form>

<?php
 $r3=null;

if(isset($_GET['filter']))
  

{
    
include('database_connection.php');

 $d1= $_POST['date1'];
$d2= $_POST['date2'];

 $sql = "SELECT *, COUNT(`cart_product`.`qty`) as qt FROM `cart_product`,`cart`,`product`,`order` WHERE `cart`.`stat`=1 AND `cart`.`crt_ID`=`cart_product`.`crt_ID` AND `product`.`p_ID`=`cart_product`.`p_ID` AND `order`.`crt_ID`=`cart`.`crt_ID` and `or_date` BETWEEN '$d1' AND '$d2' GROUP BY `product`.`p_ID`";

$result = mysqli_query($bd,$sql);
$grandtot=0;
  while($r = mysqli_fetch_array($result)) {

?>



<!-- <div class="form-group"> -->
<tr id="row<?php echo $r['or_ID']; ?>">
  <td>
    <label class="control-label"><?php echo $r['p_name']; ?></label>
</td>
<td>

   <!--    --> <?php echo $r['p_ID'] ; ?>
 </td>
   
 <td>
    <?php echo $r['qt'] ; ?>
 </td>
 <td> <?php echo $r['p_price']; ?> </td>
 <td>
   <?php echo $r['qt']*$r['p_price']; ?> 
 </td>

</tr>
<!-- </div> -->

<?php
$grandtot=$grandtot+$r['qt']*$r['p_price'];
 } 


} 
else {

include('database_connection.php');

$sql = "SELECT *, COUNT(`cart_product`.`qty`) as qt FROM `cart_product`,`cart`,`product` WHERE `cart`.`stat`=1 AND `cart`.`crt_ID`=`cart_product`.`crt_ID` AND `product`.`p_ID`=`cart_product`.`p_ID` GROUP BY `product`.`p_ID`";
 
$result = mysqli_query($bd,$sql);
$grandtot=0;
  while($r = mysqli_fetch_array($result)) {

?>



<!-- <div class="form-group"> -->
<tr id="row<?php echo $r['or_ID']; ?>">
  <td>
    <label class="control-label"><?php echo $r['p_name']; ?></label>
</td>
<td>

   <!--    --> <?php echo $r['p_ID'] ; ?>
 </td>
   
 <td>
    <?php echo $r['qt'] ; ?>
 </td>
 <td> <?php echo $r['p_price']; ?> </td>
 <td>
   <?php echo $r['qt']*$r['p_price']; ?> 
 </td>
 
 
 

</tr>
 
<!-- </div> -->

<?php
 $grandtot=$grandtot+$r['qt']*$r['p_price'];
 } 
 // echo $grandtot;
}

 

?>
<tr> 
 
<td colspan="5" align="right"><?php echo ' <label class="control-label">Total product sales:-</label>'.$grandtot; ?></td> 
</tr>
</table >
</td>
</tr>
</table>
</body>
  </html>




