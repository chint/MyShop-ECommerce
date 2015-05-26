
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
include('../database_connection.php');
 
// $sql = "INSERT INTO `shop`.`attribute` (`a_id`, `a_name`, `a_desc`) VALUES (null, '$_POST[a_name]', '$_POST[a_desc]');";


if(isset($_GET['edit'])){
	echo "not here";
	$id=mysql_real_escape_string($_GET['id']); 
echo "6666".$id;
// $sql = "UPDATE `shop`.`category` SET  `c_name` = '$_POST[c_name]', `c_desc` = '$_POST[c_desc]' WHERE `category`.`c_ID` = $_GET[c_ID];";
$sql = "UPDATE `shop`.`contact` SET   `contact`.`contact` = '$_POST[contact]' WHERE `contact`.`id` =   '$id';";

	 

}
	else{
		echo "here";
$sql = "INSERT INTO `shop`.`pay-methods` (`paym_ID`, `paym_name`, `paym_desc` ) VALUES (NULL, '$_POST[pay_name]', '$_POST[pay_desc]' )";

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