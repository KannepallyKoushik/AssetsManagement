<?php
include_once("dbconn.php");
if(isset($_POST['s']))
{
	$c=$_POST['c'];
	$sql=mysqli_query($connect,"insert into maps(iframe) values('$c')") or die(mysqli_error($connect));
	header("location:gmaps.php");
}

if(isset($_POST['s1']))
{
	$a=$_POST['c'];
	$id = $_POST['id'];
	$sql=mysqli_query($connect,"update maps set iframe='".$a."' where ID='".$id."'") or die(mysqli_error($connect));
    

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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
   <?php
     include_once("navbar.php");
	?>
  <!-- Left side column. contains the logo and sidebar -->
   <?php
     include_once("sidebar.php");
	?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        AutomateEm
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Location</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" role="form">
              <div class="box-body">
                <div class="form-group">
				<?php
										$s=mysqli_query($connect,"select * from maps") or die(mysqli_error($connect));
										$sres=mysqli_fetch_array($s);
				?>
                    
                  <label>Add Google Location</label>
                  <input type="text" class="form-control"  placeholder="Gmaps" name="c" value="<?php echo $sres['iframe']; ?>">
                </div>
				    
						
                    <input type="hidden" name="id" value="<?php echo $sres['ID']; ?>">            
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <?php 
			  if(!empty($sres['ID']))
			  {
			  ?>
                <input type="submit" class="btn btn-primary" name="s1" value="update">
				<?php 
			  }
			  else
			  {?>
		  <input type="submit" class="btn btn-primary" name="s" value="Submit">
			  <?php } ?>
              </div>
            </form>
          </div>
          <!-- /.box -->

          
         
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
