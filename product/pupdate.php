<?php
$file_exts = array("jpg", "bmp", "jpeg", "gif", "png");
$rr=explode(".", $_FILES["file"]["name"]);
$upload_exts = end($rr);
    include('database_connection.php');
    $results = mysqli_query($bd, "SELECT `product`.* FROM `shop`.`product` WHERE `p_ID` =  '$_GET[p_id]' ");
    if ($row = mysqli_fetch_array($results)) {
      $itemp= $row['p_image'];
    }

     $result = mysqli_query($bd,"SELECT `p_ID` FROM `shop`.`product` ORDER BY p_ID DESC LIMIT 1;");
    while($r = mysqli_fetch_array($result)) {
      $id= $r['p_ID']+1;
      }

  
   $iname1=$_GET['p_id'];   


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
if (file_exists("../web/proimg/" .
$_FILES["file"]["name"]))
{
//echo "<div class='error'>"."(".$_FILES["file"]["name"].")".
//" already exists. "."</div>";
	unlink("../web/proimg/" .
$_FILES["file"]["name"]);
move_uploaded_file($_FILES["file"]["tmp_name"],
"../web/proimg/" . $_FILES["file"]["name"]);
echo "<div class='sucess'>"."Stored in: " .
"../web/proimg/" . $_FILES["file"]["name"]."</div>";
$iname= $_FILES["file"]["name"];

}
else
{
  unlink("../web/proimg/" . $itemp);

move_uploaded_file($_FILES["file"]["tmp_name"],
"../web/proimg/" . $_FILES["file"]["name"]);
echo "<div class='sucess'>"."Stored in: " .
"../web/proimg/" . $_FILES["file"]["name"]."</div>";
$iname= $_FILES["file"]["name"];


$oldname= "../web/proimg/" . $_FILES["file"]["name"];
$newname= "../web/proimg/" .$iname1 . ".jpg";
rename($oldname, $newname);
$iname= $iname1. ".jpg";



}
}
}
else
{
echo "<div class='error'>Invalid file</div>";
  //$iname=null;

      $iname= $itemp;
    
}
?>
<?php


include('database_connection.php');

echo $_GET['p_id'];
$id=$_GET['p_id'];
$sql = "UPDATE  `shop`.`product` SET
`B_ID` =  '$_POST[B_ID]',
`cat_ID` =  '$_POST[cat_ID]',
`p_name` =  '$_POST[p_name]',
`p_modelno` =  '$_POST[p_modelno]',
`p_price` =  '$_POST[p_price]',
`p_qih` =  '$_POST[p_qih]',
`p_reorderlvl` =  '$_POST[p_reorderlvl]',
`p_image` =  '$iname',
`p_desc` =  '$_POST[p_desc]'   WHERE  `product`.`p_ID` =$_GET[p_id];";

if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }
echo "record updated";

mysqli_close($bd);
header ("Location: attributeup.php?pid=$id ");
?>


