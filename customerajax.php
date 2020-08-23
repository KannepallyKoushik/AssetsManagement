<?php
include_once("dbconn.php");
 
 $id=$_POST['id'];
 
$deal = $_POST['deal'];

 
 $status="Available";

 
 $sql=mysqli_query($connect,"select * from dmacaddress where did='".$deal."' and  dproducttype='".$id."' and dstatus='".$status."' order by bbstatus asc") or die(mysqli_error($connect));
 ?>
 
 <select name="dsmac[]" id="sm" class="form-control">
 <?php
 $c=1;
 while($res=mysqli_fetch_array($sql))
 {
	 if($c==1)
	 {   
        
		 $upd = mysqli_query($connect,"update dmacaddress set bbstatus='2' where id='".$res['id']."'") or die(mysqli_error($connect));
		 $c++; 
	 }

 ?>
 <option value="<?php echo $res['daddress']; ?>,<?php  echo $res['sno'];?>"><?php echo $res['daddress']; ?></option>
 
 <?php } ?>
 </select>
 
