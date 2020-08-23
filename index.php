<?php
include_once("dbconn.php");
$details="";
if(isset($_POST['s']))
{
	$uname=$_POST['t1'];
	$psw=$_POST['t2'];
	$sql=mysqli_query($connect,"select * from admin where username='".$uname."' and password='".$psw."'") or die(mysqli_error($connect));
    $count=mysqli_num_rows($sql);
	
	if($count==1)
	{
		$res=mysqli_fetch_array($sql);
		$_SESSION['uname']=$res['username'];
		$_SESSION['role']=$res['role'];
		header("location:home.php");
	}
	else
	{
         $details="2";
	
	}
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AutomateEm | Log in</title>
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
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>AutomateEm</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
   <?php
  if($details==""){
  ?>
    <p class="login-box-msg">Sign in to start your session</p>
  <?php } else {?>
  <p class="login-box-msg" style="color:red">Oops!Invalid Details.</p>
  <?php } ?>
	
    <form action="index.php" method="post">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="User name" name="t1" required autocomplete="off">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="t2" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" class="btn btn-primary btn-block btn-flat" value="Sign In" name="s">
        </div>
		<div class="col-xs-8">
          <div class="checkbox icheck pull-right">
            <label>
              <a href="recovery.php">Forgot password?</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
      </div>
    </form>

  
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
