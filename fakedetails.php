<?php
include_once("dbconn.php");
if(isset($_POST['s1']))
{   
	$s=$_POST['s'];
	$p=$_FILES['p']['name'];
	$target = "gallery/";
		$tfile = $target.basename($_FILES['p']['name']);
		if(!move_uploaded_file($_FILES['p']['tmp_name'],$tfile))
		{
			echo "not inserted";
			exit;
		}
	
	$c=$_POST['c'];
	$ph=$_POST['ph'];
	$sql=mysqli_query($connect,"insert into products(productname,photo,model,description) values('$s','$p','$c','$ph')") or die(mysqli_error($connect));
	header("location:addproduct.php");
}
 
if(!empty($_REQUEST['eid']))
{
	$edid=$_REQUEST['eid'];
	$edids=mysqli_query($connect,"select * from products where ID='".$edid."'") or die(mysqli_error($connect));
    $ed_res=mysqli_fetch_array($edids);
}

if(isset($_POST['update']))
{  
       $n=$_POST['s'];
	  
	   $b=$_FILES['p']['name'];
	   $target = "gallery/";
		$tfile = $target.basename($_FILES['p']['name']);
		if(!move_uploaded_file($_FILES['p']['tmp_name'],$tfile))
		{
			echo "not inserted";
			exit;
		}
	
	   $c=$_POST['c'];
	   $g=$_POST['ph'];
	   

 $sql=mysqli_query($connect,"update products set productname='".$n."',photo='".$b."',model='".$c."',description='".$g."' where id='".$edid."'") or die(mysqli_error($connect));
 header("location:addproduct.php");
	
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
              <h3 class="box-title">Achievement</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" role="form" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label>Product Name</label>
                  <input type="text" class="form-control"  placeholder="Product Name" name="s" value="<?php if(!empty($_REQUEST['eid'])){ echo $ed_res['productname'];}?>">
                </div>
                <div class="form-group">
                  <label>Product Photo</label>
                  <input type="file" id="exampleInputFile"  class="form-control"  placeholder="Photo" name="p" id="<?php if(!empty($_REQUEST['eid'])){ echo $ed_res['photo'];}?>">
                </div>
				<div class="form-group">
                  <label>Product Model</label>
                  <input type="text" class="form-control"  placeholder="Company" name="c" value="<?php if(!empty($_REQUEST['eid'])){ echo $ed_res['model'];}?>">
                </div>
                <div class="form-group">
                  <label>Product Description</label>
				  <textarea class="form-control" name="ph">
                  <?php if(!empty($_REQUEST['eid'])){ echo $ed_res['description'];}?>
				  </textarea>
                </div>
                </div>
              <!-- /.box-body -->
			   
<?php
if(empty($_REQUEST['eid']))
{ ?>
			   
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" value="Submit" name="s1">
              </div>
<?php }			  
			   

else
{ ?>
		
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" value="Edit" name="update">
              </div>
<?php } ?>  

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
