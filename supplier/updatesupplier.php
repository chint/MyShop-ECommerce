<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }

    window.close();
</script>

<?php


include('database_connection.php');

$sql = "UPDATE `shop`.`supplier` SET `sup_name` = '$_POST[sup_name]', `sup_company` = '$_POST[sup_comp]', `sup_tp` = '$_POST[sup_tel]', `sup_email` = '$_POST[sup_email]', `sup_addr` = '$_POST[sup_addr]', `sup_des` = '$_POST[sup_des]' WHERE `supplier`.`sup_ID` = $_GET[sid];";

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "record updated";

mysqli_close($bd);
?>
