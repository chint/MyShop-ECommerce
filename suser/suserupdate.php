
<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }

    window.close();
</script>

<?php


include('database_connection.php');

$sql = "UPDATE `shop`.`suser` SET  `su_fname`='$_POST[su_fname]',`su_lname`='$_POST[su_lname]',`su_email`='$_POST[su_email]',`su_un`='$_POST[su_un]',`su_pw`='$_POST[su_pw]',`su_type`='$_POST[su_type]' WHERE `suser`.`c_id` = $_GET[cid];";

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "record updated";

mysqli_close($bd);
// header("location: ../admin/adminsuser.php"); 
?>
