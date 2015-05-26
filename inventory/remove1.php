<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }

    window.close();
 </script>

 <?php

 session_start();
$_SESSION['remove1']=1;

include('database_connection.php');
       $sql = "DELETE FROM `shop`.`invtemp2` WHERE `invtemp2`.`p_id` = '$_GET[pid]' ";
         
         if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "1 record deleted";





 ?>