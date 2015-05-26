<script>
    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }

    window.close();
</script>

<?php

$id="$_POST[b_name]";

$file_exts = array("jpg", "bmp", "jpeg", "gif", "png");
$rr=explode(".", $_FILES["file"]["name"]);
$upload_exts = end($rr);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 2000000)
&& in_array($upload_exts, $file_exts))
{
if ($_FILES["file"]["error"] > 0)
{
echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
}
else
{
echo "Upload: " . $_FILES["file"]["name"] . "<br>";
echo "Type: " . $_FILES["file"]["type"] . "<br>";
echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
// Enter your path to upload file here
if (file_exists("../web/logo/" .
$_FILES["file"]["name"]))
{
echo "<div class='error'>"."(".$_FILES["file"]["name"].")".
" already exists. "."</div>";
}
else
{
move_uploaded_file($_FILES["file"]["tmp_name"],
"../web/logo/" . $_FILES["file"]["name"]);
echo "<div class='sucess'>"."Stored in: " .
"../web/logo/" . $_FILES["file"]["name"]."</div>";
//$iname= $_FILES["file"]["name"];
$oldname= "../web/logo/" . $_FILES["file"]["name"];
$newname= "../web/logo/" .$id . ".jpg";
rename($oldname, $newname);
$iname= $id. ".jpg";
}
}
}
else
{
echo "<div class='error'>Invalid file</div>";
$iname=null;
}
?>




<?php

// include("a/conn.php");
include('database_connection.php');
// $sql="INSERT INTO cus (c_fname, c_mname, c_lname, c_dob,c_tp, c_shaddr1, c_shaddr2, c_shaddr3, c_baddr1, c_baddr2, c_baddr3, un, pw)
// VALUES
// ($_POST[c_fname],$_POST[c_mname],$_POST[c_lname],$_POST[c_dob],$_POST[c_tp],$_POST[c_shaddr1],$_POST[c_shaddr2],$_POST[c_shaddr3],$_POST[c_baddr1],$_POST[c_baddr2],$_POST[c_baddr3],$_POST[un],$_POST[pw])";

$sql = "INSERT INTO `shop`.`brand` (`b_ID`, `b_name`, `b_logo`,`b_des`) VALUES (null, '$_POST[b_name]', '$iname','$_POST[b_des]');";

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "1 record added";

mysqli_close($bd);
session_start();


$log=$_SESSION['frmaddp'];
$log2=$_SESSION['frmpedit'];
$log3=$_SESSION['admp'];
$epid=$_SESSION['epid'];
$suser=$_SESSION['suser'];

if ($log3==1) {
	$_SESSION['admp']=0;
} else if ($log == 1) {
$_SESSION['frmaddp']=0;
header ("Location: ../product/addp.php");
}else if ($log2 == 1){
	$_SESSION['frmpedit']=0;
	header ("Location: ../product/pedit.php?pid=$epid ");}
// }else if($suser == 1) {
// 	header("location: ../admin/adminbra.php");
// }else if($suser == 2) {
// 	header("location: ../mod/modbra.php"); }


?>