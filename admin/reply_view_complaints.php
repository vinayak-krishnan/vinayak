<html>
<head>

</head>
<body>
 <div class="templatemo_box">
   <h2 align="right"></h2>
   <h2 align="center">Assign Complaint to Service Manager</h2>
<?php
include_once("../connect/conn.php");
$comp_id=$_REQUEST['comp_id'];
$cid=$_REQUEST['cat_id'];
$bid=$_REQUEST['b_id'];
$pid=$_REQUEST['p_id'];
 $s1=mysql_query("select * from complaints where co_id='$comp_id'") or die(mysql_error());

?>

 <form action="" method="post">
 <br><br><br>
  <table width="60%" border="0" align="center">
  
  <?php
while($r=mysql_fetch_array($s1))
{
	
$a=$r['c_from'];	
$b=$r['to'];	
$c=$r['cat_id'];	
$d=$r['b_id'];	
$e=$r['p_id'];
$f=$r['title'];	
$g=$r['desc'];	
 $h=$r['c_date'];
$st=$r['c_status'];	
$solv_mgr=$r['solv_mgr']; 	
$solv_ex=$r['solv_ex'];

?>
<tr>
    <td width="32%" height="36"><em>From</em></td>
      <td width="48%"><?php echo $a;?></td> <td width="20%" height="36"><a href="adminhome.php?view=view_complaints"><input type="button" value="Back"></a></td></tr>
   <tr>     <td height="34"><em>Title</em></td>
      <td><?php echo $f;?></td></tr>
    <tr>    <td height="37"><em>Description</em></td>
      <td><?php echo $g;?></td></tr>
     <tr>  <td height="39"><em>Category</em></td>
        <?php  
		 $s14=mysql_query("select * from category where cat_id='$c'") or die(mysql_error());     
    	 while($r14=mysql_fetch_array($s14))
			{
				 $cna3=$r14['cat_name'];
			?>    
	<td><?php echo $cna3;?></td>    
   			<?php
    		}
    ?>
</tr>
<tr>
       <td height="29"><em>Brand</em></td>
        <?php  
		 $s13=mysql_query("select * from brand where b_id='$d' and cat_id='$c'") or die(mysql_error());     
    	 while($r13=mysql_fetch_array($s13))
			{
			 $cna2=$r13['b_name'];
			?>    
	<td><?php echo $cna2;?></td>   
   			<?php
    		}
    ?>
    </tr><tr> <td height="37"><em>Product</em></td>  
       
       <?php  
		 $s12=mysql_query("select * from product where p_id='$e' and b_id='$d' and cat_id='$c'") or die(mysql_error());     
    	 while($r12=mysql_fetch_array($s12))
			{
				$cna=$r12['p_na'];
			?>    
	<td><?php echo $cna;?></td>   
   			<?php
    		}
    ?>
       
             </tr><tr>
       <td height="29"><em>Date</em></td>  
      <td><?php echo $h;?></td></tr>
      
      
      
      <tr>
 <?php
 if(($solv_mgr!=0)&&($solv_ex!=0))
 {
	 ?>     
       <tr>        
   <td height="34" colspan="2" align="left">            
 <?php

 if($st=='re_send')
 {
 echo "<center><font color=#FF00FF>This complaint is Solved</font></center>";
 }
 elseif($st=='mgr_check')
 {
 
 ?>           
  

   <select name="ex1" style="width:200px" ><option value="">select</option>
  
   <option value="re_send">completed</option>
   
   
   
   
  </select>
  
&nbsp;<input type="submit" value="Completed" name="complete">
    <?php
 }
  
  elseif($st=='ex_complet')
  {
	  echo "This complaint is pending from Executive";
	  
  }
  elseif($st=='0')
  {
	   echo "This complaint is Pending ";
  }
  elseif($st=='ex_incomplete')
  {?>
	  <select name="ex1" style="width:200px" ><option value="">select</option>
  
   <option value="not_working">Not Working</option>
   
   
   
   
  </select>
  
&nbsp;<input type="submit" value="Not Working" name="complete">
<?php  }
  
  ?> 
  
    </td>        
     
     
      </tr>
      
   <?php
 }
 else if(($solv_mgr!=0)&&($solv_ex==0))
{
echo "<tr><td colspan=2><font color=#0000FF size=+1>Not assigned to Executive</font></td></tr>";
             
				
}

 else
 {
	 ?>
      
      
<tr>        
   <td height="34" colspan="2" align="left">
  

   
   <select name="mgr" style="width:200px" ><option value="">select</option>
   
   <?php  
		$sql=mysql_query("select * from service_mgr where cat_id='$cid' and mgr_sta='1'") or die(mysql_error());     
    	 while($r15=mysql_fetch_array($sql))
			{
				 $mg=$r15['mgr_name'];
				 $mgid=$r15['mgr_id'];
			?>    
   			<option value="<?php echo $mgid;?> "><?php echo $mg;?> (<?php $g=mysql_query("select * from complaints where solv_mgr='$mgid'");
$count=mysql_num_rows($g);
echo $count;

?>) </option> 
   			<?php
    		}
    ?>
   
   
   
  </select>
  
&nbsp;<input type="submit" value="Assign Manager" name="assign">
  
  
    </td> 
   
    
    </tr>
    <?php
 }
 ?>
    <tr> <td colspan="2" align="center"><input type="submit" value="Send Report" name="send">
</td></tr>
    


<?php
}

?>
  </table>
 </form> 
 
 <?php
 if($_POST['assign'])
 {
	 	$mgr_id=$_POST['mgr']; 
	 	$s231=mysql_query("select * from  complaints where co_id='$comp_id' and solv_mgr='$mgr_id'") or die(mysql_error());
	if((mysql_num_rows($s231))>0)
	{
		echo"<script>alert('Already Assigned!')</script>";	

	}

	mysql_query("update complaints set solv_mgr='$mgr_id' where co_id='$comp_id'") or die(mysql_error());
	
	
 }
 
else if($_POST['send'])
 {
	
	
	$s23=mysql_query("select * from  complaints where co_id='$comp_id'") or die(mysql_error());
	/*if((mysql_num_rows($s23))>=0)
	{
		echo"<script>alert('Report Already Send')</script>";	
	echo"<script>window.location='adminhome.php?view=report_complaints1&to=$a&from=$b&co_id=$comp_id'</script>";
	}
	else
	{
	*/
//	
	echo"<script>window.location='adminhome.php?view=report_complaints1&to=$a&from=$b&co_id=$comp_id'</script>";
	//}
	
	
 }
  else if($_POST['complete'])
 {
	 	$ex1=$_POST['ex1']; 
		
$d=date("Y-m-d");	 
$n="update complaints set c_status='$ex1',check_date='$d' where co_id='$comp_id'";
	mysql_query($n)or die(mysql_error());
	
 }
 
 ?>
  </div>
   </body>
  </html>