<?php
include_once("dbconn.php");
 $result = mysqli_query($connect,"SELECT * FROM cmacaddress "); 
 while($row = mysqli_fetch_array($result))
 {
 $focus=explode(",",$row['repairstatus']);
  if(in_array("1",$focus)) {
 ?>
<input type="checkbox" value=<?php echo $row['repairstatus'];  ?> checked="checked"  name="focus[]" />Cricket

<?php
}else{
?>
  <input type="checkbox" value=<?php echo $row['repairstatus'];  ?> name="focus[]" />Checkbox name
<?php
}
}
exit();




