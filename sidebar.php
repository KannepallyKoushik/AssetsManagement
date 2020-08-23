<?php
if($_SESSION['role']=='superadmin')
{
?>
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
       <li class="treeview">
          <a href="#">
            <i class="fa fa-info-circle"></i>
            <span>Logins</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addlogin.php"><i class="fa fa-circle-o"></i>Create Login</a></li>
            
          </ul>
        </li>  
		 
	   <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Customers Details</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="adddetails.php"><i class="fa fa-circle-o"></i>Add Customers</a></li>
            <li><a href="listdetails.php"><i class="fa fa-circle-o"></i> List Customers</a></li>
          </ul>
        </li>  
		<li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Dealer</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="adddealer.php"><i class="fa fa-circle-o"></i>Add Dealer</a></li>
            <li><a href="listdealer.php"><i class="fa fa-circle-o"></i> List Dealers</a></li>
          </ul>

        </li>  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-product-hunt"></i>
            <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addproduct.php"><i class="fa fa-circle-o"></i>Add Product</a></li>
            <li><a href="listproduct.php"><i class="fa fa-circle-o"></i> List Products</a></li>
          </ul>

        </li> 
        <li class="treeview">
          <a href="#">
            <i class="fa fa-address-card"></i>
            <span>Mac address</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addmacaddress.php"><i class="fa fa-circle-o"></i>Add MacAddress</a></li>
            <li><a href="listmacaddress.php"><i class="fa fa-circle-o"></i> List MacAddress</a></li>
          </ul>

        </li>  
       	<li class="treeview">
          <a href="#">
            <i class="fa fa-clone"></i>
            <span>Refurbished</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addrefurbished.php"><i class="fa fa-circle-o"></i>Add Refurbished</a></li>
            <li><a href="listrefurbished.php"><i class="fa fa-circle-o"></i> List Refurbished</a></li>
          </ul>

        </li>  
       		
      
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
<?php } ?>
<?php
if($_SESSION['role']=='employee')
{
?>

 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
       <li class="treeview">
          <a href="#">
            <i class="fa fa-info-circle"></i>
            <span>Logins</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addlogin.php"><i class="fa fa-circle-o"></i>Create Login</a></li>
            
          </ul>
        </li>  
		 
	   <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Customers Details</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="adddetails.php"><i class="fa fa-circle-o"></i>Add Customers</a></li>
            <li><a href="listdetails.php"><i class="fa fa-circle-o"></i> List Customers</a></li>
          </ul>
        </li>  
		<li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Dealer</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="adddealer.php"><i class="fa fa-circle-o"></i>Add Dealer</a></li>
            <li><a href="listdealer.php"><i class="fa fa-circle-o"></i> List Dealers</a></li>
          </ul>

        </li>  
        <li class="treeview">
          <a href="#">
            <i class="fa fa-product-hunt"></i>
            <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addproduct.php"><i class="fa fa-circle-o"></i>Add Product</a></li>
            <li><a href="listproduct.php"><i class="fa fa-circle-o"></i> List Products</a></li>
          </ul>

        </li> 
        <li class="treeview">
          <a href="#">
            <i class="fa fa-address-card"></i>
            <span>Mac address</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addmacaddress.php"><i class="fa fa-circle-o"></i>Add MacAddress</a></li>
            <li><a href="listmacaddress.php"><i class="fa fa-circle-o"></i> List MacAddress</a></li>
          </ul>

        </li>  
       	<li class="treeview">
          <a href="#">
            <i class="fa fa-clone"></i>
            <span>Refurbished</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addrefurbished.php"><i class="fa fa-circle-o"></i>Add Refurbished</a></li>
            <li><a href="listrefurbished.php"><i class="fa fa-circle-o"></i> List Refurbished</a></li>
          </ul>

        </li>  
       		
      
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside><?php }?>
<?php
if($_SESSION['role']!='employee' and $_SESSION['role']!='superadmin' )
{
?>

 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
       <li class="header">MAIN NAVIGATION</li>
       <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Personal Details</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="mydeatails.php"><i class="fa fa-circle-o"></i>My Details</a></li>
            
          </ul>
        </li>  
		
	   <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Customers Details</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="adddetails.php"><i class="fa fa-circle-o"></i>Add Customers</a></li>
            <li><a href="dealercustomer.php"><i class="fa fa-circle-o"></i> List Customers</a></li>
          </ul>
        </li>  
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
      
<?php }?>