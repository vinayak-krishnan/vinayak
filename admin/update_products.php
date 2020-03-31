<html><body>
   	    <h2 align="right">Update Product &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="adminhome.php?view=add_products">
   	    <input name="" type="button" value="Back"></a></h2>
<?php
session_start();
 $username=$_SESSION['username'];
include_once("../connect/conn.php");

$s=mysql_query("select * from product");

?>
<form name="form1" method="post" action="">
  <table width="100%" border="0" style="text-align:center">
  <tr bgcolor="#999999">
  <th width="20%" height="35">Product Name</th>
  <th>Brand Name</th>
  <th>Category Name</th>
  <th width="20%">Action</th></tr>
<?php
while($r=mysql_fetch_array($s))
{
	 $b_id=$r['b_id'];
	
	 $cid=$r['cat_id'];
	 
	 
	   
?>
 
    <tr height="35">
      
      <td><?php echo  $r['p_na'];?></td>
    <?php
    $sq=mysql_query("select * from brand where b_id='$b_id' and cat_id='$cid'");   
	while($rq=mysql_fetch_array($sq))
{
	$bna= $rq['b_name'];
	//$cid=$rq['b_id'];
	?>
		<td><?php echo $bna;?></td>
        
    <?php
	 $sq1=mysql_query("select * from category where cat_id='$cid'");   
	while($rq1=mysql_fetch_array($sq1))
{
	$cna= $rq1['cat_name'];
	//$cid=$rq['b_id'];
	?>
		<td><?php echo $cna;?></td>
<?php	
}
?>
        
        <td><a href="adminhome.php?view=update_products1&id=<?php echo $r['p_id'];?>&bna=<?php echo $bna;?>&cna=<?php echo $cna;?>">Edit</a></td>
        
              </tr>
      
<?php
}
}
?>
  </table>
  </form>
 </body>
 </html>