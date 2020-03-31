<?php session_start();
$username=$_SESSION['username'];?>

<html>
<body>
 <div class="templatemo_box">
   	    <h2 align="center">View Service Managers</h2>
<?php
include_once("../connect/conn.php");

echo $id=$_REQUEST['id'];
$status=$_REQUEST['status'];
$user=$_REQUEST['user'];


if($status=='block')
{
	
	echo "<script>alert('Account Blocked!')</script>";
	mysql_query("update login set status='b' where username='$user'");
	mysql_query("update service_exec set ex_sta='b' where ex_id='$id'");	
	
	echo"<script>window.location='adminhome.php?view=manage_service_exec'</script>";
}
else if($status=='unblock')
{
	echo "<script>alert('Account Unblocked!')</script>";
	mysql_query("update service_exec set ex_sta='1' where ex_id='$id'");	
	mysql_query("update login set status='1' where username='$user'");
	echo"<script>window.location='adminhome.php?view=manage_service_exec'</script>";
}
else if($status=='delete')
{
	
mysql_query("delete from service_exec where ex_id='$id'");
mysql_query("delete from login where username='$user'");	
}





 $s1=mysql_query("select * from service_exec where ex_sta='1'or ex_sta='b'");

?>
  <table width="100%" border="0" style="text-align:center">
  <tr height="30" bgcolor="#CCCCCC"><th width="9%">Name</th><th width="10%">Gender</th>
  <th width="13%">Address</th>
  <th width="10%">Phone</th>
  <th width="12%">Mail</th>
  <th width="15%">Username</th><th colspan="2">Action..</th></tr>
  

<?php

	
while($r=mysql_fetch_array($s1))
{
	
$a=$r['ex_na'];	
 $b=$r['ex_g'];	

$c=$r['ex_add'];	
	
$e=$r['ex_phn'];
$f=$r['ex_mail'];	
$g=$r['ex_una'];
	
$i=$r['mgr_id'];

$h=$r['ex_sta'];
	

?>

    <tr>
      <td><?php echo $a;?></td>
      <td><?php echo $b;?></td>
      <td><?php echo $c;?></td>
     
      <td><?php echo $e;?></td>
      <td><?php echo $f;?></td>
      <td><?php echo $g;?></td>
        
      <td width="22%">
    <?php
	  if($h=='1')
		{
?>
      
      <a href="adminhome.php?view=manage_service_exec&amp;id=<?php echo $r['ex_id'];?>&amp;status=block&user=<?php echo $r['ex_una'];?>">Block</a>
   <?php             
		}
		if($h=='b')
		{
?>         
         
          <a href="adminhome.php?view=manage_service_exec&amp;id=<?php echo $r['ex_id'];?>&amp;status=unblock&user=<?php echo $r['ex_una'];?>">Unblock</a>
      <?php             
		}
		?>  </td>
         <td width="9%">
    
           <p><a href="adminhome.php?view=manage_service_exec&amp;id=<?php echo $r['ex_id'];?>&amp;status=delete">Delete</a>/</p>
        <p> <a href="adminhome.php?view=view_service_exec&amp;id=<?php echo $r['ex_id'];?>">Update</a></p></td>
     
    </tr>

</form>
<?php
}

?>
  </table>
 
  </div>
   </body>
  </html>