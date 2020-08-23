<?php
include_once("dbconn.php");
$id=$_POST['id'];

$sl=mysqli_query($connect,"select * from dealer where id='".$id."' ") or die(mysqli_error($connect));
$rs=mysqli_fetch_array($sl);
 


 echo $rs['email'];

 ?>