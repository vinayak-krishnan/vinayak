 <html><div class="templatemo_box">
   	    <h2> <center>View Reports</center></h2>
<?php
session_start();
$username=$_SESSION['username'];
include_once("../connect/conn.php");
error_reporting("E_notice");
/*$a1=mysql_query("select * from user_reg where ex_una='$username'") or die(mysql_error());
while($r1=mysql_fetch_array($a1))
{
 $mgr_id=$r1['mgr_id'];
 $ex_id=$r1['ex_id'];
 
}*/
$id=$_REQUEST['id'];
$status=$_REQUEST['stat'];
if($status=='delete')
{
	
	mysql_query("delete from co_report where r_id='$id'");
	
	//echo"<script>window.location=admin.php?view=aview_mail'</
}

?>

<body>
<table border="0" cellpadding="5" width="100%">

  <tr align="center" style="background-color:#696">
<th height="36"><font color="#0033FF"><em>Send From</em></th> 
<th> <em><font color="#0033FF">Subject </em></th> 
<th><div align="center"><em><font color="#0033FF">Action</em></div></th> 
</tr>


	<?php
	//echo $s;
	
	
	$z="select * from co_report where re_to='$username'";
	$z1=mysql_query($z);	
	while($row=mysql_fetch_array($z1))
	{   //report_msg
		?> 	
     

		<tr align="center"><td height="42"> <?php	echo $row['re_from']; ?></td>
      	<td><a href="adminhome.php?view=view_ad_repots1&id1=<?php echo $row['r_id'];?>"><?php echo $row['re_title'];?></a>
		</td>
    <!--  <td><?php	//echo $row['feedback']; ?></td>-->
    <td><a href="adminhome.php?view=view_ad_repots&id=<?php echo $row['r_id'];?>&stat=delete">Delete</a></td>
      </tr>
      
<?php
	}
	?>


</table>


</body>
</html>
</div>