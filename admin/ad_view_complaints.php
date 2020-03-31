<?php
session_start();
$username=$_SESSION['username'];
?><html>
<head>

</head>
<body>
<div class="templatemo_box">
 <h2 align="right"></h2>
   <h2 align="center">View  Complaints 
     <?php
include_once("../connect/conn.php");
$comp_id=$_REQUEST['comp_id'];
$ex_id=$_REQUEST['ex_id'];
$cid=$_REQUEST['cat_id'];
$mgr_id=$_REQUEST['mgr_id'];
$bid=$_REQUEST['b_id'];
$pid=$_REQUEST['p_id'];
 $s1=mysql_query("select * from complaints where co_id='$comp_id'") or die(mysql_error());

?>
 </h2>

     <br>
   <table width="60%" border="0" align="center">
       
       <?php
while($r=mysql_fetch_array($s1))
{
	
$a=$r['from'];	
$b=$r['to'];	
$c=$r['cat_id'];	
$d=$r['b_id'];	
$e=$r['p_id'];
$f=$r['title'];	
$g=$r['desc'];	
 $h=$r['c_date'];
 $st=$r['c_status'];
 	


?>
  <tr>
    <td width="20%" height="36"><a href="adminhome.php?view=allcomp_details&ex_id=<?php echo $ex_id;?>&mgr_id=<?php echo $mgr_id;?>"><img src="../images/back.png"></a></td></tr>
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
       
             </tr>
  
  
 <tr>        
   <td height="34" colspan="2" align="left">            
 <?php
 if($st=='ex_complet'||$st=='mgr_check'||$st=='re_send')
 {
 echo "<center><font color=#FF00FF>This Complaint is Solved!</font></center>";
 }
 else
 {
 
  echo "<center><font color=#FF00FF>Pending!</font></center>";

 }
  
  ?> 
  
    </td> 
   
 
  
    </tr>
    
    


<?php
}

?>
</table>

 
  </div>
   </body>
  </html>