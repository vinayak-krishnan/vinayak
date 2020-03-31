<script type="text/javascript" src="../jq/jquery-1.4.js"></script>
<script type="text/javascript" src="../jscript/gen_validatorv31.js"></script>
 
   	    <h2 align="right">Add Products&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="adminhome.php?view=delete_products"><input name="" type="button" value="Delete"></a>&nbsp;&nbsp;<a href="adminhome.php?view=update_products"><input name="" type="button" value="Update"></a></h2>
<?php
session_start();
 $name=$_SESSION['username'];
include_once("../connect/conn.php");
if($_POST['submit'])
{

 $c_na=$_POST['n1'];
 $b_na=$_POST['pdt'];
 $pna=$_POST['bna'];

mysql_query("insert into product values('','$pna','$b_na','$c_na')");
echo "<script>alert('Product Added!!!')</script>";
echo"<script>window.location='adminhome.php?view=add_products'</script>";


}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>News Bulletin</title>
<script type="text/javascript" src="../jscript/gen_validatorv31.js"></script>
</head>

<body>

<script type="text/javascript">
agencychk=function()
{
	var n1 = $("#n1").val();
	
	$.post("php/getdest.php",{ag:n1},function(pdt)
	{
		$(".anscatt").html(pdt);
	});
}
</script>
<form id="form1" name="form1" method="post" action="">
 <center> <table width="531" height="180" border="0">
    <tr>
      <td width="246">Category Name</td>
      <td width="275"><select name="n1" style="width:300px" onChange="agencychk();" id="n1" ><option value="">---SELECT---</option>
	    <?php

echo $s=mysql_query("select * from category") or die(mysql_error());
while($r=mysql_fetch_array($s))
{

			
?>	 
			 <option value="<?php echo $r['cat_id']; ?>"><?php echo $r['cat_name']; ?></option>
	  	
	  
<?php } ?>  
	   </select></td>
    </tr>
    <tr>
      <td width="246">Brand Name</td>
	  
      <td width="275"><select name="pdt" style="width:300px" id="pdt" class="anscatt"></select>
	     </tr>
    <tr>
      <td>Product Name</td><td><input type="text" name="bna" style="width:300px"/></td></tr>
    
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="button" value="Create" /></td>
    </tr>
  </table>
  </center>
</form>
</body>
</html>


<script  language="javascript" type="text/javascript">

var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("n1","req","Please Select the Category Name!");
 var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("pdt","req","Please Select the Brand Name!");

 var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("bna","req","Please Enter the Product Name!");

 </script>