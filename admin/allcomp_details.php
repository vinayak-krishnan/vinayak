<?php
session_start();
$ex_user=$_SESSION['username'];
$ex_id=$_REQUEST['ex_id'];
$mg_id=$_REQUEST['mgr_id'];
 $a=$_REQUEST['a'];
error_reporting("NOTICE");
include_once("../connect/conn.php");
?>
<html>
<body>
 <div class="templatemo_box">
   	    <h2 align="center">View Complaints From <font color=#FF0000><?php echo  $a;?> &nbsp;&nbsp;&nbsp;
            <div align="right"><a href="adminhome.php?view=allex_details&id=<?php echo $mg_id; ?>"><img src="../images/back.png"></a></div></font></h2>
<?php




$p=mysql_query("select * from complaints where solv_ex='$ex_id' and solv_mgr='$mg_id'") or die(mysql_error());

 

?>
  <table width="100%" border="0">
  <tr height="30" bgcolor="#CCCCCC">
    <th width="14%" height="48" align="center">Title</th>
    <th align="center" width="24%">Category Name</th><th width="23%" align="center">Brand Name</th><th width="17%" align="center">Product Name</th>
    <th colspan="3" align="center">More</th></tr>
  <?php
while($r=mysql_fetch_array($p))
{
	
$aa=$r['co_id'];		
	
$c=$r['cat_id'];	
$d=$r['b_id'];	
$e=$r['p_id'];
$f=$r['title'];	
$g=$r['desc'];	
 $h=$r['c_date'];	
 $st=$r['c_status'];


?>

    <tr align="center">
     
   <td height="30"><?php echo $f;?></td>
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
       
       
       <?php  
		 $s12=mysql_query("select * from product where p_id='$e' and b_id='$d' and cat_id='$c'") or die(mysql_error());     
    	 while($r12=mysql_fetch_array($s12))
			{
				$cna=$r12['p_na'];
			?>    
	  <td><?php echo $cna;?></td>   
      
      <td width="14%">
   			<?php
			}	
			
			
			if($st=='ex_complet'||$st=='mgr_check'||$st=='re_send')
			{
				?>
        
       
			<font color="#FF0000" size="+1">Completed</font>
			
    	 <?php	}
			else if($st=='0')
			{?>
            
			 <font color="#0000FF" size="+1">Pending</font>
              
              
             <?php 
			}
			else if($st=='ex_incomplete')
			{
				echo "<font color=#0000FF size=+1>Not Working</font>";
             
				
			}
			else if($st=='not_working')
			{
				echo "<font color=#FFCC33 size=+1>don't working</font>";
             
				
			}
			?>
            </td>
     <td width="8%"><a href="adminhome.php?view=ad_view_complaints&comp_id=<?php echo $aa;?>&cat_id=<?php echo $c;?>&b_id=<?php echo $d;?>&p_id=<?php echo $e;?>&mgr_id=<?php echo $mg_id;?>&ex_id=<?php echo $ex_id;?>">MORE</a></td>
     
     
     
     
    
     
   </tr>


<?php
}

?>
</table></form> 
  
 
  </div>
   </body>
  </html>