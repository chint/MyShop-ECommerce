<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="jquery.min.js" type="text/javascript"></script>

<head>
<style>
.error {color: #FF0000;}
</style>


</head>
<script type="text/javascript" src="http://localhost/bootstrap/js/bootstrap.min.js"></script>
  <link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<body onload="sumup()" >
<form id="form1" name="form1" >

  <div class="col-md-7">
      <!-- <div class="well"> -->
<table  id="sumtable" width="200" border="1" align="center" cellpadding="1" cellspacing="1" class="table table-bordered">
	<tr>
		<td class="bg-primary" width=200>  <label class="control-label">Product ID </label></td>
  <td class="bg-primary"><label class="control-label">Product Name </label></td>
  <td class="bg-primary" ><label class="control-label">Quantity </label></td>
  <td class="bg-primary"><label class="control-label">Unit Price </label></td>
  <td class="bg-primary"><label class="control-label">Subtotal </label></td>
  <td class="bg-primary"><label class="control-label">Del </label></td>
</tr>
<?php
 session_start();


include('database_connection.php');
$cid=$_SESSION['logins'];


$sql="SELECT * FROM `cart_product` WHERE `crt_ID` =(SELECT `crt_ID` FROM `cart` WHERE `C_ID`='$cid')";
// $sql="SELECT * FROM `product` WHERE `p_ID` = ();";

$result = mysqli_query($bd,$sql);
  while($r = mysqli_fetch_array($result)) {

$pid=$r['p_ID'];
  	$sql2="SELECT * FROM `product` WHERE `p_ID` ='$pid'";

  	$result2 = mysqli_query($bd,$sql2);
  while($r2 = mysqli_fetch_array($result2)) {

 ?>

<!-- <div class="form-group"> -->
<tr id="row<?php echo $r2['p_ID']; ?>">
	<td>
    <label class="control-label"><?php echo $r2['p_ID']; ?></label>
</td>
<td>
   <!--    --> <?php echo $r2['p_name']; ?> <!--  -->
 </td>

 <td><button id="mbutton<?php echo $r2['p_ID']; ?>" type="button"  onclick="minus('<?php echo $r2['p_ID']; ?>')" >-</button>
     <input size="5" max="20" id="<?php echo $r2['p_ID']; ?>" name="eda" value="<?php echo $r['qty']; ?>"></input>
     
     <button type="button"  onclick="plus('<?php echo $r2['p_ID']; ?>')" >+</button>
 </td>

 <td>
     <?php echo $r2['p_price']; ?>  
 </td>

 <td class="some" id="cc<?php echo $r2['p_ID']; ?>">
 <?php echo $r2['p_price']; ?> 
 </td>

<td>
     <a href="remove4mcart.php?pid=<?php echo $r2['p_ID']; ?>&crtid=<?php echo $r['crt_ID']; ?>" type="button" class="glyphicon glyphicon-remove btn-danger"></a>
 </td>

</tr>
<!-- </div> -->

<?php

  }

 
}
?>
<tr>
  <td></td>
  <!-- <td colspan="4">Total:</td> -->
  <td></td>
  <td>Total:</td>
  <td></td>
  <td>0</td>
</tr>
</table >

<button type="button"  onclick="sumup( )" >sum</button>
 
</form>
    </div>
  <!-- </div> -->

    <script type="text/javascript">

// You've written here getPassword()

function plus(a){
 var x =document.getElementById(a).value;
x++;

document.getElementById(a).value=x;
  document.getElementById("mbutton"+a).disabled=false;

incPrice(a,1);

}



function minus(a){
 var x =document.getElementById(a).value;
x--;

if(x==0){
document.getElementById("mbutton"+a).disabled=true;
}else{
  document.getElementById("mbutton"+a).disabled=false;
 document.getElementById(a).value=x; 

}
incPrice(a,2);
}


function incPrice(a,type){

 var x =document.getElementById(a).value;
var price=document.getElementById("sumtable").rows.namedItem("row"+a).cells.item(3).innerHTML;
// if(type==1){
 
// }else{
//   var newprice=price-(price/x);
// }
var newprice=price*x;

document.getElementById("sumtable").rows.namedItem("row"+a).cells.item(4).innerHTML=newprice;

sumup();
}


 // alert(x);
function sumup() {
  // alert("aaaaaaa");
 var t = [], cell,
  row = document.getElementById( 'sumtable' ).rows,
  i = row.length - 1,
  lastrow = row[i];
 while(i--) {
  cell = row[i].cells;
   j = cell.length;
  while(j--) {
   if( !t[j] ) { t[j] = 0; }

  t[j] += parseFloat( cell[j].firstChild.nodeValue   ) || 0;
    // t[j] += parseFloat( cell[j].firstChild.innerHTML ) || 0;
  }
 }
 j = t.length; while(j--) {
  if( lastrow.cells[j] ) { lastrow.cells[j].firstChild.nodeValue = t[j]; }
 }
 //o.disabled = true;
}




</script>
</body>
</html>