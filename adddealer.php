<?php
include_once("dbconn.php");
if(isset($_POST['s1']))
{
	
	
	$bnum_error = $name_error = $email_error = $phone_error = $dealer_error = "";
	$q=$_POST['a'];
    $r=$_POST['b'];
	$s=$_POST['c'];
	$t=$_POST['d'];
    $cmp="Available";

    $cres = mysqli_query($connect,"select * from dealer where email='".$s."'") or die(mysqli_error($connect));
	$count = mysqli_num_rows($cres);

	if($count != 1)
	{

	
if(!preg_match("/^[a-z A-Z]*$/",$q)){
			$name_error = "Only letters and whitespaces are allowed";
}
if(!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i",$r)){
			$phone_error = "Invalid phone number";
}
if(!filter_var($s,FILTER_VALIDATE_EMAIL)){
			$email_error = "Invalid Email";			
}	

if( $email_error == "" && $name_error == "" && $phone_error == "")
{
$ch = mysqli_query($connect,"select * from macaddress where status='".$cmp."'") or die(mysqli_error($connect));
$num=mysqli_num_rows($ch);
      
   if($num>=$t)
   { 
		$s=mysqli_query($connect,"insert into dealer(name,phone,email,count,alloted) values('$q','$r','$s','$t','no')") or die(mysqli_error($connect));
	    $id=mysqli_insert_id($connect);
		
		$url = "dmacaddress.php?id=$id&&crc=$t";
	    header("location:$url");
   }
   else
   {
	   $bnum_error = "Insufficient number of Boards";
	   
   }
}
}
else{
	$dealer_error="2";
}
}
if(!empty($_REQUEST['eid']))
{
	$edid=$_REQUEST['eid'];
	$edids=mysqli_query($connect,"select * from dealer where ID='".$edid."'") or die(mysqli_error($connect));
    $ed_res=mysqli_fetch_array($edids);
}

if(isset($_POST['update']))
{   
    $q=$_POST['a'];
    $r=$_POST['b'];
	$s=$_POST['c']; 
	
	$t=$_POST['d'];

 $sql=mysqli_query($connect,"update dealer set name='".$q."',phone='".$r."',email='".$s."',count='".$t."' where id='".$edid."'") or die(mysqli_error($connect));
 header("location:adddealer.php");
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

  <header class="main-header">
    <!-- Logo -->
    <?php
	include_once("navbar.php");
	?>
  </header>
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
              <h3 class="box-title">Add Dealer</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="box-body">
			  
               <div class="form-group">
                  <label>Dealer</label>
                  <input type="text" class="form-control"  placeholder="Dealer Name" name="a" value="<?php if(!empty($_REQUEST['eid'])){ echo $ed_res['name'];} ?>" required>
                  <span class="error" style="color:red"><?php if(isset($_POST['s1'])){ if($name_error != ""){ echo $name_error; }} ?></span>
				</div>
                
                <div class="form-group">
                  <label>Phone Number</label>
                  <input type="text" class="form-control"  placeholder="Phone" name="b" value="<?php if(!empty($_REQUEST['eid'])){ echo $ed_res['phone'];}?>" required>
                   <span class="error" style="color:red"><?php if(isset($_POST['s1'])){ if($phone_error != ""){ echo $phone_error; }} ?></span>
				</div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control"  placeholder="Mail" name="c" value="<?php if(!empty($_REQUEST['eid'])){ echo $ed_res['email'];}?>" required>
                  <span class="error" style="color:red"><?php if(isset($_POST['s1'])){ if($email_error != ""){ echo $email_error; } elseif($dealer_error=="2"){ echo "Dealer Already Exists";}} ?></span>
				</div>
				
                 <div class="form-group">
                  <label>Number Of Boards</label>
                  <input type="text" class="form-control"  placeholder="count" name="d" value="<?php if(!empty($_REQUEST['eid'])){ echo $ed_res['count'];}?>" required>
                   <span class="error" style="color:red"><?php if(isset($_POST['s1'])){ if($bnum_error != ""){ echo $bnum_error."{ Available:".$num."}"; }  } ?></span>
				 </div>
				  
              </div>
              <!-- /.box-body -->
<?php
if(empty($_REQUEST['eid']))
{ ?>
			   
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" value="Next" name="s1">
              </div>
<?php }			  
			   

else
{ ?>
		
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" value="Edit Next" name="update">
              </div>
<?php } ?>  
            </form>
          </div>
          <!-- /.box -->

      
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php 

include_once("footer.php");
?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
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
