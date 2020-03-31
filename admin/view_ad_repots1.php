<div class="templatemo_box">
   	    <h2 align="center">View Reports</h2>
<?php
session_start();
$username=$_SESSION['username'];

include_once("../connect/conn.php");
$id=$_REQUEST['id1'];

$s=mysql_query("select * from co_report where r_id='$id'");
$r=mysql_fetch_array($s);




?>

<form name="form1" method="post" action="">
 <center> <table width="600" height="272" border="0">
  <tr><td colspan="2"> <a href="adminhome.php?view=view_ad_repots"><img src="../images/back.png" /></a></tr>
    <tr><th width="297" height="47">From</th>
      <td width="293" height="47"><input name="" type="text" value="<?php echo $r['re_from'];?>" readonly="readonly" style="size:30"/>
    </a></td></tr>
      
     <tr>
      <th height="47">Subject</th>
      <td><input name="" type="text" value="<?php echo $r['re_title'];?>" readonly="readonly" style="size:30"/></td></tr>
     
       <tr><th>Message</th>
        <td><textarea name="area" cols="35" rows="5" readonly="readonly" style="size:30"><?php echo $r['report_msg'];?></textarea></td>
          </tr>
          <!--
            <tr><th height="35"></th>
      <td height="35"><a href="adminhome.php?view=view_ad_repots"><input name="sub" type="button" value="back"></a></td></tr>-->
     </table>
    </center>
</form>
</div>