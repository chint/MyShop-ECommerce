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
    $("#caro").load("http://localhost/shop/web/dfs.html"); 
    $("#pag").load("http://localhost/shop/product/pag.php"); 
    $("#cat").load("http://localhost/shop/product/cat.php"); 
  });
        </script>
        <style type="text/css">
#submit {
  font-family: Arial, Helvetica, sans-serif;
  font-weight: bold;
  color: #006;
  
}
.must {
  color: #F00;
}
.ggg {
  font-family: Tahoma, Geneva, sans-serif;
  font-size: 16px;
}
</style>
<link href="http://localhost/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript">
$(document).ready(function()//When the dom is ready 
{

$("#c_email").change(function() 
{
 var c_email = $("#c_email").val();//Get the value in the username textbox
if(c_email.length > 0)//if the lenght greater than 3 characters
{
$("#availability_status2").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking availability...');
//Add a loading image in the span id="availability_status"

$.ajax({  //Make the Ajax Request
    type: "POST",  
    url: "ajax_check_email.php",  //file name
    data: "c_email="+ c_email, //data
    success: function(server_response){  
  
   $("#availability_status2").ajaxComplete(function(event, request){ 
 
  if(server_response == '0')//if ajax_check_username.php return value "0" <font color="Green"> Available </font>
  { 
     
  $("#availability_status2").html('<img src="available.png" align="absmiddle">  ');
  document.getElementById("submit").disabled = false;
  //add this image to the span with id "availability_status"
  }  
  else  if(server_response == '1')//if it returns "1"
  {  
   $("#availability_status2").html('<img src="not_available.png" align="absmiddle"> <font color="red">This Email is already in use .Enter a different email or login</font>');
   document.getElementById("submit").disabled = true;
  }  
   
   });
   } 
   
  }); 

}
else
{

$("#availability_status2").html('<font color="#cc0000">Username too short</font>');
//if in case the username is less than or equal 3 characters only 

}



return false;
 
 }); 

$("#un").change(function() 
{ //if theres a change in the username textbox

var un = $("#un").val();//Get the value in the username textbox
if(un.length > 0)//if the lenght greater than 3 characters
{
$("#availability_status").html('<img src="loader.gif" align="absmiddle">&nbsp;Checking availability...');
//Add a loading image in the span id="availability_status"

$.ajax({  //Make the Ajax Request
    type: "POST",  
    url: "ajax_check_username.php",  //file name
    data: "un="+ un, //data
    success: function(server_response){  
   
   $("#availability_status").ajaxComplete(function(event, request){ 

  if(server_response == '0')//if ajax_check_username.php return value "0"
  { 
  $("#availability_status").html('<img src="available.png" align="absmiddle"> <font color="Green"> Available </font>  ');
  document.getElementById("submit").disabled = false;
  //add this image to the span with id "availability_status"
  }  
  else  if(server_response == '1')//if it returns "1"
  {  
   $("#availability_status").html('<img src="not_available.png" align="absmiddle"> <font color="red">Not Available </font>');
   document.getElementById("submit").disabled = true;
  }  
   
   });
   } 
   
  }); 

}
else
{

$("#availability_status").html('<font color="#cc0000">Username too short</font>');
//if in case the username is less than or equal 3 characters only 

}



return false;
});

});
</script>
  <div id="header"></div>	  
   <div class="wrap">

<body>

<div class="row">
<div class="col-md-7">
      <div class="well">
<form name="myForm" action="insert.php" method="post" onsubmit="return validateForm()" data-toggle="validator" role="form">

<div class="form-group">
    <label class="control-label">First Name </label>
    <input type="text" name="c_fname" id="c_fname" class="form-control"  placeholder="Enter First Name" required/>
</div>


<div class="form-group">
    <label class="control-label">Middle Name </label>
    <input type="text" name="c_mname" id="c_mname" class="form-control"  placeholder="Enter Middle Name" />
</div>

<div class="form-group">
    <label class="control-label">Last Name </label>
    <input type="text" name="c_lname" id="c_lname" class="form-control"  placeholder="Enter Last Name" required/>
</div>

<div class="form-group">
    <label class="control-label">E-mail</label>
    <input type="email" name="c_email" id="c_email" class="form-control"  placeholder="Enter E mail" required/><span id="availability_status2"></span>
     
</div>

<div class="form-group">
    <label class="control-label">Date of Birth</label>
    <input type="date" name="c_dob" id="c_dob" class="form-control"  placeholder="Enter Date of Birth" required/>
</div>
 
 <div class="form-group">
    <label class="control-label">Telephone No.</label>
    <input type="number" min="100000000" max="999999999" name="c_tp" id="c_tp" class="form-control" placeholder="Enter Telephone Number" oninvalid="setCustomValidity('Plz enter valid telephone number ')"
    onchange="try{setCustomValidity('')}catch(e){}" required/>
</div>
  
 
 <div class="form-group">
    <label class="control-label">Shipping Address</label>
    <input type="text" name="c_shaddr1" id="c_shaddr1" class="form-control"  placeholder="Address Line 1" required/></div>
   <div class="form-group">   <input type="text" name="c_shaddr2" id="c_shaddr2" class="form-control"  placeholder="Address Line 2" /> </div> 
    <div class="form-group">  <input type="text" name="c_shaddr3" id="c_shaddr3" class="form-control"  placeholder="Address Line 3" />  
</div>


<div class="form-group">
    <label class="control-label">Billing Address</label>
    <input type="text" name="c_baddr1" id="c_baddr1" class="form-control"  placeholder="Address Line 1" required/></div>
   <div class="form-group"> <input type="text" name="c_baddr2" id="c_baddr2" class="form-control"  placeholder="Address Line 2" /></div>
   <div class="form-group"> <input type="text" name="c_baddr3" id="c_baddr3" class="form-control"  placeholder="Address Line 3" />
</div>
 
<div class="form-group">
    <label class="control-label">User Name </label>
    <input type="text" name="un" id="un" class="form-control"  placeholder="Enter A user Name" required/>
    <span id="availability_status"></span>
</div>

<div class="form-group">
    <label class="control-label">Password</label>
    <input type="password" name="pw" id="pw" class="form-control"  placeholder="Enter A Password" onchange="form.pw2.pattern = this.value;" required/></div>
   <div class="form-group">  <input type="password" name="pw2" id="pw2" class="form-control"  placeholder="Enter A Password" required/>
</div>

  
<div class="form-group">
  <input name="submit" type="submit" id="submit" class="btn btn-primary" disabled="true">
</div>

</form>
</div>
</div>
</div>
 </body>


 </div>

<div id="footer"></div>
</html>

