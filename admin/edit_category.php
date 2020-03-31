
   	    <h2 align="right">Update Category Details &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="adminhome.php?view=category"><input name="" type="button" value="Back"></a></h2>
<?php
session_start();
 $username=$_SESSION['username'];
include_once("../connect/conn.php");

$s=mysql_query("select * from category");

?>
<form name="form1" method="post" action="">
  <table width="100%" border="1" style="text-align:center">
  <tr>
  <th>Category Name</th>
  <th width="20%">Action</th></tr>
<?php
while($r=mysql_fetch_array($s))
{
?>
 
    <tr height="35">
      <td><?php echo $r['cat_name'];?></td>
      <td><a href="adminhome.php?view=edit_category1&id=<?php echo $r['cat_id'];?>">Edit</a></td>
     </tr>


<?php
}
?>
  </table>
  </form>
  </div>