
<?php
session_start();
$user=$_SESSION['username'];
$name=$_REQUEST['name'];
include_once("../connect/conn.php");
$m=$_REQUEST['month'];
 $n=$_REQUEST['year'];
 $mg_id=$_REQUEST['mg_id'];
 $ex_id=$_REQUEST['ex_id'];
  
   
  $x=mysql_query("select * from service_mgr where mgr_id='$mg_id'") or die(mysql_error());
$y=mysql_fetch_array($x);
$mgna=$y['mgr_name'];


$x1=mysql_query("select * from service_exec where ex_id='$ex_id' and mgr_id='$mg_id'") or die(mysql_error());
$y1=mysql_fetch_array($x1);
$exna=$y1['ex_na'];

$df="SELECT * FROM complaints where month(check_date)='$m' and year(check_date)='$n' and solv_mgr='$mg_id' and solv_ex='$ex_id'";
 $a=mysql_query($df) or die("INSERT ERROR".mysql_error());
if(mysql_num_rows($a)<=0)
 {
	echo "<script>alert('No Value Found!')</script>";
	echo"<script>window.location='adminhome.php?view=amonthly'</script>";
 }
?>
<div class="templatemo_box">
   	    <h2 align="right">Monthly WorkFlow&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="adminhome.php?view=amonthly"><input name="" type="button" value="Back"></a></h2>
<table border="0" width="99%" bgcolor="#FFE6F2">
<tr>
  <th width="8%" height="28">Month:</th><th width="10%"><font color="#FF0000"><?php echo $m;?></font></th>
<th width="8%">Year:</th><th width="10%"><font color="#FF0000"><?php echo $n;?></font></th>
<th width="16%">Manager Name:</th><th width="10%"><font color="#FF0000"><?php echo $mgna;?></font></th>
<th width="19%">Executive Name:</th><th width="19%"><font color="#FF0000"><?php echo $exna;?></font></th>
</tr>
</table>
<br>
<table border="1" width="100%" style="text-align:center">
<tr>
  <th height="40">Title</th>
  <th>Complaint</th>
  <th>Complaint Date </th>
  <th>Category</th>
  <th>Brand</th>
  <th>Product</th></tr>
<?php
while($r=mysql_fetch_array($a))
 {
  $c=$r['title'];
  $d=$r['desc'];
  $e=$r['c_date'];
  $c_id=$r['cat_id'];
  $b_id=$r['b_id'];
  $p_id=$r['p_id'];
 $sa1=mysql_query("select * from category where cat_id='$c_id'") or die(mysql_error());
while($ra1=mysql_fetch_array($sa1))
{
$cna=$ra1['cat_name'];
 }   
$sa2=mysql_query("select * from brand where cat_id='$c_id' and b_id='$b_id'") or die(mysql_error());
while($ra2=mysql_fetch_array($sa2))
{
$bna=$ra2['b_name'];
 }   
 	 	
$sa3=mysql_query("select * from product where cat_id='$c_id' and b_id='$b_id' and p_id='$p_id'") or die(mysql_error());
while($ra3=mysql_fetch_array($sa3))
{
	
$pna=$ra3['p_na'];
 } 
  		
 
	?>
<tr  height="40">
<td><?php echo $c;?></td>
<td><?php echo $d;?></td>
<td><?php echo $e;?></td>


<td><?php echo $cna;?></td>
<td><?php echo $bna;?></td>
<td><?php echo $pna;?></td>
</tr>
<?php
 }
?>
</table>
</div>