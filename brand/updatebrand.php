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

include('database_connection.php');
    $results = mysqli_query($bd, "SELECT `brand`.* FROM `shop`.`brand` WHERE `b_ID` =  '$_GET[b_ID]' ");
    if ($row = mysqli_fetch_array($results)) {
      $itemp= $row['b_logo'];
    }




if($_FILES["file"]["name"] == ""){
   
      $iname= $itemp;
    
}
else if ((($_FILES["file"]["type"] == "image/gif")
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
$iname= $itemp;
}
else
{
	
unlink("../web/logo/" . $itemp);	

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

session_start();
$suser=$_SESSION['suser'];
include('database_connection.php');

$sql = "UPDATE `shop`.`brand` SET `b_name` = '$_POST[b_name]', `b_logo` = '$iname', `b_des` = '$_POST[b_des]' WHERE `brand`.`b_ID` = $_GET[b_ID];";

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "record updated";

mysqli_close($bd);
// if($suser == 1) {
// 	header("location: ../admin/adminbra.php");
// }else if($suser == 2) {
// 	header("location: ../mod/modbra.php");
// }

?>
