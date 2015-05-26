<link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="stylee1.css">
   <script src="../bootstrap/jquery/jquery-1.11.2.js"></script> 
<script type="text/javascript" src="http://localhost/bootstrap/js/move-top.js"></script>
<script type="text/javascript" src="../bootstrap/js/easing.js"></script>
<script type="text/javascript" src="../bootstrap/js/startstop-slider.js"></script>
  <!-- // <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script> -->
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<!-- <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> -->
        <script>
            $(function(){
  $("#header").load("../headerfooter/header.php"); 
  $("#footer").load("../headerfooter/footer.php"); 
    $("#caro").load("../caros/dfs.php"); 
    $("#pag").load("../product/pag.php"); 
    $("#cat").load("../product/cat.php"); 
  });
        </script>
  <div id="header"></div>   
   <div class="wrap">

 <a class="btn btn-success btn-lg" href="cart.php"><span class="glyphicon glyphicon-arrow-left"></span> Back to Cart  </a>
 <div class="clear">  <br></div>
<form id="form1" name="form1" method="post" action="pay.php" >


  <!-- <div class="col-md-7"> -->
      <!-- <div class="well"> -->
<table id="sumtable" width="200" border="1" align="center" cellpadding="1" cellspacing="1" class="table table-bordered">
	<tr>
		<td class="bg-primary" width=100 colspan="4">  <label class="control-label">Customer Shipping Details </label></td>
  <!-- <td class="bg-primary" ><label class="control-label">Product Name </label></td> -->
 <!--  <td class="bg-primary" ><label class="control-label">Quantity </label></td>
  <td class="bg-primary"><label class="control-label">Unit Price </label></td>
  <td class="bg-primary"><label class="control-label">Subtotal </label></td>
  <td class="bg-primary"><label class="control-label">Del </label></td> -->
</tr>
<?php
 session_start();


include('database_connection.php');
if( empty($_SESSION['logins']))
{
header('Location:../logorreg/logreg.php');
}else{
$cid=$_SESSION['logins'];

$sql="SELECT * FROM `cus` WHERE `c_id`=$cid";

$result = mysqli_query($bd,$sql);
  while($r = mysqli_fetch_array($result)) {
  	 ?>
	<tr>
  <td><label class="control-label">Shipping Address</label></td><td> <?php echo $r['c_shaddr1'].$r['c_shaddr2'].$r['c_shaddr3']; ?></td>
    </tr>
<?php }} ?>
</table >
<table id="sumtable" width="200" border="1" align="center" cellpadding="1" cellspacing="1" class="table table-bordered">


<tr>
    <td class="bg-primary" width=100 colspan="4">  <label class="control-label">  Shipping Methods </label></td>
</tr>
<tr> 
 <td colspan="4" align="left">
<?php
 include('database_connection.php');
$sql="SELECT * FROM `shipmethod`";
$result = mysqli_query($bd,$sql);
  while($r = mysqli_fetch_array($result)) {
 ?>
  <div class="radio">
  <label>
    <input onclick="handleClick(this);" type="radio" name="shipmeth" id="<?php echo $r['shipm_cost'] ; ?>" value="<?php echo $r['shipm_ID'] ; ?>" required >
    <?php echo $r['shipm_name'] ; ?> (Rs. <?php echo $r['shipm_cost'],"-",$r['shipm_desc']; ?>)
      </label>
</div>
<?php
}
?>
 </td>
</tr>
</table >

<!-- <form name="myForm">
            <input type="radio" name="myRadios"  value="1" onclick="handleClick(this);" />
            <input type="radio" name="myRadios"  value="2" onclick="handleClick(this);"/>
        </form> -->


<table id="sumtable" width="200" border="1" align="center" cellpadding="1" cellspacing="1" class="table table-bordered">

<tr>
  <td class="bg-primary" colspan="4"><label class="control-label">Product list </label></td>
</tr>
<tr>

  
 <td ><label class="control-label">Product Name </label></td>
  <td  ><label class="control-label">Quantity </label></td>
  <td><label class="control-label">Unit Price </label></td>
  <td ><label class="control-label">Subtotal </label></td>

  <?php
 // session_start();


include('database_connection.php');
if( empty($_SESSION['logins']))
{
echo 'must login';
}else{
$cid=$_SESSION['logins'];


$sql="SELECT * FROM `cart_product` WHERE `crt_ID` =(SELECT `crt_ID` FROM `cart` WHERE `C_ID`='$cid' AND `stat`=0)";
// $sql="SELECT * FROM `product` WHERE `p_ID` = ();";

$result = mysqli_query($bd,$sql);

  if(mysqli_num_rows($result)==0)
    {
      header('Location:cart.php');
    }
    
  while($r = mysqli_fetch_array($result)) {




$pid=$r['p_ID'];
    $sql2="SELECT * FROM `product` WHERE `p_ID` ='$pid'";

    $result2 = mysqli_query($bd,$sql2);
  while($r2 = mysqli_fetch_array($result2)) {

 ?>

<!-- <div class="form-group"> -->
<tr id="row<?php echo $r2['p_ID']; ?>">
  
<td>
   <!--    --> <?php echo $r2['p_name']; ?> <!--  -->
 </td>

 <td> 
    
     
      <?php echo $r['qty']; ?>
 </td>

 <td width="45px">
     <?php echo $r2['p_price']; ?>  
 </td>

 <td class="some" id="cc<?php echo $r2['p_ID']; ?>">
 <?php echo $r2['p_price']*$r['qty']; ?> 
 </td>



</tr>
<!-- </div> -->

<?php

  }}

}
?>


 <!--  <td class="bg-primary" ><label class="control-label">Quantity </label></td>
  <td class="bg-primary"><label class="control-label">Unit Price </label></td>
  <td class="bg-primary"><label class="control-label">Subtotal </label></td>
  <td class="bg-primary"><label class="control-label">Del </label></td> -->
  
