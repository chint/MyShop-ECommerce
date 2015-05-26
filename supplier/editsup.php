<html>
<head>

<script type="text/javascript" src="http://localhost/bootstrap/js/jquery-1.11.2.min.js"></script> 
<link rel="stylesheet" type="text/css" href="http://localhost/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="http://localhost/shop/admin/stylee1.css">


<?php
session_start();


$log=$_SESSION['suser'];

if ($log != 1 && $log != 2) { 
   header ("Location: index.php");
 
}elseif ($log == 1) {

?>
 <script>
            $(function(){
              $("#header").load("../admin/adminheader.php"); 
                        });
 </script>

<?php
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



  <script type="text/javascript">
  function validateForm()
{

var s_tel=document.forms["myForm"]["s_tel"].value;



  if(s_tel.length!==10)
  {
  alert("Please Enter valid Telephone number");
  // goto ["c_fname"];
  return false;

  }
  
}

</script>
</head>

<?php

  include('database_connection.php');
      $result = mysqli_query($bd,"SELECT * FROM `shop`.`supplier` WHERE sup_ID = '$_GET[sid]';");
    if($r = mysqli_fetch_array($result)) {
  
 ?>
<body>

<div id="header"></div>   
<table width="600" border="0" align="center"  >
<tr>
  <td bgcolor="#EFF0F1">

<form name="myForm" action="updatesupplier.php?sid=<?php echo $r['sup_ID']; ?>" method="post" onSubmit="return validateForm()" data-toggle="validator" role="form">

 <div class="col-md-12">
      <div class="form-group">

        <label class="control-label">Supplier ID: </label>

        <input name="sup_ID" type="text" id="sup_ID" value="<?php echo $r['sup_ID']; ?>" readonly="readonly"  class="form-control"/>

</div>


  <div class="form-group">  

    <label class="control-label">Supplier Name </label>
    <input type="text" name="sup_name" id="sup_name" class="form-control" value="<?php echo $r['sup_name']; ?>" placeholder="Enter Name" required/>

  </div>

  <div class="form-group">

    <label class="control-label">Supplier Company </label>
    <input type="text" name="sup_comp" id="sup_comp" class="form-control" value="<?php echo $r['sup_company']; ?>" placeholder="Enter Supplier Company" required/>
  </div>

  <div class="form-group">
    <label class="control-label">Supplier Telephone </label>
    <input type="number" min="100000000" max="999999999" name="sup_tel" id="sup_tel" class="form-control" value="<?php echo $r['sup_tp']; ?>" placeholder="Enter Telephone Number" oninvalid="setCustomValidity('Plz enter valid telephone number ')"
    onchange="try{setCustomValidity('')}catch(e){}"  required/>
    </div>

  <div class="form-group">
    <label class="control-label">Supplier Email </label>
    <input type="email"  name="sup_email" id="sup_email" class="form-control" value="<?php echo $r['sup_email']; ?>" placeholder="Enter Email Address" required/>
  </div>


<div class="form-group">
    <label class="control-label">Supplier Addres </label>
    <input name="sup_addr" id="sup_addr" class="form-control" data-require="" value="<?php echo $r['sup_addr']; ?>" placeholder="Enter Address" required/>
</div>


<div class="form-group">
    <label class="control-label">Supplier Description </label>
    <input  name="sup_des" id="sup_des" class="form-control" data-require="" value="<?php echo $r['sup_des']; ?>" placeholder="Enter Description" required />
</div>

<div class="form-group">
  <input name="submit" type="submit" id="submit" class="btn btn-primary" >
</div>

</form>



 
  <?php

  }
  ?>
 
  
  </body>
  <html>