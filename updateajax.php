<?php
include_once("dbconn.php");
 
 $id=$_POST['id'];
 $ft=mysqli_query($connect,"select * from cmacaddress where caddress='".$id."'")  or die(mysqli_error($connect));
 $rft=mysqli_fetch_array($ft);
 $sno = $rft['sno'];
 $key=$rft['cproducttype'];
 
 $sql= mysqli_query($connect,"select * from macaddress where status='Available' and producttype='".$key."'") or die(mysqli_error($connect));
?>
<select name="nmac" id="sm" class="form-control">

<?php
while($res=mysqli_fetch_array($sql))
	
	{
?>
<option value="<?php echo $res['address']; ?>,<?php  echo $res['sno'];?>"><?php echo $res['address'];?></option>
	<?php } ?>
</select>