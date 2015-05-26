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

   function stoppedTyping1(){
document.getElementById('or_id').disabled = true;
document.getElementById('c_name').disabled = true;
    }

    function stoppedTyping2(){
document.getElementById('re_id').disabled = true;
document.getElementById('c_name').disabled = true;
    }
 function stoppedTyping3(){
document.getElementById('re_id').disabled = true;
document.getElementById('or_id').disabled = true;
    }

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
 <form class="form-inline" name="myForm" action="returnreport.php?filter=1" method="post" onsubmit="return validateForm()" data-toggle="validator" role="form">
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
        <p ><label  >Returns Report</label></p>
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
    <p  ><label  >Returns Report  (All Returns)</label></p>
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
      <a href="returnreport.php" type="button" class="noprint">Reset</a>
         </div>
    </td>

</tr>
</table>
  </form>
<button  id="show" onclick="myFunction()" class="btn btn-success" >Print this Document</button>
 <br>

<table width="1350" border="1" align="center" class="table table-bordered " >
<tr>


  <td width="1120" height="142" bgcolor="#EFF0F1">

 <table id="sumtable" width="200" border="1" align="center" cellpadding="1" cellspacing="1" class="table table-bordered">
  <tr>
    <td class="bg-primary" width=200>  <label class="control-label">Return ID </label></td>
    <td class="bg-primary" width=200>  <label class="control-label">Order ID </label></td>
  <td class="bg-primary"><label class="control-label">Customer Name </label></td>
  <td class="bg-primary" ><label class="control-label">Quantity</label></td>
    <td class="bg-primary" ><label class="control-label">Date</label></td>
 <td  class="noprint" class="bg-primary"> </td>
</tr>




<?php
 include('database_connection.php');
if(isset($_GET['filter']))
  

{



   

 $d1= $_POST['date1'];
$d2= $_POST['date2'];

 
 

// $sql="SELECT * FROM `product` WHERE `c_id` = ();";

$result = mysqli_query($bd,"SELECT * FROM `returns` WHERE `date` BETWEEN '$d1' AND '$d2'  ");
  while($r = mysqli_fetch_array($result)) {

?>



<!-- <div class="form-group"> -->
<tr id="row<?php echo $r['re_id']; ?>">
  <td>

    <label class="control-label"><?php echo $r['re_id']; ?></label>
</td>
<td>
  <?php echo $r['or_id']; ?>  
</td>
<td>


    <?php

        $result1= mysqli_query($bd,"SELECT * FROM `order` WHERE `or_ID` = '$r[or_id]'");
        $r1=mysqli_fetch_assoc($result1);

        $result11= mysqli_query($bd,"SELECT * FROM `cus` WHERE `c_id` = '$r1[c_ID]'");
         $r11=mysqli_fetch_assoc($result11);


    ?> 
   <!--    --> <?php echo $r11['c_fname']; ?>
 </td>

 <td>
<?php
    $qty=0;
    $result12 = mysqli_query($bd,"SELECT * FROM `returns_prod` WHERE `re_id` = '$r[re_id]' ");
  while($r12 = mysqli_fetch_array($result12)) {
   $qty = $qty + $r12['r_qty'] ;
  }

    ?>

 <?php echo $qty; ?>  
 </td>

<td> <?php echo $r['date']; ?> </td>
<td class="noprint" >

  <?php if($log == 1) { ?>
     <?php } ?>
     <a onClick="popitup(' returnreportsingle.php?re_id=<?php echo $r['re_id']; ?>')" type="button" > View </a>
     
 </td>

</tr>
<!-- </div> -->

<?php

 } 








} else{

include('database_connection.php');

// $sql="SELECT * FROM `product` WHERE `c_id` = ();";

$result = mysqli_query($bd,"SELECT * FROM `returns` ");
  while($r = mysqli_fetch_array($result)) {

?>



<!-- <div class="form-group"> -->
<tr id="row<?php echo $r['re_id']; ?>">
  <td>

    <label class="control-label"><?php echo $r['re_id']; ?></label>
</td>
<td>
  <?php echo $r['or_id']; ?>  
</td>
<td>


    <?php

        $result1= mysqli_query($bd,"SELECT * FROM `order` WHERE `or_ID` = '$r[or_id]'");
        $r1=mysqli_fetch_assoc($result1);

        $result11= mysqli_query($bd,"SELECT * FROM `cus` WHERE `c_id` = '$r1[c_ID]'");
         $r11=mysqli_fetch_assoc($result11);


    ?> 
   <!--    --> <?php echo $r11['c_fname']; ?>
 </td>

 <td>
<?php
    $qty=0;
    $result12 = mysqli_query($bd,"SELECT * FROM `returns_prod` WHERE `re_id` = '$r[re_id]' ");
  while($r12 = mysqli_fetch_array($result12)) {
   $qty = $qty + $r12['r_qty'] ;
  }

    ?>

 <?php echo $qty; ?>  
 </td>

<td> <?php echo $r['date']; ?> </td>
<td class="noprint" >

  <?php if($log == 1) { ?>
     <?php } ?>
     <a onClick="popitup('returnreportsingle.php?re_id=<?php echo $r['re_id']; ?>')" type="button" > View </a>
     
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




