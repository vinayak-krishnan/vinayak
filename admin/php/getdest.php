<?php

echo $n1=$_POST['ag'];
echo "<option>...............select...................</option>";
include_once("../../connect/conn.php");
echo $s2="select * from brand where cat_id='$n1'";

$res=mysql_query($s2);
while($r2=mysql_fetch_array($res))
{

$r3= $r2['b_name'];
$r2=$r2['b_id'];

?>
<option value="<?php echo $r2; ?>"><?php echo $r3; ?></option>
<?php
}
?>