<script type="text/javascript" src="../jq/jquery-1.4.js"></script>
<script type="text/javascript" src="../jscript/gen_validatorv31.js"></script>
<html>
<head> <h2 align="center">Update Brand Details
   	      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="adminhome.php?view=update_products"><input name="Input" type="button" value="Back" />
  </a></h2>
<?php
include_once("connect/conn.php");
 $id=$_REQUEST['id'];
$bna=$_REQUEST['bna'];
$cna=$_REQUEST['cna'];
if($_POST['submit'])
{
  $c_na=$_POST['n1'];
 $b_na=$_POST['pdt'];
 $pna=$_POST['pname'];

 $ss="update product set p_na='$pna',b_id='$b_na',cat_id='$c_na' where p_id='$id'";
mysql_query($ss) or die(mysql_error());
echo"<script>alert('Updated Successfully')</script>";	
echo"<script>window.location='adminhome.php?view=update_products'</script>";	
}

$c=mysql_query("select * from product where p_id='$id'");
$r=mysql_fetch_array($c);
?>
<script type="text/javascript" src="../jscript/gen_validatorv31.js"></script>
<script type="text/javascript">
agencychk=function()
{
	var n1 = $("#n1").val();
	$.post("php/getdest1.php",{ag:n1},function(pdt)
	{
		$(".anscatt").html(pdt);
	});
}
</script>
</head>
<body>
<form name="form1" id="form1" method="post" action="">
 <center> <table width="550" height="219" border="0">
    <tr>
      <td width="189" height="144">Product Name</td>
      <td width="351"><textarea name="des" id="des" cols="35" rows="5"><?php echo $r['p_na'];?></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit" id="button" value="Update"></td>
    </tr>
    
  </table>
  </center>
</form>
</body>
</div>
<script  language="javascript" type="text/javascript">
 var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("des","req","Please enter Product Name!");

 </script>