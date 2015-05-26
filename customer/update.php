
<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }

    window.close();
</script>

<?php
// var_dump($_POST);
session_start();
$suser=$_SESSION['suser'];

include('database_connection.php');

echo $_GET['c_id'];
$sql = "UPDATE  `shop`.`cus` SET  `c_fname` =  '$_POST[c_fname]',
`c_mname` =  '$_POST[c_mname]',
`c_lname` =  '$_POST[c_lname]',
`c_dob` =  '$_POST[c_dob]',
`c_tp` =  '$_POST[c_tp]',
`c_shaddr1` =  '$_POST[c_shaddr1]',
`c_shaddr2` =  '$_POST[c_shaddr2]',
`c_shaddr3` =  '$_POST[c_shaddr3]',
`c_baddr1` =  '$_POST[c_baddr1]',
`c_baddr2` =  '$_POST[c_baddr2]',
`c_baddr3` =  '$_POST[c_baddr3]'
 WHERE  `cus`.c_id =$_GET[c_id];";

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "record updated";

mysqli_close($bd);

// if($suser == 1) {
// 	header("location: ../admin/adminaddcus.php");
// }else if($suser == 2) {
// 	header(" ");
// }
?>

