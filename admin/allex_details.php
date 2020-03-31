<?php
session_start();
$username=$_SESSION['username'];
$id=$_REQUEST['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">

.b{width:100px;height:100px;float:left;margin-top:35px;margin-left:20px}

</style>
</head>

<body>
<div align="center" style="color:#F09; font:italic" > All Executives &nbsp;&nbsp;&nbsp; <a href="adminhome.php?view=all_mgr"><font color="#FF66CC" ><i>back</a></i></font></div>
<?php
 $s1="select * from service_exec where (mgr_id='$id' and ex_sta='1')";
 $s11=mysql_query($s1) or die(mysql_error());
while($r=mysql_fetch_array($s11))
{
	
 $a=$r['ex_na'];	
 $b=$r['ex_id'];
?>

<div class=b><a href="adminhome.php?view=allcomp_details&ex_id=<?php echo $b;?>&mgr_id=<?php echo $id;?>&a=<?php echo $a;?>" ><img src="../images/exec.jpeg" width="114%" height="134" /></a><br />&nbsp;
<?php echo $a;?> (<?php $g=mysql_query("select * from complaints where solv_mgr='$id' and solv_ex='$b'");
$count=mysql_num_rows($g);
echo $count;

?>)
</div>
&nbsp;&nbsp;

<?php
}

?>


</body>
</html>