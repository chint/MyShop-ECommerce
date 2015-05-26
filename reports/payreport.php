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
 
 <form class="form-inline" name="myForm" action="payreport.php?filter=1" method="post" onsubmit="return validateForm()" data-toggle="validator" role="form">
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
        <p ><label  >Payment Report</label></p>
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
    <p  ><label  >Payment Report  (All  )</label></p>
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
      <a href="payreport.php" type="button" class="noprint">Reset</a>
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
    <td class="bg-primary" width=200>  <label class="control-label">Payment ID </label></td>
  <td class="bg-primary"><label class="control-label">Payment Type </label></td>
  <td class="bg-primary"><label class="control-label">Order ID </label></td>
  <td class="bg-primary" ><label class="control-label">Customer Name</label></td>
  <td class="bg-primary" ><label class="control-label">Customer ID</label></td>
   <td class="bg-primary" ><label class="control-label">Payment Date</label></td>
 <td class="bg-primary"><label class="control-label">Amount(Rs.)</label></td>
 <!-- <td class="bg-primary"><label class="control-label">Total</label></td> -->
 
</tr>


<form name="myForm" action="payreport.php?filter=1" method="post" onsubmit="return validateForm()" data-toggle="validator" role="form">

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
 

$sql = "SELECT * FROM `payment`,`cus`,`order`,`pay-methods` where `cus`.`c_id`=`payment`.`C_ID` AND `order`.`pay_ID`=`payment`.`pay_ID` AND `payment`.`paym_ID`=`pay-methods`.`paym_ID` and `pay_date` BETWEEN '$d1' AND '$d2' order by `payment`.pay_ID";
 
$result = mysqli_query($bd,$sql);
$grandtot=0;
  while($r = mysqli_fetch_array($result)) {

?>



<!-- <div class="form-group"> -->
<tr  >
  <td>
    <label class="control-label"><?php echo $r['pay_ID']; ?></label>
</td>
<td>

   <!--    --> <?php echo $r['paym_name'] ; ?>
 </td>
   
 <td>
    <?php echo $r['or_ID'] ; ?>
 </td>
 <td> <?php echo $r['c_fname'],$r['c_lname']; ?> </td>
 <td>
   <?php echo $r['C_ID']; ?> 
 </td>
 
 <td>
   <?php echo $r['pay_date']; ?> 
 </td>
 <td>
   <?php echo $r['pay_amount']; ?> 
 </td>


</tr>
 
<!-- </div> -->

<?php
 $grandtot=$grandtot+$r['pay_amount'];
 } 

} 
else {

include('database_connection.php');

$sql = "SELECT * FROM `payment`,`cus`,`order`,`pay-methods` where `cus`.`c_id`=`payment`.`C_ID` AND `order`.`pay_ID`=`payment`.`pay_ID` AND `payment`.`paym_ID`=`pay-methods`.`paym_ID` order by `payment`.pay_ID";
 
$result = mysqli_query($bd,$sql);
$grandtot=0;
  while($r = mysqli_fetch_array($result)) {

?>



<!-- <div class="form-group"> -->
<tr  >
  <td>
    <label class="control-label"><?php echo $r['pay_ID']; ?></label>
</td>
<td>

   <!--    --> <?php echo $r['paym_name'] ; ?>
 </td>
   
 <td>
    <?php echo $r['or_ID'] ; ?>
 </td>
 <td> <?php echo $r['c_fname'],$r['c_lname']; ?> </td>
 <td>
   <?php echo $r['C_ID']; ?> 
 </td>
 
 <td>
   <?php echo $r['pay_date']; ?> 
 </td>
 <td>
   <?php echo $r['pay_amount']; ?> 
 </td>


</tr>
 
<!-- </div> -->

<?php
 $grandtot=$grandtot+$r['pay_amount'];
 } 
 // echo $grandtot;
}

 

?>
<tr> 
 
<td colspan="7" align="right"><?php echo ' <label class="control-label">Total Payments:-</label>'.$grandtot; ?></td> 
</tr>
</table >
</td>
</tr>
</table>
</body>
  </html>




