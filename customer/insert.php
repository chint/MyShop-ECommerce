
<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }

    window.close();
</script>


<?php

session_start();
$suser=$_SESSION['suser'];
// include("a/conn.php");
include('database_connection.php');
// $sql="INSERT INTO cus (c_fname, c_mname, c_lname, c_dob,c_tp, c_shaddr1, c_shaddr2, c_shaddr3, c_baddr1, c_baddr2, c_baddr3, un, pw)
// VALUES
// ($_POST[c_fname],$_POST[c_mname],$_POST[c_lname],$_POST[c_dob],$_POST[c_tp],$_POST[c_shaddr1],$_POST[c_shaddr2],$_POST[c_shaddr3],$_POST[c_baddr1],$_POST[c_baddr2],$_POST[c_baddr3],$_POST[un],$_POST[pw])";

$sql = "INSERT INTO `shop`.`cus` (`c_fname`, `c_mname`, `c_lname`, `c_email`, `c_dob`, `c_tp`, `c_shaddr1`, `c_shaddr2`, `c_shaddr3`, `c_baddr1`, `c_baddr2`, `c_baddr3`, `un`, `pw`)
 VALUES ('$_POST[c_fname]','$_POST[c_mname]','$_POST[c_lname]','$_POST[c_email]','$_POST[c_dob]','$_POST[c_tp]','$_POST[c_shaddr1]','$_POST[c_shaddr2]','$_POST[c_shaddr3]','$_POST[c_baddr1]','$_POST[c_baddr2]','$_POST[c_baddr3]','$_POST[un]','$_POST[pw]')";

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "1 record added";

mysqli_close($bd);
// if($suser == 1) {
// 	header("location: ../admin/customer.php");
// }else if($suser == 2) {
// 	header("location: ../admin/customer.php");
// }
?>