<html>
<body>
 <div class="templatemo_box">
   	    <h2 align="center">View Registered Users</h2>
   <div align="center">
     <?php
include_once("../connect/conn.php");

echo $id=$_REQUEST['id'];
$status=$_REQUEST['status'];
$user=$_REQUEST['user'];
if($status=='accept')
{
	
	mysql_query("update user_reg set u_status='1' where u_id='$id'");
	mysql_query("update login set status='1' where username='$user'");
	
	echo"<script>window.location='adminhome.php?view=reg_users'</script>";
}
else if($status=='reject')
{
	
	mysql_query("delete from user_reg where u_id='$id'");
	mysql_query("delete from login where username='$user'");
	
	echo"<script>window.location='adminhome.php?view=reg_users'</script>";
}





 $s1=mysql_query("select * from user_reg where u_status='0'");
 if(mysql_num_rows($s1)<=0)
 {
	 echo"<script>alert('No New Registrations!')</script>";
	 echo"<script>window.location='adminhome.php'</script>";	
 }
 else
 {
?>
     <table width="100%" border="0">
       <tr height="30" bgcolor="#CCCCCC"><th width="12%" height="30">Name</th><th width="10%">Gender</th>
       <th width="12%">District</th>
       <th width="10%">Phone</th>
       <th width="7%">Mail</th>
       <th width="15%">Username</th>
       <th width="22%">Action</th></tr>
            
            
  <?php

	
while($r=mysql_fetch_array($s1))
{
	
$a=$r['name'];	
$b=$r['gender'];	
$c=$r['district'];		
$e=$r['phone'];
$f=$r['mail'];	
$g=$r['una'];	

	

?>
            
       <tr>
         <td height="30"><div align="center"><?php echo $r['name'];?></div></td>
         <td><div align="center"><?php echo $b;?></div></td>
         <td><div align="center"><?php echo $c;?></div></td>
         <td><div align="center"><?php echo $e;?></div></td>
         <td><div align="center"><?php echo $f;?></div></td>
         <td><div align="center"><?php echo $g;?></div></td>
              
         <td><div align="center"><a href="adminhome.php?view=reg_users&amp;id=<?php echo $r['u_id'];?>&amp;status=accept&amp;user=<?php echo $r['una'];?>">Accept</a>/
         <a href="adminhome.php?view=reg_users&amp;id=<?php echo $r['u_id'];?>&amp;status=reject&amp;user=<?php echo $r['una'];?>">Reject</a></div></td>
              
       </tr>
            
  <?php
}
 }
?>
     </table>
   </div>
 </div>
   </body>
  </html>