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
<body>
<?php 
session_start();
if( !empty($_SESSION['logins']))
{
header('Location:../web');
} 

 ?>
 <div class="row">
 <table class="table table-bordered ">


<tr>
  <td  class="col-md-2">
    <img  class="img-thumbnail"  alt="Responsive image" src="web/images/ban.png" />
  </td>
 <td class="col-md-10">
 <div class="alert alert-danger" role="alert"> Your account has been banned. <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></div>
 <div class="alert alert-info" role="alert">You can request a ban lift from <a href="contact.php"> <strong>Contacting Us </strong></a> </div>
   
 
  </td>
   
</tr>
</table>
 
  
</div>

</body>
</div>
<div id="footer"></div>
</html>

