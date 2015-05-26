<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }

    window.close();
</script>



<?php

include('database_connection.php');

$sql = "INSERT INTO `shop`.`supplier` (`sup_ID`, `sup_name`, `sup_company`, `sup_tp`, `sup_email`, `sup_addr`, `sup_des`) VALUES (NULL, '$_POST[sup_name]', '$_POST[sup_comp]', '$_POST[sup_tel]', '$_POST[sup_email]', '$_POST[sup_addr]', '$_POST[sup_des]');";

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "1 record added";

mysqli_close($bd);
?>