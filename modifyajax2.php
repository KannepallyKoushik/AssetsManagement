<?php
include_once("db.php");
$id=$_POST['id'];

$sl=mysqli_query($conn,"select * from setreminder where id='".$id."'") or die(mysqli_error($connect));
$rs=mysqli_fetch_array($sl);
 


echo $rs['description'].",".$rs['email'].",".$rs['phno'].",".$rs['smsno'].",".$rs['remind'].",".$rs['id'];

 ?>