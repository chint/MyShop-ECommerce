<html>
 <head>
  <script type="text/javascript" src="http://localhost/bootstrap/js/jquery-1.11.2.min.js"></script> 
  <!-- // <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
  <link rel="stylesheet" type="text/css" href="http://localhost/bootstrap/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="stylee1.css"> -->

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


<body>
 
<div id="header"></div>   
 
 
 <form class="form-inline" name="myForm" action="cusreport.php?filter=1" method="post" onsubmit="return validateForm()" data-toggle="validator" role="form">
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
        <p ><label  >Order Report</label></p>
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
    <p  ><label  >Order Report  (All Orders)</label></p>
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
      <a href="cusreport.php" type="button" class="noprint">Reset</a>
         </div>
    </td>

</tr>
</table>
  </form>
  <div class="form-group">
<button  id="show" onclick="myFunction()" class="btn btn-success" >Print this Document</button>
</div>
<!-- <p style="display: none;" class="p">This paragraph should be hidden.</p> -->


<table width="1350" border="1" align="center" class="table table-bordered " >

<tr>
  <td width="1120" height="142" bgcolor="#EFF0F1">

 <table id="sumtable" width="200" border="1" align="center" cellpadding="1" cellspacing="1" class="table table-bordered">
  <tr>
    <td class="bg-primary" width=200>  <label class="control-label">Order ID </label></td>
  <td class="bg-primary"><label class="control-label">Customer Name </label></td>
  <td class="bg-primary" ><label class="control-label">Status</label></td>
 <td class="bg-primary"><label class="control-label">Added Date</label></td>
 <td class="bg-primary"><label class="control-label">Total</label></td>
 <td  class="noprint" class="bg-primary"> </td>
</tr>




<?php
 $r3=null;
if(isset($_GET['filter']))
  

{
    include('database_connection.php');


 $d1= $_POST['date1'];
$d2= $_POST['date2'];
// echo  $d1 , $d2;
$sql="SELECT * FROM `cus`,`order`,`payment` WHERE `cus`.`c_id`=`order`.`c_ID` and `payment`.`pay_ID`=`order`.`pay_ID` and`or_date` BETWEEN '$d1' AND '$d2'";

 
$result = mysqli_query($bd,$sql);
  while($r = mysqli_fetch_array($result)) { 

?>



<!-- <div class="form-group"> -->
<tr id="row<?php echo $r['or_ID']; ?>">
  <td>

    <label class="control-label"><?php echo $r['or_ID']; ?></label>
</td>
<td>
 
   <?php echo $r['c_fname']; ?> <?php echo $r['c_mname']; ?> <?php echo $r['c_lname']; ?>
 </td>

 <td>
 <?php echo $r['status']; ?>  
 </td>

 <td>
   <?php echo $r['or_date']; ?> 
 </td>

 <td>
 
     <?php echo $r['pay_amount']; ?>

</td>

 
<td class="noprint" >

     <a onClick="popitup('singleordereoprt.php?oid=<?php echo $r['or_ID']; ?>')" type="button" claas="btn" > View</a>

 </td>

</tr>
<!-- </div> -->

<?php

  }










} else {

include('database_connection.php');


$sql="SELECT * FROM `order`  ";
// $sql="SELECT * FROM `product` WHERE `c_id` = ();";

$result = mysqli_query($bd,$sql);
  while($r = mysqli_fetch_array($result)) {

?>



<!-- <div class="form-group"> -->
<tr id="row<?php echo $r['or_ID']; ?>">
  <td>

    <label class="control-label"><?php echo $r['or_ID']; ?></label>
</td>
<td>


    <?php

        $sql1="SELECT * FROM `cus` WHERE `c_id` = '$r[c_ID]'";
        $result1= mysqli_query($bd,$sql1);
        $r1=mysqli_fetch_assoc($result1);



    ?> 
   <!--    --> <?php echo $r1['c_fname']; ?> <?php echo $r1['c_mname']; ?> <?php echo $r1['c_lname']; ?>
 </td>

 <td id="p01">
 <?php echo $r['status']; ?>  
 </td>

 <td>
   <?php echo $r['or_date']; ?> 
 </td>

 <td>
 <?php

        $sql2="SELECT * FROM `payment` WHERE `pay_ID` = '$r[pay_ID]'";
        $result2= mysqli_query($bd,$sql2);
        $r2=mysqli_fetch_assoc($result2);

    ?> 
   <!--    --> <?php echo $r2['pay_amount']; ?>



 </td>

 
<td   class="noprint" >

 <!--  <?php if($log == 1) { ?>
     <a  onClick="popitup('../order/ordedit.php?oid=<?php echo $r['or_ID']; ?>')" type="button" class="btn">Edit  /</a>
     <?php } ?> -->
     <a  onClick="popitup('singleordereoprt.php?oid=<?php echo $r['or_ID']; ?>')" type="button" class="btn" > View</a>

 </td>

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




