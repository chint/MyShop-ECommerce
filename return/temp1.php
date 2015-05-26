<!-- <a onClick="popitup('../return/returnedit.php?re_id=<?php echo $r['re_id']; ?>')" type="button" > Edit</a> -->

<?php
session_start();

$_SESSION['re_id']=$_GET['re_id'];


include('database_connection.php');

 $sql = "TRUNCATE `returnstemp2`";
         
         if (!mysqli_query($bd, $sql))
  {
  die('Error: ' . mysqli_error($bd));
  }

$result = mysqli_query($bd,"SELECT * FROM `returns_prod` WHERE `re_id` = '$_GET[re_id]'");
    while($r = mysqli_fetch_array($result)){

$sqltemp = "INSERT INTO `returnstemp2` (`re_id`, `p_id`, `qty`) VALUES ('$r[re_id]', '$r[p_id]', '$r[r_qty]')";


if (!mysqli_query($bd, $sqltemp))
  {
  die('Error: ' . mysqli_error($bd));
  }
  echo "1 record added";
}
 header("location:returnedit.php");
?>