 
   	    <h2 align="right">Delete Category&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="adminhome.php?view=category"><input name="" type="button" value="Back"></a></h2>
<?php
session_start();
 $username=$_SESSION['username'];
 include_once("../connect/conn.php");


$id=$_REQUEST['id'];

mysql_query("delete from category where cat_id='$id'");

$s=mysql_query("select * from category");

?>
<form name="form1" method="post" action="">
  <table width="100%" border="1" style="text-align:center">
  <tr><th>Category Name</th><th>Action</th></tr>
<?php
while($r=mysql_fetch_array($s))
{
?>
 
    <tr height="35">
      <td width="62%"><?php echo  $r['cat_name'];?></td>
     
      <td width="24%"><a href="adminhome.php?view=delete_category&amp;id=<?php echo $r['cat_id'];?>&amp;f=delete">Delete</a></td>
     </tr>


<?php
}
?>
  </table>
  </form>
 