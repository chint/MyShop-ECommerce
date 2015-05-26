<html>
 <head>
  <script type="text/javascript" src="http://localhost/bootstrap/js/jquery-1.11.2.min.js"></script> 
  <link rel="stylesheet" type="text/css" href="http://localhost/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="stylee1.css">
 </head> 

<body>
  <table width="1280" height="400" border="0" align="center" class="table table-hover " >
  	<tr><td bgcolor="#D6D6C2"><font size='2'>Order ID</font></td><td bgcolor="#D6D6C2"><font size='2'>Customer</font></td><td bgcolor="#D6D6C2"><font size='2'>Status</font></td><td bgcolor="#D6D6C2"><font size='2'>Date</font></td><td bgcolor="#D6D6C2"><font size='2'>Total</font></td>
  	</tr>
    <?php
       include('database_connection.php');
       $sql= mysqli_query($bd,"SELECT * FROM `order` ORDER BY `or_ID` DESC LIMIT 10 "); 
              while($sqlr = mysqli_fetch_array($sql)) {
    ?>
    <tr>
    	<td> <?php echo  "<font size='2'>".$sqlr['or_ID']."</font>";  ?> </td>

    	<td> <?php 
          $sql1=mysqli_query($bd,"SELECT `c_fname` FROM `cus` WHERE `c_id` = '$sqlr[c_ID]' ");
             $sql1r = mysqli_fetch_assoc($sql1);

    	echo  "<font size='2'>".$sql1r['c_fname']."</font>";  ?></td>

    	<td> <?php echo  "<font size='2'>".$sqlr['status']."</font>";  ?></td>
    	<td> <?php echo  "<font size='2'>".$sqlr['or_date']."</font>";  ?></td>

    	<td> <?php 
           $sql2=mysqli_query($bd,"SELECT `pay_amount` FROM `payment` WHERE `pay_ID` = '$sqlr[pay_ID]' ");
            $sql2r=mysqli_fetch_assoc($sql2);

    	echo  "<font size='2'>".$sql2r['pay_amount']."</font>";  ?></td>
    </tr>


<?php  } ?>
  	</table>
 </body>
 </html> 	