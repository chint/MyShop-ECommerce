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

$sql = "UPDATE `shop`.`attribute` SET `a_name` = '$_POST[a_name]',  `a_desc` = '$_POST[a_desc]' WHERE `attribute`.`a_id` = $_GET[a_id];";

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "record updated";

mysqli_close($bd);
// if($suser == 1) {
// 	header("location: ../admin/adminatt.php");
// }else if($suser == 2) {
// 	header("location: ../mod/modatt.php");
// }
?>
