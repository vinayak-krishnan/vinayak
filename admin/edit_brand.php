<html><body>
   	    <h2 align="right">Update Brand &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="adminhome.php?view=addbrand"><input name="" type="button" value="Back"></a></h2>
<?php
session_start();
 $username=$_SESSION['username'];
include_once("../connect/conn.php");

$s=mysql_query("select * from brand");

?>
<form name="form1" method="post" action="">
  <table width="100%" border="0" style="text-align:center">
  <tr bgcolor="#CCCCCC">
  <th>Category Name</th>
  <th width="20%">Action</th></tr>
<?php
while($r=mysql_fetch_array($s))
{
?>
 
    <tr height="35">
      <td><?php echo $r['b_name'];?></td>
      <td><a href="adminhome.php?view=update_brand1&id=<?php echo $r['b_id'];?>">Edit</a></td>
     </tr>


<?php
}
?>
  </table>
  </form>
 </body>
 </html>