<?php 
include_once("dbconn.php");
$otp_error="";
$req=$_SESSION['email'];
$ph=mysqli_query($connect,"select * from dealer where email='".$req."'") or die(mysqli_error($connect));
$resph=mysqli_fetch_array($ph);
$phone=$resph['phone'];
$result = substr($phone, 0, 2);
$result .= "******";
$result .= substr($phone, 7, 4);

if(isset($_POST['s']))
{
	$s=$_POST['a'];
	
	$sql=mysqli_query($connect,"select * from otp where msg='".$s."'") or die(mysqli_error($connect));
	$count=mysqli_num_rows($sql);
	
	
	if(!empty($count==1))
	{	
          $rsql=mysqli_query($connect,"select * from otp where msg='".$s."' and expiry!=1 and now()<=DATE_ADD(created_at,INTERVAL 2 MINUTE)") or die(mysqli_error($connect));
	      
		  if(!empty($rsql))
		  {	  
	        $res=mysqli_query($connect,"update otp set expiry=1 where msg='".$s."'") or die(mysqli_query($connect));
		   header("location:resetpwd.php");
		   
		  }
		 else
		 {	
            $res=mysqli_query($connect,"update otp set expiry=1 where msg='".$s."'") or die(mysqli_query($connect));	 
       		$otp_error="3";  
		 }	
	}
	else
	{
		$otp_error="2";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AutomateEm</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="#"><b>AutomateEm</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">OTP is sent to <?php echo $result;?></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="logo.png" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" method="post" action="">
	        
      <div class="input-group">
	  
        <input type="text" class="form-control" placeholder="OTP" name="a" autocomplete="off">
         
        <div class="input-group-btn">
           
         <input type="submit" class="btn" value="submit" name="s">
		
		</div>
		
		
		
      </div>
	    	
    </form>
	
    <!-- /.lockscreen credentials -->

  </div>
   <div class="help-block text-center">
  <span class="error" style="color:red"><?php if(isset($_POST['s'])){ if($otp_error == "2"){ echo "Invalid Otp"; } elseif($otp_error=="3"){ echo "OTP session expired";}} ?></span>
  <!-- /.lockscreen-item -->
  </div>
 
  <div class="text-center">
    <a href="index.php">sign in as a different user</a>
  </div>
  
</div>
<!-- /.center -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dibootstrap.min.js"></script>
</body>
</html>
