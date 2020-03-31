
<html>
<head>  <div class="templatemo_box">
   	    <h2 align="center">Update Category
   	      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="adminhome.php?view=edit_category"><input name="Input" type="button" value="Back" />
  </a></h2>
<?php
include_once("connect/conn.php");
$s=$_REQUEST['id'];

if($_POST['submit'])
{
 $a=$_POST['des'];	


mysql_query("update category set cat_name='$a' where cat_id='$s'");
echo"<script>alert('Updated Successfully')</script>";	
echo"<script>window.location='adminhome.php?view=edit_category'</script>";	
}

$c=mysql_query("select * from category where cat_id='$s'");
$r=mysql_fetch_array($c);
?>
<script type="text/javascript" src="../jscript/gen_validatorv31.js"></script>
</head>
<body>
<form name="form1" id="form1" method="post" action="">
 <center> <table width="550" height="286" border="0">
    <tr>
      <td>Category Name</td>
      <td><textarea name="des" id="des" cols="35" rows="5"><?php echo $r['cat_name'];?></textarea></td>
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
 frmvalidator.addValidation("des","req","Please Enter Category Name!");

 </script>