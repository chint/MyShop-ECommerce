<html>
	<body>
		<?php 
include('database_connection.php');
       $sql = "DELETE FROM `shop`.`returntemp` WHERE `returntemp`.`P_ID` = '$_GET[pid]' ";
         
         if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "1 record deleted";

       header("location: re_insert.php?pid=2");

		?>
	</body>
</html>