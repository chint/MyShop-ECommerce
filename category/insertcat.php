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


$sql = "INSERT INTO `shop`.`category` (`c_name`, `c_desc`)
 VALUES ('$_POST[c_name]','$_POST[c_desc]')";

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "1 record added";

mysqli_close($bd);



$log=$_SESSION['frmaddp'];
$log2=$_SESSION['frmpedit']; 
$log3=$_SESSION['admp'];
$epid=$_SESSION['epid'];


if ($log3==1) {
	$_SESSION['admp']=0;
}
else if ($log == 1) {
$_SESSION['frmaddp']=0;
header ("Location: ../product/addp.php");
}else if ($log2 == 1){
	$_SESSION['frmpedit']=0;
	header ("Location: ../product/pedit.php?pid=$epid ");}
// }else if($suser == 1) {
// 	header("location: ../admin/categories.php");
// }else if($suser == 2) {
// 	header("location: ../admin/categories.php");
// }
 

?>