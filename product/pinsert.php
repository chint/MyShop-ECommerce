

<?php

      include('database_connection.php');
      $result = mysqli_query($bd,"SELECT `p_ID` FROM `shop`.`product` ORDER BY p_ID DESC LIMIT 1;");
    while($r = mysqli_fetch_array($result)) {
      $id= $r['p_ID']+1;
      }

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
if (file_exists("../web/proimg/" .
$_FILES["file"]["name"]))
{
echo "<div class='error'>"."(".$_FILES["file"]["name"].")".
" already exists. "."</div>";
}
else
{
move_uploaded_file($_FILES["file"]["tmp_name"],
"../web/proimg/" . $_FILES["file"]["name"]);
echo "<div class='sucess'>"."Stored in: " .
"../web/proimg/" . $_FILES["file"]["name"]."</div>";
//$iname= $_FILES["file"]["name"];
$oldname= "../web/proimg/" . $_FILES["file"]["name"];
$newname= "../web/proimg/" .$id . ".jpg";
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

include('database_connection.php');

$sql = "INSERT INTO  `shop`.`product` (`p_ID` ,`cat_ID` ,`B_ID` ,`p_name` ,`p_modelno` ,`p_price` ,`p_qih` ,`p_reorderlvl` ,`p_image` ,`p_desc`)
VALUES (NULL ,  '$_POST[C_ID]',  '$_POST[B_ID]',  '$_POST[p_name]',  '$_POST[p_modelno]',  '$_POST[p_price]',  '$_POST[p_qih]',  '$_POST[p_reorderlvl]',  '$iname',  '$_POST[p_desc]');";

if (!mysqli_query($bd,$sql))
  {
  die('Error: ' . mysqli_error($bd));
  }

$pid=$_POST['p_ID'];


session_start();
$_SESSION['productid'] = $pid;
header("location: pattribute.php");
?>