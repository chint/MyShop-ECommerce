<html>
 <head>
  <script type="text/javascript" src="http://localhost/bootstrap/js/jquery-1.11.2.min.js"></script> 
  <link rel="stylesheet" type="text/css" href="http://localhost/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="stylee1.css">
 </head> 

<body>
  <table width="600" border="0" align="center" class="table table-condensed">
  	<tr>
  		<td width="500" bgcolor="#6699FF"> <label class="control-label">Today Overview</label> </td> <td width="100" bgcolor="#6699FF"></td>
  	</tr>
  	<tr><td><br></td></tr>
  	
  	<tr> <td bgcolor="#CEF3FF"><font size="2">Total Sale:</font></td> 
  	     <td bgcolor="#CEF3FF"> 
  	      <?php
  	           $tday = date("Y-m-d");

  	          $tot = 0;
  	          include('database_connection.php');
  	          $sql= mysqli_query($bd,"SELECT `pay_amount` FROM `payment` WHERE `pay_date` = '$tday' "); 
              while($sqlr = mysqli_fetch_array($sql)) {
                     $tot = $tot + $sqlr['pay_amount'];
             }
              // echo $tday;
              echo "<font size='2'> Rs.".$tot."</font>";
             
            ?>
  	     </td>  
  	</tr> 


    <tr><td><font size="2">Added Product Quantity:</font></td>  
        <td> 
         <?php
  	          // $year = date('Y');
  	          $tot = 0;
  	          include('database_connection.php');
  	          $sql= mysqli_query($bd,"SELECT `total_pquantity` FROM `inventory` WHERE `p_add_date` = '$tday' "); 
              while($sqlr = mysqli_fetch_array($sql)) {
                     $tot = $tot + $sqlr['total_pquantity'];
             }
              // echo $saler[0];
              echo "<font size='2'>".$tot."</font>";
             // echo date("Y-m-d");
            ?>
  	     </td>  

        </td> 
    </tr>
    <tr><td bgcolor="#CEF3FF"><font size="2">Total Oredres:</font> </td>  
        <td bgcolor="#CEF3FF">
        	<?php
  	          
  	          $sql= mysqli_query($bd,"SELECT COUNT(*) FROM `order` WHERE `or_date` = '$tday' "); 
              $sqlr=mysqli_fetch_array($sql);
              echo "<font size='2'>".$sqlr[0]."</font>";
            ?>
        </td>
    </tr>

    <tr><td>       <font size="2">No. of Customers Registered:</font>             </td>  <td></td> </tr> 

    <tr><td bgcolor="#CEF3FF"><font size="2">Orders Awaiting Approval:</font></td> 
        <td bgcolor="#CEF3FF">
              <?php
  	          
  	          $sql= mysqli_query($bd,"SELECT COUNT(*) FROM `order` WHERE `status` = 'notconfirmed' AND `or_date` = '$tday' "); 
              $sqlr=mysqli_fetch_array($sql);
              echo "<font size='2'>".$sqlr[0]."</font>";
            ?>
        	
        </td>
    </tr>

    <tr><td><font size="2">Returns : </font>  </td> 
        <td>
        <?php
  	          
  	          $sql= mysqli_query($bd,"SELECT COUNT(*) FROM `returns` WHERE `date` = '$tday' "); 
              $sqlr=mysqli_fetch_array($sql);
              echo "<font size='2'>".$sqlr[0]."</font>";
            ?>
        	
        </td> 
    </tr> 
    <!-- <tr><td bgcolor="#CEF3FF">       <font size="2"></font>             </td>  <td bgcolor="#CEF3FF"></td> </tr>  -->

           
  </table>
</body>
</html>