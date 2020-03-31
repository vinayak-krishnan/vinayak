<?php

echo $n1=$_POST['ag'];
echo "<script>alert('safas')</script>";
echo "<option>...............select...................</option>";
include_once("../../connect/conn.php");
echo $s2="select * from service_exec where mgr_id='$n1'";

$res=mysql_query($s2);
while($r2=mysql_fetch_array($res))
{

$r3= $r2['ex_name'];
$r2=$r2['ex_id'];

?>
<option value="<?php echo $r2; ?>"><?php echo $r3; ?></option>
<?php
}
?>