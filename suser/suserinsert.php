
<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }

    window.close();
</script>

<?php


include('database_connection.php');


$sql2 = "INSERT INTO `shop`.`suser`(`c_id`, `su_fname`, `su_lname`, `su_email`, `su_un`, `su_pw`, `su_type`) VALUES (null,'$_POST[su_fname]','$_POST[su_lname]','$_POST[su_email]','$_POST[su_un]','$_POST[su_pw]','$_POST[su_type]')";


if (!mysqli_query($bd, $sql2))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "1 record added";

mysqli_close($bd);

// header("Location: ../admin/adminsuser.php")

?>