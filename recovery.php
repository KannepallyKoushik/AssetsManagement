<?php 
include_once("dbconn.php");
$mail_error="";
if(isset($_POST['s']))
{
	$s=$_POST['a'];
	
	$sql=mysqli_query($connect,"select * from dealer where email='".$s."'") or die(mysqli_error($connect));
	$rsql=mysqli_fetch_array($sql);
	
	$count=mysqli_num_rows($sql);
	if($count==1)
	{
		$otp=rand(100000,999999);
		
		$insert=mysqli_query($connect,"insert into otp(did,msg,created_at,expiry) values('".$rsql['id']."','$otp',now(),0) ") or die(mysqli_error($connect));
        SESSION_START();
		$_SESSION['email']=$s;
        
		
		
		
$ph=mysqli_query($connect,"select * from dealer where email='".$s."'") or die(mysqli_error($connect));
$resph=mysqli_fetch_array($ph);
$number=$resph['phone'];
$text="Please use this otp ".$otp;

$url="www.way2sms.com/api/v1/sendCampaign";
$message = urlencode($text);
$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, 1);// set post data to true
curl_setopt($curl, CURLOPT_POSTFIELDS, "apikey=TXYKM2W0SWL3BPD22DCBM95SB8LXMSDX&secret=AVRY0BR0KL8TTCAS&usetype=stage&phone=$number&senderid=koushik.koushik.kumar@gmail.com&message=$message");// post data
// query parameter values must be given without squarebrackets.
 // Optional Authentication:
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);
	
		header("location:otp.php");
	}
	else
	{
		$mail_error="2";
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
    <a href="index.php"><b>AutomateEm</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">Welcome</div>

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
	  
        <input type="text" class="form-control" placeholder="username or mail" name="a" autocomplete="off">
         
        <div class="input-group-btn">
           
         <input type="submit" class="btn" value="submit" name="s">
		
		</div>
		
		
		
      </div>
	    	
    </form>
	
    <!-- /.lockscreen credentials -->

  </div>
  <div class="help-block text-center">
  <span class="error" style="color:red"><?php if(isset($_POST['s'])){ if($mail_error == "2"){ echo "Invalid mail"; } } ?></span>
  <!-- /.lockscreen-item -->
  </div>
  <div class="help-block text-center">
    Enter your registered mail to retrieve your password
  </div>
  <div class="text-center">
    <a href="index.php">Or sign in as a different user</a>
  </div>
  <div class="lockscreen-footer text-center">
    Copyright &copy; 2014-2019 <b><a href="http://automateem.in/">AutomateEm</a></a></b><br>
    All rights reserved
  </div>
</div>
<!-- /.center -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dibootstrap.min.js"></script>
</body>
</html>
