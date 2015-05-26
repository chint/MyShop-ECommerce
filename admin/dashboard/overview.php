<html>
 <head>
  <script type="text/javascript" src="http://localhost/bootstrap/js/jquery-1.11.2.min.js"></script> 
  <link rel="stylesheet" type="text/css" href="http://localhost/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="stylee1.css">
 </head> 

<body>
  <table width="600" border="0" align="center" class="table table-condensed" >
  	<tr>
  		<td width="500" bgcolor="#6699FF"> <label class="control-label">Total Overview</label> </td> <td width="100" bgcolor="#6699FF"></td>
  	</tr>
  	<tr><td><br></td></tr>
  	
  	<tr> <td bgcolor="#CEF3FF"><font size="2">Total Sale:</font></td> 
  	     <td bgcolor="#CEF3FF"> 
  	      <?php
  	          // $year = date('Y');
  	          $tot = 0;
  	          include('database_connection.php');
  	          $sale= mysqli_query($bd,"SELECT `pay_amount` FROM `payment` "); 
              while($saler = mysqli_fetch_array($sale)) {
                     $tot = $tot + $saler['pay_amount'];
             }
              // echo $saler[0];
              echo "<font size='2'> Rs.".$tot."</font>";
            ?>
         </td> 
    </tr> 


    <tr> <td> <font size="2">Total Sale This Year:</font> </td>
         <td> 
         <?php
             // $year = date('Y');
             // $saleyear = mysqli_query($bd,"SELECT COUNT(*) FROM `order` WHERE `or_date` like '$year%'  ") ;
             // $saleyearr = mysqli_fetch_array($saleyear);
             // echo $saleyearr[0];


  	          $year = date('Y');
  	          $yeartot = 0;
  	          
  	          $sale= mysqli_query($bd,"SELECT `pay_amount` FROM `payment` WHERE `pay_date` LIKE '$year%' "); 
              while($saler = mysqli_fetch_array($sale)) {
                     $yeartot = $yeartot + $saler['pay_amount'];
             }
              // echo $saler[0];
              echo "<font size='2'> Rs.".$yeartot."</font>";
       
             
          ?> 
          </td>
    </tr>


    <tr> <td bgcolor="#CEF3FF"> <font size="2">Total Oredres:</font> </td> 
         <td bgcolor="#CEF3FF">
         	<?php
  	          
  	          $sale= mysqli_query($bd,"SELECT COUNT(*) FROM `order` "); 
              $saler=mysqli_fetch_array($sale);
              echo "<font size='2'>".$saler[0]."</font>";
            ?>
         </td>
    </tr>


    <tr><td> <font size="2">Orders Awaiting Approval:</font>  </td>
        <td>
           <?php
  	          
  	          $sql= mysqli_query($bd,"SELECT COUNT(*) FROM `order` WHERE `status` = 'notconfirmed' "); 
              $sqlr=mysqli_fetch_array($sql);
              echo "<font size='2'>".$sqlr[0]."</font>";
            ?>
        	

        </td>
    </tr> 



    <tr><td bgcolor="#CEF3FF">  <font size="2">No. of Customers:</font> </td> 
        <td bgcolor="#CEF3FF">

           <?php
  	          
  	          $sql= mysqli_query($bd,"SELECT COUNT(*) FROM `cus`  "); 
              $sqlr=mysqli_fetch_array($sql);
              echo "<font size='2'>".$sqlr[0]."</font>";
            ?>
 	
        </td> 
    </tr>

    <tr><td> <font size="2">Products Out of Stock:</font> </td> 
        <td>
            <?php
  	          
  	          $sql= mysqli_query($bd,"SELECT COUNT(*) FROM `product` WHERE `p_qih` = '0'  "); 
              $sqlr=mysqli_fetch_array($sql);
              echo "<font size='2'>".$sqlr[0]."</font>";
            ?>
        	
        </td> 
    </tr> 

    <tr><td bgcolor="#CEF3FF">  <font size="2">No. of Suppliers:</font> </td> 
        <td bgcolor="#CEF3FF">
        	<?php
  	          
  	          $sql= mysqli_query($bd,"SELECT COUNT(*) FROM `supplier` "); 
              $sqlr=mysqli_fetch_array($sql);
              echo "<font size='2'>".$sqlr[0]."</font>";
            ?>

        </td> 
    </tr> 

           
  </table>
</body>
</html>