</tr>
<?php
$sqltot="SELECT SUM(product.`p_price`*cart_product.`qty`) AS 'tt' FROM 
`cart_product` inner join `product` on cart_product.`p_ID`=product.`p_ID` 
where cart_product.`crt_ID`=(SELECT `crt_ID` FROM `cart` WHERE `C_ID`='$cid' AND `stat`=0)";

$resultr = mysqli_query( $bd,$sqltot) or die(mysql_error());
$rowr = mysqli_fetch_assoc($resultr);
?>

</table >

<table id="sumtable1" width="200" border="1" align="center" cellpadding="1" cellspacing="1" class="table table-bordered">

<tr name="r">
    <td  class="info" width=100 colspan="4">  <label class="control-label"> Sub Total:</label></td>
    <td class="info"align="left">    <?php echo $rowr['tt'] ; ?>    </td>
</tr>
<tr name="r1">
    <td  class="info" width=100 colspan="4">  <label class="control-label"> Grand Total:</label></td>
    <td class="info"align="left" style="font-weight: bold; font-size: 150%;">Rs.<input type="text" readonly="true" id="tot" name="tot" value="<?php echo $rowr['tt'].".00"; ?>"></input>   </td>
</tr>
 
 
    


</table >
<script type="text/javascript">
function handleClick(myRadio) {

    if(myRadio.value!="Free")
     {
      // alert('value: ' + myRadio.id);
    
      var oldtot= parseInt(myRadio.id, 10);
       var tot= parseInt(document.getElementById("sumtable1").rows.namedItem("r" ).cells.item(1).innerHTML, 10);
    // alert(document.getElementById("sumtable1").rows.namedItem("r1" ).cells.item(1).innerHTML);
var newtot=oldtot+tot;
  // document.getElementById("sumtable1").rows.namedItem("r1" ).cells.item(1).innerHTML=  "Rs."+ newtot +".00"  ;
  document.getElementsByName('tot')[0].value=newtot +".00";
     } else
     {
      alert('value: ' + myRadio.value);
     }
}
</script>
<table id="sumtable" width="200" border="1" align="center" cellpadding="1" cellspacing="1" class="table table-bordered">


<tr>
    <td class="bg-primary" width=100 colspan="4">  <label name="cc" class="control-label"> Payment Method </label></td>
</tr>
<tr> 
 <td colspan="4" align="left">
<?php
 include('database_connection.php');
$sql="SELECT * FROM `pay-methods`";
$result = mysqli_query($bd,$sql);
  while($r = mysqli_fetch_array($result)) {
 ?>
  <div class="radio">
  <label>
 <input onclick="go('<?php echo htmlentities($r['paym_desc'], ENT_QUOTES) ; ?>');" type="radio" name="paymeth" id="paymeth" value="<?php echo $r['paym_ID'] ; ?>" required>
    
    <?php echo $r['paym_name'] ; ?>
      </label>

</div>
<?php
}
?>
 </td>
</tr>

<script LANGUAGE="JavaScript">


function go(loc){
    // document.getElementById('calendar').src = loc+".html";
    // alert(loc);  

    // document.getElementById('all').style.visibility = 'hidden';
    // var x = document.getElementsByClassName('all') ;
    // 
    // alert(x);  
          // x[0].style.backgroundColor = "red";
// document.getElementById('all').innerHTML = '<input type="text" name="bank" id="bank" />';
document.getElementById('all').innerHTML = loc;
          // x[0] .style.visibility = 'hidden';
          // document.getElementById(loc).style.visibility = 'visible';
}
 
</script>
  

 
<style type="text/css">
  
 #bd,#cod,#pp,#cc,#all {
    visibility: visible;
    width: auto;
    height: auto;
    
}
</style>
<tr><td>
  <div id="all"></div></tr></td></table>
<!-- <div id="bd">bank deposit details here</div>
<div id="cod">cash on delivary</div>

<div id="pp">pay pal details here</div>
<div id="cc">credit card details here</div>
<div id="ezy">ezy cash details here</div> -->

 
<button type="submit" class="btn btn-success btn-lg" >Confirm Order <span class="glyphicon glyphicon-ok-sign"></span></button>

</form>
    <!-- </div> -->
  <!-- </div> -->

  
 </div>
 
</div>
    
</body>
<div id="footer"></div>
</html>