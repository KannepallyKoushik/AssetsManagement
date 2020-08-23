<?php
include_once("dbconn.php");
$pc="";


if(isset($_POST['s']))
{
	
	$psw=$_POST['t1'];
	$rpsw=$_POST['t2'];
	
    if($psw==$rpsw)
	{
		
		$c=$_SESSION['email'];

		$sql=mysqli_query($connect,"update admin set password='".$rpsw."' where username='".$_SESSION['email']."'") or die(mysqli_error($connect));
		
		SESSION_DESTROY();
		header("location:index.php");
	}
    else
	{
		$pc="2";
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
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>AutomateEm</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
  <?php
  if($pc==""){
  ?>
    <p class="login-box-msg">Reset Your Password Here!</p>
  <?php } else {?>
  <p class="login-box-msg" style="color:red">Oops!Passwords didn't match.</p>
  <?php } ?>
	<form  method="post">
      <div class="form-group">
        <input type="password" class="form-control" placeholder="new password" name="t1" required autocomplete="off">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="input-group">
        <input type="password" class="form-control" placeholder="retype new password" name="t2" id="rpwd" required>
        <div class="input-group-btn">
		<button id="pt" class="btn" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
		</div>
      </div>
	  <br>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" class="btn btn-primary btn-block btn-flat" value="Reset" name="s">
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

 $(document).ready(function(){
					
					$("#pt").click(function(){
						
						
						if($("#rpwd").attr("type") == "password")
						{
							$("#rpwd").attr("type","text");
						}
						else if($("#rpwd").attr("type") == "text"){
							
							$("#rpwd").attr("type","password");
						}
						
				 });
				 
				 });
				
</script>

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
