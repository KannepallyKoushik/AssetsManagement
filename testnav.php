<?php 
include_once("dbconn.php");
if($_SESSION['uname']==null)
{
header("location:index.php");	
}


?>
<header class="main-header">
    <!-- Logo -->
    <a href="home.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>AE</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">AutomateEm</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

<?php 
			  $count=0;
			  $sl= mysqli_query($connect," select * from customer ") or die(mysqli_error($connect));
			  while($rsl =  mysqli_fetch_array($sl))
			  {
				  if($rsl['repairstatus'] == '1')
				  {
					  $count = $count + 1;
				  }
			  } 
?>
      <div class="navbar-custom-menu">
	    <ul class="nav navbar-nav" >

<?php if($_SESSION['role']=='employee' or $_SESSION['role']=='superadmin')
{	
?>

		    <li class="dropdown messages-menu" >
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-success"><?php echo $count; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo $count; ?> messages</li>
			  
              <li>
			  <div class="form-group">
                <!-- inner menu: contains the actual data -->
				<?php
				$slt= mysqli_query($connect,"select * from customer") or die(mysqli_error($connect));
			    while($rslt =  mysqli_fetch_array($slt))
			    {
			    ?>
                 <?php if($rslt['repairstatus'] == '1'){ ?>

                <ul class="menu">
                  <li><!-- start message -->
				  
	<a href="notif.php?id=<?php echo rslt['id']; ?>">
                    
                      <div class="pull-left">
                        <img src="logo.png" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        <?php echo $rslt['customername']; ?> 
						<?php 
						$var1=$rslt['request_time'];
						
						?>					
                        <small><i class="fa fa-clock-o"></i><?php echo $var1; ?></small>
                      </h4>
                      <p><?php echo $rslt['mail']; ?></p>
				  
	</a>	 	
				  </li>
				  
                  <!-- end message -->
			
	    </ul>

				
				
				<?php } ?>
				
				<?php } ?>
			<li class="footer"><a href="#">See All Messages</a></li>	 
              </li>
			 
              
            </ul>
			
          </li>
<?php } ?>			

          <!-- Notifications: style can be found in dropdown.less -->
         
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="logo small.png" class="user-image" alt="User Image">
              <span class="hidden-xs">AutomateEm</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
