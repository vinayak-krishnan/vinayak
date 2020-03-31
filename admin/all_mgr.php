<?php
session_start();
$username=$_SESSION['username'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">

.b{width:150px;height:100px;float:left;margin-top:35px;margin-left:20px}

</style>
</head>

<body>
<div align="center" style="color:#F09; font:italic" > All Managers </div>
<?php
 $s1=mysql_query("select * from service_mgr where mgr_sta='1'");
while($r=mysql_fetch_array($s1))
{
	
$a=$r['mgr_name'];	
$b=$r['mgr_id'];
?>

<div class=b>
  <div align="center"><a href="adminhome.php?view=allex_details&id=<?php echo $b;?>" ><img src="../images/cgroup.jpeg" width="111%" height="164" /></a><br />&nbsp;
  <?php echo $a;?> (<?php $g=mysql_query("select * from complaints where solv_mgr='$b'");
$count=mysql_num_rows($g);
echo $count;

?>)
  </div>
</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
}

?>


</body>
</html>