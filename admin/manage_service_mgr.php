<?php session_start();
$username=$_SESSION['username'];?>

<html>
<body>
 <div class="templatemo_box">
   	    <h2 align="center">Manage Service Managers</h2>
<?php
include_once("../connect/conn.php");

echo $id=$_REQUEST['id'];
$status=$_REQUEST['status'];
$user=$_REQUEST['user'];


if($status=='block')
{
	
	echo "<script>alert('Account Blocked!')</script>";
	mysql_query("update login set status='b' where username='$user'");
	mysql_query("update service_mgr set mgr_sta='b' where mgr_id='$id'");	
	
	echo"<script>window.location='adminhome.php?view=manage_service_mgr'</script>";
}
else if($status=='unblock')
{
	echo "<script>alert('Account Unblocked!')</script>";
	mysql_query("update service_mgr set mgr_sta='1' where mgr_id='$id'");	
	mysql_query("update login set status='1' where username='$user'");
	echo"<script>window.location='adminhome.php?view=manage_service_mgr'</script>";
}
else if($status=='delete')
{
	
mysql_query("delete from service_mgr where mgr_id='$id'");
mysql_query("delete from login where username='$user'");	
}





 $s1=mysql_query("select * from service_mgr where mgr_sta='1'or mgr_sta='b'");

?>
  <table width="100%" border="0">
  <tr height="30" bgcolor="#CCCCCC"><th width="13%">Name</th><th width="9%">Gender</th>
  <th width="14%">Address</th>
  <th width="14%">Phone</th>
  <th width="13%">Mail</th>
  <th width="12%">Username</th><th width="15%" colspan="2">Action</th></tr>
  

<?php

	
while($r=mysql_fetch_array($s1))
{
	
$a=$r['mgr_name'];	
 $b=$r['mgr_gender'];	

$c=$r['mgr_add'];	
	
$e=$r['mgr_phone'];
$f=$r['mgr_email'];	
$g=$r['mgr_una'];
	
$i=$r['cat_id'];

$h=$r['mgr_sta'];
	

?>

    <tr>
      <td><?php echo $r['mgr_name'];?></td>
      <td><?php echo $b;?></td>
      <td><?php echo $c;?></td>
     
      <td><?php echo $e;?></td>
      <td><?php echo $f;?></td>
      <td><?php echo $g;?></td>
        
      <td>
    <?php
	  if($h=='1')
		{
?>
      
      <a href="adminhome.php?view=manage_service_mgr&amp;id=<?php echo $r['mgr_id'];?>&amp;status=block&user=<?php echo $r['mgr_una'];?>">Block</a>
   <?php             
		}
		if($h=='b')
		{
?>         
         
          <a href="adminhome.php?view=manage_service_mgr&amp;id=<?php echo $r['mgr_id'];?>&amp;status=unblock&user=<?php echo $r['mgr_una'];?>">Unblock</a>
      <?php             
		}
		?>  </td>
         <td>
    
           <p><a href="adminhome.php?view=manage_service_mgr&amp;id=<?php echo $r['mgr_id'];?>&amp;status=delete">Delete</a>/</p>
        <p> <a href="adminhome.php?view=view_service_mgr&amp;id=<?php echo $r['mgr_id'];?>">Update</a></p></td>
     
    </tr>


<?php
}

?>
  </table>
 </form>
  </div>
   </body>
  </html>