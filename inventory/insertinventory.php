<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }

    window.close();
 </script>

<?php

session_start();

$suname = $_SESSION['userrn'];

// include("a/conn.php");
include('database_connection.php');

// $sql="INSERT INTO cus (c_fname, c_mname, c_lname, c_dob,c_tp, c_shaddr1, c_shaddr2, c_shaddr3, c_baddr1, c_baddr2, c_baddr3, un, pw)
// VALUES
// ($_POST[c_fname],$_POST[c_mname],$_POST[c_lname],$_POST[c_dob],$_POST[c_tp],$_POST[c_shaddr1],$_POST[c_shaddr2],$_POST[c_shaddr3],$_POST[c_baddr1],$_POST[c_baddr2],$_POST[c_baddr3],$_POST[un],$_POST[pw])";
$sql=mysqli_query($bd,"SELECT * FROM `invtemp`");
 $sqlre = mysqli_fetch_assoc($sql);

 $sql1 = "INSERT INTO `inventory` (`inv_ID`, `sup_ID`,  `p_add_date`, `total_price`, `total_pquantity`) VALUES
        (NULL, '$sqlre[sup_name]',   '$sqlre[p_add_date]', '$sqlre[total_price]','$sqlre[total_quantity]')" ; 
     
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



// $sql = "INSERT INTO `shop`.`inventory` (`inv_ID`, `sup_ID`, `u_ID`, `p_add_date`, `purchased_price`, `purchased_unit_price`) VALUES (NULL, '$_POST[s_id]', '$_POST[u_id]', '$_POST[date]', '$_POST[p_price]', '$_POST[u_price]');";

// if (!mysqli_query($bd, $sql))
//   {
//   die('Error: ' . mysqli_error($bd));
//   }
// echo "1 record added";

mysqli_close($bd);
?>