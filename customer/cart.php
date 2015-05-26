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
 <head>

 <script>
            $(function(){
  $("#header").load("../headerfooter/header.php"); 
  $("#footer").load("../headerfooter/footer.php"); 
    // $("#caro").load("http://localhost/shop/web/dfs.html"); 
    // $("#pag").load("http://localhost/shop/product/pag.php"); 
    // $("#cat").load("http://localhost/shop/product/cat.php"); 
  });
        </script>

</head>


  <div id="header"></div>   
   <div class="wrap">
<!-- <iframe height=50 width=100% src="http://localhost/shop/customer\welcome.php" ></iframe> -->
<body onload="sumup()" >
   
   
     
     <!-- <iframe height=1000 width=100% src="http://localhost/shop/product/naw.html" ></iframe> -->
    

<form id="form1" name="form1" >

  <!-- <div class="col-md-7"> -->
      <!-- <div class="well"> -->
<table id="sumtable" width="200" border="1" align="center" cellpadding="1" cellspacing="1" class="table table-bordered">
	<tr>
		<td class="bg-primary" width=200>  <label class="control-label">Product ID </label></td>
  <td class="bg-primary"><label class="control-label">Product Name </label></td>
  <td class="bg-primary" ><label class="control-label">Quantity </label></td>
  <td class="bg-primary"><label class="control-label">Unit Price </label></td>
  <td class="bg-primary"><label class="control-label">Subtotal </label></td>
  <td class="bg-primary"><label class="control-label">Remove Item(s) </label></td>
</tr>
<?php
include('database_connection.php');

session_start();
if( empty($_SESSION['logins']))
{
header('Location:../logorreg/logreg.php');
}else{
$cid=$_SESSION['logins'];


$sql="SELECT * FROM `cart_product` WHERE `crt_ID` = (SELECT `crt_ID` FROM `cart` WHERE `C_ID`='$cid' AND `stat`=0)";
// $sql="SELECT * FROM `product` WHERE `p_ID` = ();";
      
        $result = mysqli_query($bd,$sql);
        $btn=-1;
        
        if(mysqli_num_rows($result)==0)
        {
          $btn=1;
         
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
    <label class="control-label"><?php echo $r2['p_ID']; ?></label>
</td>
<td>
   <!--    --> <?php echo $r2['p_name']; ?> <!--  -->
 </td>

 <td>
 <button id="mbutton<?php echo $r2['p_ID']; ?>" type="button"  onclick="minus('<?php echo $r2['p_ID']; ?>','<?php echo $r['crt_ID']; ?>')" >-</button>
     <input  type="number" readonly size="5" max="10" id="<?php echo $r2['p_ID']; ?>" name="eda" value="<?php echo $r['qty']; ?>"></input>
     
     <button type="button"  onclick="plus('<?php echo $r2['p_ID']; ?>','<?php echo $r['crt_ID']; ?>','<?php echo $r2['p_qih']; ?>')" >+</button>
 </td>

 <td>
     <?php echo $r2['p_price']; ?>  
 </td>

 <td class="some" id="cc<?php echo $r2['p_ID']; ?>">
 <?php echo $r2['p_price']*$r['qty']; ?> 
 </td>

<td class="some" >
     <a href="remove4mcart.php?pid=<?php echo $r2['p_ID']; ?>&crtid=<?php echo $r['crt_ID']; ?>" type="button" class="glyphicon glyphicon-remove btn-danger"></a>
 </td>

</tr>
<!-- </div> -->

<?php

  }}

 
}
?>
<tr class="info" id='final'>
<td> </td>
  <td> </td>
  <!-- <td colspan="4">Total:</td> -->
  <td> </td>
  <td><strong> Total:</strong></td>
  <td id="total" style="font-weight: bold;"> </td>
  <td> </td>
   

</tr>
</table >
 <div id="fqty"></div> 
<!-- <button type="button" class="btn btn-primary btn-lg" ></button> -->

<?php
if($btn==1)
{
?>
<a class="btn btn-success btn-lg disabled" href="checkout.php">Cart is empty! Add products to the cart. </a>

<?php

}else
{
?> 


 

<a class="btn btn-success btn-lg " href="checkout.php">Proceed To Checkout <span class="glyphicon glyphicon-ok-sign"></span></a>
<?php
}

?>
 



</form>
    <!-- </div> -->
  <!-- </div> -->

  
 </div>
 
</div>
    
