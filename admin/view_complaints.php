<html>
<body>
 <div class="templatemo_box">
   	    <h2 align="center">View Complaints from Users</h2>
<?php
include_once("../connect/conn.php");

$comp_id=$_REQUEST['comp_id'];
$f=$_REQUEST['f'];
if($_REQUEST['f']='delete')
{
	mysql_query("delete  from complaints where co_id='$comp_id'") or die(mysql_error());

	
}




 $s1=mysql_query("select * from complaints") or die(mysql_error());

?>
  <table width="108%" border="0">
  <tr height="30" bgcolor="#CCCCCC" align="center"><th width="10%" height="43">Send From</th>
  <th width="11%">Title</th>
  <th width="15%">Category Name</th><th width="12%">Brand Name</th><th width="14%">Product Name</th><th width="13%">Date</th>
  <th colspan="3">More</th></tr>
  <?php
while($r=mysql_fetch_array($s1))
{
$aa=$r['co_id'];		
$a=$r['c_from'];	
$b=$r['to'];	
$c=$r['cat_id'];	
$d=$r['b_id'];	
$e=$r['p_id'];
$f=$r['title'];	
$g=$r['desc'];	
 $h=$r['c_date'];
 $solv_mgr=$r['solv_mgr'];	
 $st=$r['c_status'];
 $solv_ex=$r['solv_ex'];

?>

    <tr align="center">
      <td height="38"><?php echo $a;?></td>
   <td><?php echo $f;?></td>
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
   			<?php
    		}
    ?>
       
             
         
      <td><?php echo $h;?></td>
      
      
      
        <td width="18%">   <?php		
     
    
if(($solv_mgr!=0)&&($solv_ex!=0))
{
       
    
    
			if($st=='re_send')
			{
				?>
        
       
			<font color="#FF33CC" size="+1">Complete</font>
			
    	 <?php	}
		 else if($st=='mgr_check')
			{
				echo "<font color=#FF33C0 size=+1>Manager Checked</font>";
             
				
			}
			
			else if($st=='0')
			{
				echo "<font color=#9999CC size=+1>Pending</font>";
             
				
			}
			else if($st=='ex_complet')
			{
				echo "<font color=#FF0000 size=+1>Pending</font>";
             
				
			}
			
			else if($st=='ex_incomplete')
			{
				echo "<font color=#FFCC33 size=+1>Incomplete</font>";
             
				
			}
			else if($st=='not_working')
			{
				echo "<font color=#FFCC33 size=+1>Not Working</font>";
             
				
			}
}
else if(($solv_mgr!=0)&&($solv_ex==0))
{
echo "<font color=#0000FF size=+1>Not Assignsd to Executive</font>";
             
				
}

else 
{
echo "<font color=#0000FF size=+1>Not Assigned</font>";
             
				
}
			?></td>
        
        
        
        
        
        
        
        
     <td width="4%"><a href="adminhome.php?view=reply_view_complaints&comp_id=<?php echo $aa;?>&cat_id=<?php echo $c;?>&b_id=<?php echo $d;?>&p_id=<?php echo $e;?>"><image src="../images/more.png"></a></td>
     <td width="3%"><a href="adminhome.php?view=view_complaints&comp_id=<?php echo $aa;?>&f=delete"><image src="../images/drop.png"></a></td>

     
   </tr>


<?php
}

?>
</table></form> 
  
 
  </div>

   </body>
  </html>