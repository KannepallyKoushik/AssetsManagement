<?php include_once("dbconn.php"); 	
if(!empty($_REQUEST['id']))
{	
	$uid = $_REQUEST['id'];
	
	
if(isset($_POST['s1']))
{   
$rps='1';
	 $omac=$_POST['omac'];
	
	 $nmac=explode(",",$_POST['nmac']);
	 $nnmac=$nmac[0];
	 $sno = $nmac[1];
	 $extract = mysqli_query($connect,"select * from cmacaddress where caddress='".$omac."'") or die(mysqli_error($connect));
     $rextract=mysqli_fetch_array($extract);
	 $xxx=$rextract['sno'];
     $z=$rextract['id'];
	 $rptype=$rextract['cproducttype'];
     $count=$rextract['repaircount'];
	 $count=$count+1;

    $cus=mysqli_query($connect,"update customer set repairstatus='0',request_time='' where id='".$uid."'") or die(mysqli_error($connect));
	

	  
	$maccount=mysqli_query($connect,"update cmacaddress set repaircount='".$count."',replacementstatus='".$rps."'  where id='".$z."'") or die(mysqli_error($connect));
    
	$umac=mysqli_query($connect,"update cmacaddress set caddress='".$nnmac."',rtime_stamp=now(),sno='".$sno."' where caddress='".$omac."'") or die(mysqli_error($connect));
    

    $dmac=mysqli_query($connect,"select * from customer left join cmacaddress on customer.id=cmacaddress.cid left join dmacaddress on dmacaddress.did=customer.dealerid") or die(mysqli_error($connect));
    $rdmac=mysqli_fetch_array($dmac);
	$hold=$rdmac['did'];
	
	
	$udmac=mysqli_query($connect,"update dmacaddress set daddress='".$nnmac."' where did='".$hold."' and daddress='".$omac."'") or die(mysqli_error($connect));
	
	
	$mac=mysqli_query($connect,"update macaddress set status='underprocess' where address='".$omac."'") or die(mysqli_error($connect));
     
	 
	 $upa=mysqli_query($connect,"update macaddress set status='UnAvailable',bstatus='2' where address='".$nnmac."'")  or die(mysqli_error($connect));
	 
	 $rpst='underprocess';
	 $push=mysqli_query($connect,"insert into refurbished(rproducttype,raddress,rtime_stamp,rstatus,sno)values('$rptype','$omac',now(),'$rpst','$xxx')") or die(mysqli_query($connect));
	
	 
	 $notify=mysqli_query($connect,"update customer set repairstatus='0',request_time='' where id='".$uid."'") or die(mysqli_query($connect));
	  
	 
	 header("location:update.php");
	 
	 
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
  <!-- daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <script src="bower_components/jquery/dist/jquery.min.js"></script>

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

   <?php include_once("navbar.php"); ?> 
  <!-- Left side column. contains the logo and sidebar -->
   <?php include_once("sidebar.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Updation Of Customer Macaddress 
      </h1>
      </section>

    <!-- Main content -->
    <section class="content">
     
      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Mac Adresses</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
           
          </div>
        </div>
        <!-- /.box-header -->
		<form method="POST" action="">
		<input type="hidden" name="uid" value="<?php echo $uid;?>">
        <div class="box-body">
		
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
			 
                <label>Old MacAddress</label>
                <select class="form-control select2" style="width: 100%;" name="omac" id="pt" required>
				<option value="" >Select</option>
		<?php 
		 
		 $prs=mysqli_query($connect,"select * from cmacaddress where cid='".$uid."' ") or die(mysqli_error($connect));
		 
		while($rprs=mysqli_fetch_array($prs))
		{
			
		?>
		          <option value="<?php echo $rprs['caddress']; ?>"><?php echo $rprs['caddress']; ?></option>
			  <?php } ?>
              
			  </select>
			  
              </div>
			  </div>
		<div class="col-md-6">
              <div class="form-group">
			 
                <label>New MacAddress</label>
                   <select class="form-control select2" style="width: 100%;" name="nmac" id="sm" required>
				<option>select</option>
				<option></option>
              
			  </select>
			  

              </div>
			  </div>


			</div>
		      
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
		<div class="box-footer">
                <input type="submit" class="btn btn-primary" name="s1" value="Submit">
              </div>
      </div>
      <!-- /.box -->
      </form>
   
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


<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

  
  })
</script>
<script>
$(document).ready(function(){
		$("#pt").change(function(){
	
		var x = $("#pt").val();
		$.ajax({
			type: "POST",
			url:  "updateajax.php",
			data:{id:x
				
			},
			cache:false,
			success:function(html)
			{
					
				$("#sm").html(html);
			}
			
			
			
		});
		
	});
	
	
});

</script>
		
</body>
</html>
