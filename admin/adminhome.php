<?php
session_start();
$username=$_SESSION['username'];
error_reporting("NOTICE");
include_once("../connect/conn.php");
if($_GET['log']=="out")
{
session_destroy();
echo"<script>window.location='../index.php'</script>";
}
if($username<>"")
{
	?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Complaint Management System ::: Administrator</title>
<meta name="keywords" content="" />
<meta name="Cool Black" content="" />
<link href="../default.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="../jscript/gen_validatorv31.js" ></script>
</head>
<body>
<!-- start header -->
<div id="header">
	<div id="logo">
		<h1><a href="#"><span>Complaint</span> Management</a></h1>
		<p>&nbsp;</p>
		<p>System</p>
		<div align="center"><strong >Welcome &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong><font color="#FFFFFF"><?php echo $username; ?></font>
	  </div>
	</div>
</div>
	<div id="menu">
		<ul id="main">
			<li class="current_page_item"><a href="adminhome.php">Home</a></li>
			<li><a href="adminhome.php?view=view_complaints">complaints</a></li>
			<li><a href="adminhome.php?view=all_mgr"> Manager</a></li>
			<li><a href="adminhome.php?view=ad_workflow">Work Flow</a></li>
			<li><a href="adminhome.php?log=out">Logout</a></li>
		</ul>
	</div>
	
<!-- end header -->
<div id="wrapper">
	<!-- start page -->
	<div id="page">
		<div id="sidebar1" class="sidebar">
			<ul>
			  <li>
				<h2>Control Users</h2>
				  <ul>
					  <li><a href="adminhome.php?view=reg_users">Registerd Users</a></li>
                      <li><a href="adminhome.php?view=manage_users">Manage users</a></li>
					  <li><a href="adminhome.php?view=view_ad_repots">View Reports</a></li>
                          <li><a href="adminhome.php?view=a_view_feedback">View FeedBack</a></li>
				  </ul>
			  </li>
				<li>
					<h2>Categories</h2>
					<ul>
						<li><a href="adminhome.php?view=category">Add Category</a></li>
                        <li><a href="adminhome.php?view=addbrand">Add Brands</a></li>
						<li><a href="adminhome.php?view=add_products">Add Products</a></li>
					
					</ul>
				</li>
				<li>
					<h2>Service Manager</h2>
					<ul>
						<li><a href="adminhome.php?view=add_service_mgr">Add Service Manager</a></li>
						<li><a href="adminhome.php?view=manage_service_mgr">Manage  Service Manager</a></li>
						
					</ul>
				</li>
                <li>
					<h2>Service Executives</h2>
					<ul>
						<li><a href="adminhome.php?view=add_service_exec">Add Service Executives</a></li>
						<li><a href="adminhome.php?view=manage_service_exec">Manage Service Executives</a></li>
						
						
					</ul>
				</li>
				<?php
                    //$s12=mysql_query("select * from service_exec where ex_sta='1'");
					
					
					?>
                    
                    <?php
					/*while($r2=mysql_fetch_array($s12))
					{
	
					 $a=$r2['ex_na'];	*/
					?><li><a href="#"><?php //echo $a;?></a></li>
					<?php //}?>	
					</ul>
			</ul>
    </div>
		<!-- start content -->
		<div id="content1">
          <?php
        include_once("../connect/conn.php");
        if($_REQUEST['view']<>"")
		{
			$class="ad_class.php";
			if(file_exists($class))
			{
				include_once($class);
			 $obj=new ad_detail;	
			}
		}
		else
		{
        
        ?>
			<div class="post">
				<h1 class="title"><a href="">Welcome Administrator...</a></h1>
					
					<div class="entry">
                    <img src="../images/Admin.jpg" width="670" height="195" />
						<?php
						$s1=mysql_query("select * from user_reg where u_status='0'");
 $rs=mysql_num_rows($s1);
 ?>
 <h1><a href="adminhome.php?view=reg_users"> New (<font color="#FF0000"><?php echo $rs; ?></font>) Registered Users</a> </h1>
			  </div>
			</div>
                <?php
		}
		?>
        
        
		</div>
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end page -->
</div>
<div id="footer">
	<p class="copyright">&copy;&nbsp;&nbsp;2013 All Rights Reserved
</div>
</body>
</html>
<?php
}
else
{
	echo"<script>window.location='../index.php'</script>";
}
?>