<html>
<body>
	<?php  

if (!empty($_GET['p_id'])){


          echo $_POST['qty'];
          echo "<br>";
          echo $_GET['p_id'];

     include('database_connection.php');
     $sql = "INSERT INTO `shop`.`returntemp` (`P_ID`, `qty`) VALUES ('$_GET[p_id]', '$_POST[qty]') ON DUPLICATE KEY UPDATE `qty`='$_POST[qty]';";


if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "1 record added";

mysqli_close($bd);
	
   }
	?>
</body>
</html>