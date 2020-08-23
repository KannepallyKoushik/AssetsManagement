<?php
include_once("dbconn.php");
 
 $id=$_POST['id'];
 $status="Available";
 
 $sql=mysqli_query($connect,"select * from macaddress where producttype='".$id."' and status='".$status."' order by bstatus asc") or die(mysqli_error($connect));
 ?>
 
 <select name="dsmac[]" id="sm" class="form-control">
 <?php
 $c= 1;
 while($res=mysqli_fetch_array($sql))
 {
	 if($c==1)
	 {   
        
		 $upd = mysqli_query($connect,"update macaddress set bstatus='2' where ID='".$res['ID']."'") or die(mysqli_error($connect));
		 $c++; 
	 }
	 
 ?>
 <option value="<?php echo $res['address']; ?>,<?php echo $res['sno'];?>"><?php echo $res['address']; ?></option>
 
 <?php } ?>
 </select>
 
