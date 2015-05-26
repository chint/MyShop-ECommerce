
<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }

    window.close();
</script>


<?php
var_dump($_POST);
// include("a/conn.php");
include('database_connection.php');
 
// $sql = "INSERT INTO `shop`.`attribute` (`a_id`, `a_name`, `a_desc`) VALUES (null, '$_POST[a_name]', '$_POST[a_desc]');";


if(isset($_GET['edit'])){
	echo "not here";
	$id=mysql_real_escape_string($_GET['shipm_ID']); 

// $sql = "UPDATE `shop`.`category` SET  `c_name` = '$_POST[c_name]', `c_desc` = '$_POST[c_desc]' WHERE `category`.`c_ID` = $_GET[c_ID];";
$sql = "UPDATE `shop`.`shipmethod` SET  `shipm_name` = '$_POST[sh_name]', `shipm_desc` = '$_POST[sh_desc]' WHERE `shipmethod`.`shipm_ID` = $_GET[shipm_ID];";

	 

}
	else{
		echo "here";
$sql = "INSERT INTO `shop`.`shipmethod` (`shipm_ID`, `shipm_name`, `shipm_desc`, `shipm_cost`) VALUES (NULL, '$_POST[sh_name]', '$_POST[sh_desc]', '$_POST[sh_cost]')";

	}



if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "1 record added";

mysqli_close($bd);
// header("location: shipmethods.php");
// session_start();

// $log=$_SESSION['frmpattribute'];
// $log2=$_SESSION['frmpedit'];
// $epid=$_SESSION['epid'];
// $suser=$_SESSION['suser'];

// if ($log == 1) {
//  $_SESSION['frmpattribute']=0;
// header ("Location: ../product/pattribute.php");
// }else if ($log2 == 1){
// $_SESSION['frmpedit']=0;
// 	header ("Location: ../product/attributeup.php?pid=$epid");}
// } else if($suser == 1) {
// 	header("location: ../admin/adminatt.php");
// }else if($suser == 2) {
// 	header("location: ../mod/modatt.php");

// }
?>