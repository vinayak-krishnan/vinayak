
<?php
session_start();
 $user=$_SESSION['username'];
$name=$_REQUEST['name'];

include_once("../connect/conn.php");
if (isset($_POST['submit']))
{
$m=$_POST['month'];
$y=$_POST['year'];
$mg_id=$_POST['n1'];
$ex_id=$_POST['ex1'];
echo"<script>window.location='adminhome.php?view=amonthly1&month=$m&year=$y&mg_id=$mg_id&ex_id=$ex_id'</script>";
}
?>
<script type="text/javascript" src="../jq/jquery-1.4.js"></script>
<div class="templatemo_box">
   	    <h2 align="right">Monthly WorkFlow&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="adminhome.php?view=ad_workflow"><input name="" type="button" value="Back"></a></h2>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="../jscript/gen_validatorv31.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
      <td>Enter Month</td>
       <td><select name="month" id="month"  style="width:300px">
	 <option value="">---SELECT---</option>
	 <option value="01">January</option>
	  <option value="02">February</option>
	   <option value="03">March</option> 
	   <option value="04">April</option>
	    <option value="05">May</option>
		 <option value="06">June</option> 
		 <option value="07">July</option>
		  <option value="08">August</option> 
		  <option value="09">September</option>
		   <option value="10">October</option>
		  <option value="11">November</option> 
		  <option value="12">December</option>
	 </select>
	 </td>
    </tr>
    <tr>
      <td>Enter Year</td>
      <td><select name="year" id="year"  style="width:300px">
	 <option value="">---SELECT---</option>
	 <option value="2001">2001</option>
	  <option value="2002">2002</option>
	   <option value="2003">2003</option> 
	   <option value="2004">2004</option>
	    <option value="2005">2005</option>
		 <option value="2006">2006</option> 
		 <option value="2007">2007</option>
		  <option value="2008">2008</option> 
		  <option value="2009">2009</option>
		   <option value="2010">2010</option>
		  <option value="2011">2011</option> 
		  <option value="2012">2012</option>
		  <option value="2013">2013</option>
          <option value="2014">2014</option>
		  <option value="2015">2015</option>
          <option value="2016">2016</option>
	 </select>
	 </td>
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
	  
      <td width="275"><select name="ex1" style="width:300px" id="ex1" class="ansmgr"></select></td>
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
   frmvalidator.addValidation("month","req","Please Select Month!");
   var frmvalidator = new Validator("form1");
   frmvalidator.addValidation("year","req","Please Select Year!");
   var frmvalidator = new Validator("form1");
   frmvalidator.addValidation("n1","req","Please Select Manager!");
   var frmvalidator = new Validator("form1");
   frmvalidator.addValidation("ex1","req","Please Select Executive!");
   
 </script>