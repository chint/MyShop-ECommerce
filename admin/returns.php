<html>
 <head>
  <script type="text/javascript" src="http://localhost/bootstrap/js/jquery-1.11.2.min.js"></script> 
  <link rel="stylesheet" type="text/css" href="http://localhost/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="stylee1.css">

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
              $("#header").load("adminheader1.php"); 
                        });
 </script>

<?php

// Load Mod Header
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
<h1 style="font-size: 30">Returns</h1>
<button class="btn btn-success" onClick="return popitup('http://localhost/shop/return/return.php')"><span class="icon">Add Return</span></button> <br>
<table width="1350" border="1" align="center" class="table table-bordered " >
<tr>
  <td width="1120" height="142" bgcolor="#EFF0F1">

 <table id="sumtable" width="200" border="1" align="center" cellpadding="1" cellspacing="1" class="table table-bordered">
  <tr>
    <td class="bg-primary" width=200>  <label class="control-label">Return ID </label></td>
    <td class="bg-primary" width=200>  <label class="control-label">Order ID </label></td>
  <td class="bg-primary"><label class="control-label">Customer Name </label></td>
  <td class="bg-primary" ><label class="control-label">Quantity</label></td>
 <td class="bg-primary"><label class="control-label">Action</label></td>
</tr>


<form name="myForm" action="returns.php?filter=1" method="post" onsubmit="return validateForm()" data-toggle="validator" role="form">

<tr>
  <td><input class="form-control" type="text" name="re_id" id="re_id" onblur="stoppedTyping1()"  /></td>
  <td><input class="form-control" type="text" name="or_id" id="or_id" onblur="stoppedTyping2()" /></td>
  <td><input class="form-control" type="text" name="c_name" id="c_name" onblur="stoppedTyping3()" /></td>
  <td>
  <!-- <input type="button" value="Clear" class="btn btn-primary" onclick="window.location.reload()">  -->
  </td>
  <td><input name="submit" type="submit" id="submit" class="btn btn-primary btn-sm" value="Filter">
<a href="../admin/returns.php">Reset</a>
  </td>
</tr>
  </form>

<?php

if(isset($_GET['filter']))
  

{



    include('database_connection.php');


if (isset($_POST['re_id'])) {

$sql="SELECT * FROM `returns` WHERE `re_id` = '$_POST[re_id]' "; 
}




 // $sql="SELECT * FROM `order` WHERE `or_ID`= '$_POST[oid]' or `c_ID`='$r3[c_id]' or `status` = '$_POST[status]' or `or_date` =' $_POST[date]' or `pay_ID` = '$r4[pay_ID]' ";
if (isset($_POST['or_id'])) {

$sql="SELECT * FROM `returns` WHERE `or_id` = '$_POST[or_id]' "; 
}



if (isset($_POST['c_name'])) {

// $sql="SELECT a.re_id, b.or_ID FROM `returns` a, `order` b WHERE a.or_id = b.or_ID AND b.c_ID =(SELECT c_id FROM `cus` WHERE c_fname = 'Chinthaka')"; 
  $sql="SELECT returns.re_id, returns.or_id 
FROM `order` 
 INNER JOIN cus 
   ON order.c_ID = cus.c_id 
 INNER JOIN returns 
   ON order.or_ID = returns.or_id 
 WHERE `c_fname` = '$_POST[c_name]'";


}




$result = mysqli_query($bd, $sql);
  if(mysqli_num_rows($result)==0){
  echo "<tr><td colspan='11'><div class='alert alert-info' role='alert'> No result Found. <a  href='returns.php'><button type='button' class='btn btn-success' >Reset</button></a> </div></td></tr>";
}

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
   $qty = $qty + $r12['re_qty'] ;
  }

    ?>

 <?php echo $qty; ?>  
 </td>

 
<td class="some" >

  <?php if($log == 1) { ?>
    <!--   <a href="../order/ordedit.php?oid=<?php echo $r['or_ID']; ?>" type="button" >Edit  /</a> -->
     <?php } ?>
      <a onClick="popitup('../return/returnview.php?re_id=<?php echo $r['re_id']; ?>')" type="button" >View /</a>
       <a onClick="popitup('../return/temp1.php?re_id=<?php echo $r['re_id']; ?>')" type="button" > Edit</a>
      <a href="javascript:AlertIt2(<?php echo $r['re_id']; ?>);"  type="button" class="glyphicon glyphicon-remove btn-danger"></a>


 </td>
  <script type="text/javascript">
function AlertIt2(id) {
var answer = confirm ("Product (ID-"+id+") will be removed.Click OK to confirm")
if (answer)
  // alert("../product/prodele.php?pid="+id);
window.location="../return/returndel.php?re_id="+id;
}
</script>

</tr>
<!-- </div> -->

<?php

 } 
 if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
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

 
<td class="some" >

  <?php if($log == 1) { ?>
     <?php } ?>
     <a onClick="popitup('../return/returnview.php?re_id=<?php echo $r['re_id']; ?>')" type="button" > View /</a>
      <a onClick="popitup('../return/temp1.php?re_id=<?php echo $r['re_id']; ?>')" type="button" > Edit</a>
     <!-- <a onClick="popitup('../return/returndel.php?re_id=<?php echo $r['re_id']; ?>')" type="button" class="glyphicon glyphicon-remove btn-danger"></a> -->
 <a href="javascript:AlertIt2(<?php echo $r['re_id']; ?>);"  type="button" class="glyphicon glyphicon-remove btn-danger"></a>


 </td>
  <script type="text/javascript">
function AlertIt2(id) {
var answer = confirm ("Product (ID-"+id+") will be removed.Click OK to confirm")
if (answer)
  // alert("../product/prodele.php?pid="+id);
window.location="../return/returndel.php?re_id="+id;
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




