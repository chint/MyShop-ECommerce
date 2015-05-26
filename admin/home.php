<html>
 <head>
 <script type="text/javascript" src="http://localhost/bootstrap/js/jquery-1.7.2.min.js"></script> 

 
       <?php
session_start();


$log=$_SESSION['suser'];

if ($log != 1 && $log != 2) { 
   header ("Location: index.php");
 
}elseif ($log == 1) {

?>
 <script>
            $(function(){
              $("#header").load("adminheader1.php"); 
                        });
 </script>

<?php
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

<table width="1250"  align="center" class="table table-bordered">
 <tr>
  <td width="600" bgcolor="#EFF0F2"> <img src="dashboard/home.png" /> <label class="control-label">Dashboard</label> </td>
 </tr>
 <tr>

<td bgcolor="#EFF0F1">
  <table width="1200" border="0" align="center" class="table">
  	<tr>
  		<td width="600" ><iframe src="dashboard/overview.php" width="600" height="300" style="border:none"></iframe></td>
  		<td width="600" ><iframe src="dashboard/todayoverview.php" width="600" height="300" style="border:none"></iframe></td>
  	</tr>
  </table>


  <table width="1200" border="0" align="center" class="table ">
    <tr>
      <td bgcolor="#6699FF"> <label class="control-label">Last 10 Orders</label> </td> 
    </tr>
    <tr>
      <td><iframe src="dashboard/last10orders.php" width="1280" height="430" style="border:none"></iframe></td>
    </tr>
  </table>    
</td>
 </tr>
</table> 


</body>
</html>