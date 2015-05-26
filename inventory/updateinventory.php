<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }

    window.close();
 </script>
 <?php
session_start();
include('database_connection.php');
$suser=$_SESSION['suser'];
$suname = $_SESSION['userrn'];


$aa=mysqli_query($bd,"SELECT * FROM `invtemp` ");
        $aare = mysqli_fetch_assoc($aa);

 
 $results = mysqli_query($bd, "SELECT * FROM `product_inv` WHERE `inv_id` =  '$aare[inv_ID]' ");
 while ($row = mysqli_fetch_array($results)) 
    {


          $sql7 = "UPDATE `product` SET `p_qih`=`p_qih`-'$row[p_pquantity]' WHERE `p_ID` = '$row[p_id]' ";
  
                             
                  if (!mysqli_query($bd, $sql7))
                     {
                        die('Error: ' . mysqli_error($bd));
                     }
                        echo "1 updateed";
      
      
    }


$aa1=mysqli_query($bd,"SELECT `inv_ID` FROM `inventory` WHERE `inv_ID` = '$aare[inv_ID]' ");
        $aare1 = mysqli_fetch_assoc($aa1);

$oldid=$aare1['inv_ID'];

$sql  = "DELETE FROM `shop`.`product_inv` WHERE `inv_id` = '$aare[inv_ID]' ";
$sql2 = "DELETE FROM `shop`.`inventory` WHERE `inv_ID` = '$aare[inv_ID]' ";
 

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "1 record deleted qq";

if (!mysqli_query($bd, $sql2))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "1 record deleted";




// $sql = "UPDATE `shop`.`inventory` SET `sup_ID` = '$_POST[s_id]', `u_ID` = '$_POST[u_id]', `p_add_date` = '$_POST[date]', `purchased_price` = '$_POST[p_price]', `purchased_unit_price` = '$_POST[u_price]' WHERE `inventory`.`inv_ID` = $_GET[inv_ID];";

// if (!mysqli_query($bd, $sql))
//   {
//   die('Error: ' . mysqli_error($bd));
//   }
// echo "record updated";


$sql=mysqli_query($bd,"SELECT * FROM `invtemp`");
 $sqlre = mysqli_fetch_assoc($sql);

 $sql1 = "INSERT INTO `inventory` (`inv_ID`, `sup_ID`, `su_name`, `p_add_date`, `total_price`, `total_pquantity`) VALUES
        ('$oldid', '$sqlre[sup_name]', '$suname', '$sqlre[p_add_date]', '$sqlre[total_price]','$sqlre[total_quantity]')" ; 
     
      if (!mysqli_query($bd, $sql1))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "1 record added";


$sql4=mysqli_query($bd,"SELECT `inv_ID` FROM `inventory` ORDER BY inv_ID DESC LIMIT 1 ");
 $sql4re = mysqli_fetch_assoc($sql4);


 $sql2 = mysqli_query($bd,"SELECT * FROM `invtemp2`");
    while($r = mysqli_fetch_array($sql2)) {

        $sql3="INSERT INTO `product_inv` (`inv_id`,`p_id`,`p_uprice`,`p_pquantity`) VALUES ('$sql4re[inv_ID]', '$r[p_id]', '$r[u_price]', '$r[quantity]')";
        
        if (!mysqli_query($bd, $sql3))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "1 record added";

$sql7 = "UPDATE `product` SET `p_qih`=`p_qih`+'$r[quantity]' WHERE `p_ID` = '$r[p_id]' ";
  
  if (!mysqli_query($bd, $sql7))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "1 updateed";


    }

mysqli_close($bd);
?>
