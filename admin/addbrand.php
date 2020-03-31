 <div class="templatemo_box">
   	    <h2 align="right">Create Brand&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="adminhome.php?view=delete_brand"><input name="" type="button" value="Delete"></a>&nbsp;&nbsp;<a href="adminhome.php?view=edit_brand"><input name="" type="button" value="Update"></a></h2>
<?php
session_start();
 $name=$_SESSION['username'];
include_once("../connect/conn.php");
if($_POST['sub'])
{

 $c_na=$_POST['n1'];
 $b_na=$_POST['bna'];

mysql_query("insert into brand values('','$b_na','$c_na')") or die(mysql_error());
echo "<script>alert('Brand Succeesfully Added!')</script>";



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
<form id="form1" name="form1" method="post" action="">
 <center> <table width="531" height="180" border="0">
    <tr>
      <td width="246">Category Name</td>
      <td width="275"><select name="n1" id="n1" style="width:300px" ><option value="">---SELECT---</option>
	    <?php

echo $s=mysql_query("select * from category") or die(mysql_error());
while($r=mysql_fetch_array($s))
{

			
?>	 
			 <option value="<?php echo $r['cat_id']; ?>"><?php echo $r['cat_name']; ?></option>
	  	
	  
<?php } ?>  
	   </select></td>
    </tr>
    
    <tr><td>Brand Name</td><td><input type="text" name="bna" id="bna" style="width:300px"/></td></tr>
    
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="sub" id="button" value="Create" /></td>
    </tr>
  </table>
  </center>
</form>
</body>
</html>
</div>


<script  language="javascript" type="text/javascript">
 var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("n1","req","Select Category Name!");
 var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("bna","req","Enter Brand Name!");


 </script>