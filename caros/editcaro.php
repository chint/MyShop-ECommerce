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
 <h1 style="font-size: 30">Carousel Items</h1>
<div class="row">
  <form name="myForm" action="savecaro.php" method="post"     role="form">
<table width="1350" border="1" align="center" class="table table-bordered " >
<tr>
  <td width="1120" height="142" bgcolor="#EFF0F1">

 
 <table id="sumtable" width="200" border="1" align="center" cellpadding="1" cellspacing="1" class="table table-bordered">
  <tr>
    <td class="bg-primary" width=200>  <label class="control-label">Slot ID </label></td>
  <td class="bg-primary"><label class="control-label">Product Name </label></td>
  <td class="bg-primary" ><label class="control-label">Status</label></td>
  
</tr>
<?php
 // session_start();


include('../database_connection.php');
// $sql = "SELECT   `product`.*   FROM  product ";

$sql1 = "SELECT   `product`.* , `caro`.* FROM caro,product WHERE (`product`.`p_ID` =`caro`.`pr`) order by `id`";
$result = mysqli_query($bd,$sql1);
 
  while($r = mysqli_fetch_array($result)) {

 ?>

<!-- <div class="form-group"> -->
<tr >
  <td>


    <label class="control-label"><?php echo $r['id']; ?></label>


</td>
<td>
<select id="<?php echo $r['id']; ?>" class="form-control" name="carr" onchange="qtty('<?php echo $r['id']; ?>')">
<?php
 // session_start();
include('../database_connection.php');
$sql2 = "SELECT   `product`.*   FROM  product ";
$result2 = mysqli_query($bd,$sql2 );
  while($r2 = mysqli_fetch_array($result2)) {

    if($r['p_ID']==$r2['p_ID'])
    {
?>
<option value="<?php echo $r2['p_ID']; ?>" selected="true"><?php echo $r2['p_name']; ?></option>

<?php
   
    }else{
 ?>


    <option value="<?php echo $r2['p_ID']; ?>"><?php echo $r2['p_name']; ?></option>
     
 
   <?php
 }
 } 
 ?>
</select>
 </td>
  
<td class="some" >
  <div id="<?php echo $r['id']; ?>x"> </div>  
     <!-- <a href="../category/catedit.php?cid=<?php echo $r['p_ID']; ?>" type="button" >Edit</a> -->
     <!-- <a href="../category/catdele.php?cid=<?php echo $r['c_ID']; ?>" type="button" class="glyphicon glyphicon-remove btn-danger"></a> -->
 </td>
 
</tr>
<!-- </div> -->

<?php
 } 
?>

<tr>
  <td></td>
  <td></td>
  <td>
 
    <a href="../web"  target="_blank"   >Preview</a>  
     <!-- <button class="btn btn-primary" name="name" value="value" type="submit">Save Changes <span class="glyphicon glyphicon-ok"></span></button> -->
  </td>
</tr>

 
</table >
</td>
</tr>
</table>

</form>

  </div>
  </body>  
</div>
 
  
 
  <script type="text/javascript">
 

function qtty(id)
{
  //var x=document.getElementById(a).value;id,pid
 // alert(id);
 var pid = document.getElementById(id).value;
 // alert(pid+"--"+id);
  $.ajax({  //Make the Ajax Request
    type: "POST",  
    url: "savecaro.php",  //file name
    data: { id:id, pid:pid  },
    // data: "qty="+ a, //data
    // alert("here");
    success: function(server_response){  
      // alert(server_response);
      // $("#fqty").html('som ting wong');

 if(server_response == '0')//if ajax_check_username.php return value "0"
  { 
    alert("This product is already set,Please select a different product");
  // $("#fqty").html('som ting wong');
// alert("error");
  //add this image to the span with id "availability_status"
  }  
  else  if(server_response == '1')//if it returns "1"
  {  
    // alert(id+"x");
   $("#"+id+"x").html(' <div class="alert alert-success  " role="alert" id="success-alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button> New product set.  </div>');
     
  }  


   } 
   
  }); 

}


$(document).ready (function(){
            $("#success-alert").hide();
            $("#myWish").click(function showAlert() {
                $("#success-alert").alert();
                $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
               $("#success-alert").alert('close');
                });   
            });
 });
</script>

</body>
  </html>




