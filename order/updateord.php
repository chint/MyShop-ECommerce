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
include('database_connection.php');

$sql = "UPDATE `shop`.`order` SET `status` = '$_POST[cofirme]' WHERE `order`.`or_ID` = $_GET[or_ID];";

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "record updated";

mysqli_close($bd);
// if($suser == 1) {
// 	header("location: ../admin/adminord.php");
// }else if($suser == 2) {
// 	header("location: ../mod/modord.php");
// }

?>