</body>
<script type="text/javascript">
      function DropDown(el) {
        this.dd = el;
        this.initEvents();
      }
      DropDown.prototype = {
        initEvents : function() {
          var obj = this;

          obj.dd.on('click', function(event){
            $(this).toggleClass('active');
            event.stopPropagation();
          }); 
        }
      }

      $(function() {

        var dd = new DropDown( $('#dd') );

        $(document).click(function() {
          // all dropdowns
          $('.wrapper-dropdown-2').removeClass('active');
        });

      });

    </script>
      <script type="text/javascript">

 

function plus(a,cid,qih){
 var x =document.getElementById(a).value;
x++;
if(x>=11)
{
alert ("Max Number of orders per type is 10.");

}else if(x>qih)
{
alert ("Only " + qih + " units left.");
}

else
{
  document.getElementById(a).value=x;
  document.getElementById("mbutton"+a).disabled=false;

incPrice(a,cid);
}

// qtty(a,pid);
}



function minus(a,cid){
 var x =document.getElementById(a).value;
x--;

if(x==0){
document.getElementById("mbutton"+a).disabled=true;
}else{
  document.getElementById("mbutton"+a).disabled=false;
 document.getElementById(a).value=x; 

}
// qtty(x,);
incPrice(a,cid);

}


function incPrice(a,cid){

 var x =document.getElementById(a).value;
var price=document.getElementById("sumtable").rows.namedItem("row"+a).cells.item(3).innerHTML;
var pname=document.getElementById("sumtable").rows.namedItem("row"+a).cells.item(1).innerHTML;
// 
// if(type==1){
 
// }else{
//   var newprice=price-(price/x);
// }
var newprice=price*x;

document.getElementById("sumtable").rows.namedItem("row"+a).cells.item(4).innerHTML=newprice;



sumup( x,cid,a,pname);

}



function sumup( x,cid,a,pname) {
  // 

 var t = [], cell, row = document.getElementById( 'sumtable' ).rows, i = row.length - 1, lastrow = row[i];
 while(i--) {
  cell = row[i].cells;
   j = cell.length;
  while(j--) 
  {
   if( !t[j] ) 
    { 
      t[j] = 0;
       }

  t[j] += parseFloat( cell[j].firstChild.nodeValue   ) || 0;
   
  }
 }
 j = t.length; 
 while(j--) {
  if( lastrow.cells[j] ) { 
if(j==4){
  lastrow.cells[j].firstChild.nodeValue = t[j];
}
    

     }
 }
 //o.disabled = true;
  
// setTimeout(function() {  alert('waited)'};, 3000);
// qtty(x,cid,a,pname );
// var tot=document.getElementById("sumtable").rows.namedItem("final").cells.item(4).innerHTML;
// test();

qtty(x,cid,a,pname);
// uptotal( );
}

function uptotal(  )
{
  //var x=document.getElementById(a).value;
var tot=document.getElementById("sumtable").rows.namedItem("final").cells.item(4).innerHTML;
 alert(tot);
  $.ajax({  //Make the Ajax Request
    type: "POST",  
    url: "updatetot.php",  //file name
    data: {  tot:tot },
    // data: "qty="+ a, //data
    success: function(server_response){  
   
   $("#fqty").ajaxComplete(function(event, request){ 

  if(server_response == '0')//if ajax_check_username.php return value "0"
  { 
  $("#fqty").html('som ting wong');

  //add this image to the span with id "availability_status"
  }  
  else  if(server_response == '1')//if it returns "1"
  {  
   $("#fqty").html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>  <strong>'+pname+' </strong> quantity updated To <strong>'+qty+' </strong></div>');
     // alert("updated");
  }  
   
   });
   } 
   
  }); 

}

function qtty(qty,cid,pid,pname )
{
  //var x=document.getElementById(a).value;

 
  $.ajax({  //Make the Ajax Request
    type: "POST",  
    url: "updateqty.php",  //file name
    data: { qty: qty, crtid: cid, pid: pid  },
    // data: "qty="+ a, //data
    success: function(server_response){  
   
   $("#fqty").ajaxComplete(function(event, request){ 

  if(server_response == '0')//if ajax_check_username.php return value "0"
  { 
  $("#fqty").html('som ting wong');

  //add this image to the span with id "availability_status"
  }  
  else  if(server_response == '1')//if it returns "1"
  {  
   $("#fqty").html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>  <strong>'+pname+' </strong> quantity updated To <strong>'+qty+' </strong></div>');
     // alert("updated");
  }  
   
   });
   } 
   
  }); 

}

</script>

<div id="footer"></div>
</html>