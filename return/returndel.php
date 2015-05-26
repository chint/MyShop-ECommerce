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

$a=$_GET['re_id'];

$sql = "DELETE FROM `shop`.`returns_prod` WHERE `returns_prod`.`re_id` = '$a'";

$sql2 = "DELETE FROM `shop`.`returns` WHERE `returns`.`re_id` = '$a'";

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "1";

if (!mysqli_query($bd, $sql2))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "2";

 
mysqli_close($bd);
// if($suser == 1) {
// 	header("location: ../admin/categories.php");
// }else if($suser == 2) {
// 	header("location: ../admin/categories.php");
// }
?>