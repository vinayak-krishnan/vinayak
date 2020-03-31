<html>
<body>
 <div class="templatemo_box">
   	    <h2 align="center">Manage Users</h2>
<?php
include_once("../connect/conn.php");

echo $id=$_REQUEST['id'];
$status=$_REQUEST['status'];
$user=$_REQUEST['user'];
if($status=='block')
{
	
	echo "<script>alert('Blocked')</script>";
	mysql_query("update login set status='b' where username='$user'");
	mysql_query("update user_reg set u_status='b' where u_id='$id'");	
	
	echo"<script>window.location='adminhome.php?view=manage_users'</script>";
}
else if($status=='unblock')
{
	echo "<script>alert('Unblocked')</script>";
	mysql_query("update user_reg set u_status='1' where u_id='$id'");	
	mysql_query("update login set status='1' where username='$user'");
	
	echo"<script>window.location='adminhome.php?view=manage_users'</script>";
}





 $s1=mysql_query("select * from user_reg where u_status='1' or u_status='b'");

?>
  <table width="100%" border="0">
  <tr height="30" bgcolor="#CCCCCC"><th height="32"><div align="center">Name</div></th><th><div align="center">Gender</div></th><th><div align="center">District</div></th><th><div align="center">Phone</div></th><th><div align="center">Mail</div></th><th><div align="center">Username</div></th><th><div align="center">Action</div></th></tr>
  

<?php

	
while($r=mysql_fetch_array($s1))
{
	
$a=$r['name'];	
$b=$r['gender'];	
$c=$r['district'];		
$e=$r['phone'];
$f=$r['mail'];	
$g=$r['una'];	
$h=$r['u_status'];

	

?>

    <tr>
      <td height="34"><div align="center"><?php echo $r['name'];?></div></td>
      <td><div align="center"><?php echo $b;?></div></td>
      <td><div align="center"><?php echo $c;?></div></td>
      <td><div align="center"><?php echo $e;?></div></td>
      <td><div align="center"><?php echo $f;?></div></td>
      <td><div align="center"><?php echo $g;?></div></td>
        
      <td>
        <div align="center">
          <?php
	  if($h=='1')
		{
?>
          
          <a href="adminhome.php?view=manage_users&amp;id=<?php echo $r['u_id'];?>&amp;status=block&user=<?php echo $r['una'];?>">Block</a>
          <?php             
		}
		if($h=='b')
		{
?>         
          
          <a href="adminhome.php?view=manage_users&amp;id=<?php echo $r['u_id'];?>&amp;status=unblock&user=<?php echo $r['una'];?>">Unblock</a>
          <?php             
		}
		?>  
      </div></td>
     
    </tr>

<?php
}

?>
  </table>
 
  </div>
   </body>
  </html>