
<script type="text/javascript" src="../jscript/gen_validatorv31.js"></script>
<script type="text/javascript" src="../jq/jquery-1.4.js"></script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>complaint management system</title>



<?php
session_start();
 $name=$_SESSION['username'];
include_once("../connect/conn.php");session_start();

error_reporting("NOTICE");
if($_POST['sub'])
{
$a=$_POST['name'];	
$c=$_POST['gender'];
$b=$_POST['address'];	
 $e=$_POST['state'];
$g=$_POST['phone'];	
$h=$_POST['mail'];	
 $un=$_POST['una'];
$i=$_POST['pass'];
 $j=$_POST['cat'];

 $s=mysql_query("select * from login where username='$un'");
if((mysql_num_rows($s))>0)
{
echo"<script>alert('Username Already Exists')</script>";	
echo"<script>window.location='adminhome.php?view=add_service_exec'</script>";
}

	
else
{
 mysql_query("insert into service_exec values('','$a','$c','$b','$g','$h','$un','$i','$j','1')");

mysql_query("insert into login values('','$un','$i','service executive','1')");

echo"<script>alert('Registration Successfull')</script>";	
echo"<script>window.location='adminhome.php?view=add_service_exec'</script>";
}

}


?>

<script type="text/javascript" src="../jscript/gen_validatorv31.js"></script>


</head>
<body>
 <div class="templatemo_box">
   	    <h2 align="center">Add Service Executives</h2>

<form action="" method="post" name="form1" id="form1">
 <center> <table width="515" height="441" border="0">
    <tr>
      <td width="281">Name</td>
      <td width="218"><input type="text" name="name" id="name" size="40"></td>
    </tr>
    <tr>
      <td height="99">Address</td>
      <td><textarea name="address" id="address" cols="30" rows="5" size="40"></textarea></td>
    </tr>
    <tr>
      <td>Gender</td>
     <td>
         	<input type="radio" name="gender" value="male" id="gender" checked="checked" />
            Male
            <input type="radio" name="gender" value="female" id="gender" />
           Female        
         
            
         </td>
    </tr>
   
   
    <tr>
      <td>Phone</td>
      <td><input type="text" name="phone" id="phone" size="40" ></td>
    </tr>
    <tr>
      <td>Service Manager</td>
      <td><select name="cat" style="width:270px"  id="cat" ><option value="">---SELECT---</option>
	    <?php

$s=mysql_query("select * from service_mgr where mgr_sta='1'") or die(mysql_error());
while($r=mysql_fetch_array($s))
{
$rs=$r['mgr_name'];
			
?>	 
			 <option value="<?php echo $r['mgr_id']; ?>"><?php echo $r['mgr_name']; ?></option>
	  	
	  
<?php } ?>  
	   </select></td>
    </tr>
    <tr>
      <td>Mail</td>
      <td><input type="text" name="mail" id="mail" size="40"></td>
    </tr>
     <tr>
      <td>Username</td>
      <td><input type="text" name="una" id="una" size="40"></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" name="pass" id="pass" size="40"></td>
    </tr>
   
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="sub" id="button" value="Submit" onClick="return DoCustomValidation('form1')"></td>
    </tr>
  </table>
  </center>
</form>
</div>

<script language="javascript" type="text/javascript">
 var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("name","req","Please enter Name!");
  var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("address","req","Please enter Address!");
  var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("gender","req","Please specify Gender!");
  var frmvalidator = new Validator("form1");
   frmvalidator.addValidation("phone","req","Please enter Phone Number!");
  var frmvalidator = new Validator("form1");
  frmvalidator.addValidation("phone","num","Enter Numbers Only for Phone Number!");
  var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("phone","maxlen=12","Maximum Length 12");
  var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("phone","minlen=10","minimum length 10"); 
 var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("cat","req","Select Service Manager!"); 
 var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("mail","req","Enter Email Id!");
  var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("mail","email","Enter Valid Email!");
  var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("una","req","Enter Username!");
 
  var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("pass","req","Enter Password!");
 
 
 
 </script>
</body>
</html>