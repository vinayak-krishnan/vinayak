<div class="templatemo_box"><br /><br />
<a href="adminhome.php?view=view_complaints"><input type="button" value="Back"></a>
   	    <h2 align="center">Send Report
   	      <?php
include_once("../connect/conn.php");
session_start();
$username=$_SESSION['username'];
$comp_id=$_REQUEST['co_id'];
$to=$_REQUEST['to'];
$from=$_REQUEST['from'];


$s123=mysql_query("select * from complaints where co_id='$comp_id'") or die(mysql_error());
$r=mysql_fetch_array($s123);
$tit=$r['title'];



if($_POST['submit'])
{
$a=$_POST['from'];	
$b=$_POST['tos'];	
$c=$_POST['subject'];	
$d=$_POST['report'];	


 mysql_query("update complaints set report_send='send' where co_id='$comp_id'") or die(mysql_error()); 
mysql_query("insert into co_report values('','admin','$b','$c','$d','$comp_id')");

echo"<script>alert('report Send to $b')</script>";	
echo"<script>window.location='adminhome.php?view=view_complaints'</script>";
}

$s231=mysql_query("select * from  co_report where co_id='$comp_id'") or die(mysql_error());
$cnt=mysql_num_rows($s231);
	if(($cnt)>0)
	{
		echo "<center>";
		echo "<font color=blue>Already&nbsp;&nbsp; </font>"."<font color=red size=4>&nbsp;&nbsp;".$cnt."</font>&nbsp;&nbsp;"."&nbsp;&nbsp;<font color=blue>reports are send</font>";	
echo "</center>";
	}


?>
          <script type="text/javascript" src="../jscript/gen_validatorv31.js"></script>
        </h2>
<form name="form1" method="post" action="">
   	      <center><table width="569" height="312" border="0">
    <tr>
      <td width="264">From</td>
      <td width="340"><input type="text" name="from" id="from" style="width:252px" value="<?php echo $username;?>" readonly="readonly"></td>
    </tr>
    <tr>
      <td height="55">To</td>
      <td><input type="text" name="tos" id="tos" value="<?php echo $to;?>" readonly="readonly" style="width:252px" /></td>
    </tr>
    <tr>
      <td>Subject</td>
      <td><input type="text" name="subject" id="subject" style="width:252px"  value="<?php echo "reply"." :".$tit;?>"/></td>
    </tr>
    <tr>
      <td height="110">Report</td>
      <td><textarea name="report" id="report" cols="30" rows="5"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="button" value="Submit"></td>
    </tr>
  </table>
  </center>
</form>
</div>


<script  language="javascript" type="text/javascript">
 var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("from","req","Please enter the from address");
   var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("subject","req","Please enter the subject");
      var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("report","req","Enter the description");
 </script>