<script type="text/javascript" src="../jq/jquery-1.4.js"></script>
<div class="templatemo_box">
   	    <h2 align="right">Daily WorkFlow&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="adminhome.php?view=ad_workflow"><input name="" type="button" value="Back"></a></h2>
<?php
session_start();
 $user=$_SESSION['username'];
$name=$_REQUEST['name'];
include_once("../connect/conn.php");
$d=date("Y-m-d");
if (isset($_POST['submit']))
{
$s=$_POST['CheckinDate'];
$mg_id=$_POST['n1'];
$ex_id=$_POST['ex1'];
echo"<script>window.location='adminhome.php?view=adaily1&date=$s&mg_id=$mg_id&ex_id=$ex_id'</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="../jscript/gen_validatorv31.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="../calendar/calendar.css" media="screen"></LINK>
<SCRIPT type="text/javascript" src="../calendar/calendar.js"></script>
<script type="text/javascript" src="../jscript/gen_validatorv31.js"></script>
</head>

<body>
<script type="text/javascript">
agencychk=function()
{
	
	var n1 = $("#n1").val();
	
	$.post("php/s_mgr.php",{ag:n1},function(ex1)
	{
		
		$(".ansmgr").html(ex1);
	});
}
</script>
<form id="form1" name="form1" method="post" action="">
 <center> <table width="525" height="246" border="0">
    <tr>
      <td width="233">Date</td>
      <td width="276"><span class="style2"><input name="CheckinDate"  style="width:300px" type="text" id="CheckinDate"  class="textbox_slim" size="20" maxlength="13"   onClick="displayCalendar(document.getElementById('CheckinDate'),'yyyy-mm-dd',this); " />
    </span></td>
    </tr>
    <tr>
      <td>Manager Name</td>
      <td><select name="n1" style="width:300px" onChange="agencychk();" id="n1" ><option value="">---SELECT---</option>
	    <?php

echo $s=mysql_query("select * from service_mgr") or die(mysql_error());
while($r=mysql_fetch_array($s))
{

			
?>	 
			 <option value="<?php echo $r['mgr_id']; ?>"><?php echo $r['mgr_name']; ?></option>
	  	
	  
<?php } ?>  
	   </select></td>
    </tr>
    <tr>
      <td width="246">Service Executive</td>
	  
      <td width="275"><select name="exe" style="width:300px" id="exe" class="ansmgr"></select></td>
	     </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="button" value="Submit" /></td>
    </tr>
  </table>
  </center>
</form>
</body>
</html>
</div>
<script  language="javascript" type="text/javascript">
var frmvalidator = new Validator("form1");
   frmvalidator.addValidation("CheckinDate","req","Please Enter the Date!");
   var frmvalidator = new Validator("form1");
   frmvalidator.addValidation("n1","req","Please Select Manager!");
   var frmvalidator = new Validator("form1");
   frmvalidator.addValidation("exe","req","Please Select Executive!");
 </script>