 
   	    <h2 align="right">Create Categories&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="adminhome.php?view=edit_category"><input name="" type="button" value="Update"></a>&nbsp;&nbsp;<a href="adminhome.php?view=delete_category"><input name="" type="button" value="Delete"></a></h2>
<?php
session_start();
$username=$_SESSION['username'];
include_once("../connect/conn.php");
if($_POST['submit'])
{

 $a=$_POST['name'];

mysql_query("insert into category values('','$a')");
echo "<script>alert('Category Added!')</script>";

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WCMS</title>
<script type="text/javascript" src="../jscript/gen_validatorv31.js"></script>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
 <center> <table width="531" height="180" border="0">
    <tr>
      <td width="246">Category Name</td>
      <td width="275"><input type="text" name="name" id="name" /></td>
    </tr>
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
 frmvalidator.addValidation("name","req","Please Enter the Category Name!");

 </script>