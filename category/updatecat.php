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

if(($suser != 1)&&($suser != 2)) {

header ("Location: ../admin/index.php");
}


include('database_connection.php');

$sql = "UPDATE `shop`.`category` SET  `c_name` = '$_POST[c_name]', `c_desc` = '$_POST[c_desc]' WHERE `category`.`c_ID` = $_GET[c_ID];";

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "record updated";

mysqli_close($bd);

// if($suser == 1) {
// 	header("location: ../admin/admincat.php");
// }else if($suser == 2) {
// 	header("location: ../mod/modcat.php");
// }
?>