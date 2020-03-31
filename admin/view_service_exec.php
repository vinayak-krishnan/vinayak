
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

$id=$_REQUEST['id'];


error_reporting("NOTICE");
if($_POST['sub'])
{
$a=$_POST['name'];	
$c=$_POST['gender'];
$b=$_POST['address'];	
 
$g=$_POST['phone'];	
$h=$_POST['mail'];	
 $un=$_POST['una'];

 $j=$_POST['cat'];



 mysql_query("update service_exec set mgr_name='$a',mgr_gender='$c',mgr_add='$b',mgr_phone='$g',mgr_email='$h' where mgr_id='$id'");



echo"<script>alert('updation Successfull')</script>";	
echo"<script>window.location='adminhome.php?view=manage_service_exec'</script>";

}


?>


</head>
<body>
 <div class="templatemo_box">
   	    <h2 align="center">Update Service Executive</h2>
        




  

<?php

 $s1=mysql_query("select * from service_exec where ex_id='$id'");	
while($r=mysql_fetch_array($s1))
{
	
$a=$r['ex_na'];	
 $b=$r['ex_g'];	

$c=$r['ex_add'];	
	
$e=$r['ex_phn'];
$f=$r['ex_mail'];	
$g=$r['ex_una'];
	
$i=$r['mgr_id'];

$h=$r['ex_sta'];

	

?>


<form action="" method="post" name="form1" id="form1">
 <center> <table width="515" height="441" border="0">
    <tr>
      <td width="281">Name</td>
      <td width="218"><input type="text" name="name" id="name" size="40" value="<?php echo $a; ?>"></td>
    </tr>
    <tr>
      <td height="99">Address</td>
      <td><textarea name="address" id="address" cols="30" rows="5" size="40" ><?php echo $c; ?></textarea></td>
    </tr>
    <tr>
      <td>Gender</td>
     <td>
         	<input type="text" name="gender" value="<?php echo $b; ?>" id="gender"  />
                   
         
            
         </td>
    </tr>
   
   
    <tr>
      <td>Phone</td>
      <td><input type="text" name="phone" id="phone" size="40"  value="<?php echo $e; ?>"></td>
    </tr>
    <tr>
      <td>Category</td>
     
	    <?php

$s11=mysql_query("select * from service_mgr WHERE mgr_id='$i'" ) or die(mysql_error());
while($r11=mysql_fetch_array($s11))
{
$rs=$r11['mgr_name'];
			
?>	 <td> <input type="text" name="cat" value="<?php echo $rs;?>" readonly="readonly" />
	  
<?php } ?>  
	   </td>
    </tr>
    <tr>
      <td>Mail</td>
      <td><input type="text" name="mail" id="mail" size="40" value="<?php echo $f; ?>"></td>
    </tr>
     <tr>
      <td>Username</td>
      <td><input type="text" name="una" id="una" size="40"  value="<?php echo $g; ?>" readonly="readonly"></td>
    </tr>
   
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="sub" id="button" value="Submit" onClick="return DoCustomValidation('form1')"></td>
    </tr>
  </table>
  </center>
</form>
<?php 
}
?>
</div>

<script language="javascript" type="text/javascript">
 var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("name","req","Please Enter Name!");
  var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("address","req","Please Enter Address!");
  var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("gender","req","Please Specify Gender!");
  var frmvalidator = new Validator("form1");
   frmvalidator.addValidation("phone","req","Please Enter Phone Number!");
  var frmvalidator = new Validator("form1");
  frmvalidator.addValidation("phone","num","Enter Numbers Only for Phone Number!");
  var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("phone","maxlen=12","Maximum Length 12");
  var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("phone","minlen=10","Minimum Length 10"); 
 
 var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("mail","req","Enter Email Id!");
  var frmvalidator = new Validator("form1");
 frmvalidator.addValidation("mail","email","Enter Valid Email!");
  
 
 
 
 </script>
</body>
</html>