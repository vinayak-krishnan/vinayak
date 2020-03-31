 
   	    <h2 align="right">Delete Brand&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="adminhome.php?view=addbrand">
   	    <input name="" type="button" value="Add"></a></h2>
<?php
session_start();
 $username=$_SESSION['username'];
 include_once("../connect/conn.php");


$id=$_REQUEST['id'];

mysql_query("delete from category where b_id='$id'");

$s=mysql_query("select * from brand");

?>
<form name="form1" method="post" action="">
  <table width="100%" border="1" style="text-align:center">
  <th>Brand Name</th><th>Action</th></tr>
<?php
while($r=mysql_fetch_array($s))
{
?>
 
    <tr height="35">
      <td width="62%"><?php echo  $r['b_name'];?></td>
     
      <td width="24%"><a href="adminhome.php?view=delete_category&amp;id=<?php echo $r['b_id'];?>&amp;f=delete">Delete</a></td>
     </tr>


<?php
}
?>
  </table>
  </form>
 