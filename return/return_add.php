<html>
  <head>
  	<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }

    window.close();
</script>

  </head>

	<body>
		<?php 

         include('database_connection.php');

         $sql = "INSERT INTO `shop`.`returns` (`re_id`, `or_id`,`reason`,`date`) VALUES (NULL, '$_POST[Or_ID]', '$_POST[reason]', SYSDATE() ); ";

		if (!mysqli_query($bd, $sql))
		  {
		  die('Error: ' . mysqli_error($bd));
		  }
		echo "record updated";

           $result11 = mysqli_query($bd,"SELECT * FROM `shop`.`returns` ORDER BY `re_id` DESC LIMIT 1;");
           $r11 = mysqli_fetch_array($result11);


           echo $r11['re_id'];


            $result10 = mysqli_query($bd,"SELECT * FROM `returntemp`");
            while($r10 = mysqli_fetch_array($result10)) {


                     $sql2 = "INSERT INTO `shop`.`returns_prod` (`p_id`, `re_id`,`r_qty`) VALUES ('$r10[P_ID]', '$r11[re_id]', '$r10[qty]'); ";

                      
						if (!mysqli_query($bd, $sql2))
						  {
						  die('Error: ' . mysqli_error($bd));
						  }
						echo "record updated 222";


                                                         }

		?>
	</body>
</html>