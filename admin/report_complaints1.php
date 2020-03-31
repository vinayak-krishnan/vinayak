<?php
session_start();
$username=$_SESSION['username'];
?><html>
<head>
<script type="text/javascript" src="../jq/jquery-1.4.js"></script>
<script type="text/javascript"> 
$(document).ready(function(){
$(".flip").click(function(){
    $(".panel").slideToggle("slow");
  });
});
</script>
 
<style type="text/css"> 
div.panel,p.flip
{
margin:0px;
padding:3px;
text-align:center;
background:#e5eecc;
border:solid 1px #c3c3c3;
}
div.panel
{
height:120px;
display:none;
}
</style>
</head>

<body>
<br /><br />
<a href="adminhome.php?view=view_complaints"><input type="button" value="Back"></a>
   	    <h2 align="center">Send Report</h2>
<?php
include_once("../connect/conn.php");
session_start();
$username=$_SESSION['username'];
$comp_id=$_REQUEST['co_id'];
$to=$_REQUEST['to'];
$from=$_REQUEST['from'];





if($_POST['submit'])
{
$a=$_POST['from'];	
$b=$_POST['tos'];	
$c=$_POST['subject'];	
$d=$_POST['report'];	


 //mysql_query("update complaints set report_send='send' where co_id='$comp_id'") or die(mysql_error()); 
mysql_query("insert into co_report values('','admin','$b','$c','$d','$comp_id')");

echo"<script>alert('report Send to $b')</script>";	
echo"<script>window.location='adminhome.php?view=view_complaints'</script>";
}

?>

<?php
$se=mysql_query("select * from co_report where co_id='$comp_id' and re_to='admin'") or die(mysql_error());
while($re=mysql_fetch_array($se))
{
	$at=$re['re_to'];
	$af=$re['re_from'];
	$a1=$re['re_title'];
	$a2=$re['report_msg'];
?>
<font color="#000000">
<div class="panel">
<p>

<table border="0" width="100%" align="left">
<tr>
<td>To</td><td>:</td><td><?php echo $at;?></td></tr>
<tr>
<td>title</td><td>:</td><td><?php echo $a1;?></td></tr>
<tr><td>Description</td><td>:</td><td><?php echo $a2;?></td>
</tr>
</table> </p></div>   </font>        
<?php	
}	


$s231=mysql_query("select * from  co_report where co_id='$comp_id' and re_to='admin' ") or die(mysql_error());
$cnt=mysql_num_rows($s231);
	if(($cnt)>=0)
	{
		echo "<center>";
		echo "<font color=blue>Already&nbsp;&nbsp; </font>"."<font color=red size=4>&nbsp;&nbsp;".$cnt."</font>&nbsp;&nbsp;"."&nbsp;&nbsp;<font color=blue>reports are send</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	}      

	?>
<p class="flip">View them</p>


<?php		



$s123=mysql_query("select * from complaints where co_id='$comp_id'") or die(mysql_error());
$r=mysql_fetch_array($s123);
$tit=$r['title'];
	
?>



<script type="text/javascript" src="../jscript/gen_validatorv31.js"></script>
<form name="form1" method="post" action="">
  <center><table width="569" height="300" border="0">
    <tr>
      <td width="264">From</td>
      <td width="340"><input type="text" name="from" id="from" style="width:252px" value="<?php echo $username;?>" readonly="readonly"></td>
    </tr>
    <tr>
      <td>To</td>
      <td><input type="text" name="tos" id="tos" value="<?php echo $to;?>"readonly="readonly" style="width:252px" /></td>
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
</body>
</html>

<script  language="javascript" type="text/javascript">
 var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("from","req","Please Enter the From Address!");
   var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("subject","req","Please Enter the Subject!");
      var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("report","req","Enter the Description!");
 </script>