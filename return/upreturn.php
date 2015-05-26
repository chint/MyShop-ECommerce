<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }

    window.close();
</script>
<?php 
session_start();


$log=$_SESSION['suser'];
$reid=$_SESSION['re_id'];

include('database_connection.php');

       $sql = "DELETE FROM `returns_prod` WHERE `re_id` = '$reid' ";
         
         if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "1 record deleted";


$result4 = mysqli_query($bd,"SELECT * FROM `returnstemp2`");
    while($r4 = mysqli_fetch_array($result4)){
   
 $sql = "INSERT INTO `returns_prod` (`re_id`, `p_id`,`r_qty`) VALUES ('$r4[re_id]', '$r4[p_id]', '$r4[qty]' ) ";

		if (!mysqli_query($bd, $sql))
		  {
		  die('Error: ' . mysqli_error($bd));
		  }

}
$_SESSION['re_id']='lol';
       // header("location: ../admin/return.php");

		?>