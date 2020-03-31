<?php

class ad_detail

{
	function ad_detail()
	{	
		switch($_REQUEST['view'])
		{			
		case'reg_users':	
		
		include_once("reg_users.php");
		break;
		case'manage_users':	
		
		include_once("manage_users.php");
		break;	
		
		case'view_ad_repots':			
		include_once("view_ad_repots.php");
		break;
		case'view_ad_repots1':			
		include_once("view_ad_repots1.php");
		break;
		case'a_view_feedback':			
		include_once("a_view_feedback.php");
		break;
		case'a_view_feedback1':			
		include_once("a_view_feedback1.php");
		break;
		
		
		
		case'category':			
		include_once("category.php");
		break;
		case'ad_workflow':			
		include_once("ad_workflow.php");
		break;		
		
		case'edit_category':			
		include_once("edit_category.php");
		break;
		case'edit_category1':			
		include_once("edit_category1.php");
		break;
		case'delete_category':			
		include_once("delete_category.php");
		break;
		
		
		
		case'addbrand':			
		include_once("addbrand.php");
		break;
		case'edit_brand':			
		include_once("edit_brand.php");
		break;
		case'update_brand1':			
		include_once("update_brand1.php");		
		break;
		case'delete_brand':			
		include_once("delete_brand.php");
		break;
		
		
		case'add_products':			
		include_once("add_products.php");
		break;
		case'update_products':			
		include_once("update_products.php");
		break;
		case'update_products1':			
		include_once("update_products1.php");
		break;
		case'delete_products':			
		include_once("delete_products.php");
		break;
		
		
		case'add_service_mgr':			
		include_once("add_service_mgr.php");
		break;
		case'view_service_mgr':			
		include_once("view_service_mgr.php");
		break;
		case'manage_service_mgr':			
		include_once("manage_service_mgr.php");
		break;
		
		
		
		case'add_service_exec':			
		include_once("add_service_exec.php");
		break;
		case'view_service_exec':			
		include_once("view_service_exec.php");
		break;
		case'manage_service_exec':			
		include_once("manage_service_exec.php");
		break;
		
		
		case'view_complaints':			
		include_once("view_complaints.php");
		break;
		case'view_service_exec':			
		include_once("view_service_exec.php");
		break;
		case'manage_service_exec':			
		include_once("manage_service_exec.php");
		break;
		
		case'reply_view_complaints':			
		include_once("reply_view_complaints.php");
		break;
		/*case'report_complaints':			
		include_once("report_complaints.php");
		break;*/
		case'report_complaints1':			
		include_once("report_complaints1.php");
		break;
		case'all_mgr':			
		include_once("all_mgr.php");
		break;
		case'allex_details':			
		include_once("allex_details.php");
		break;
		
		case'ad_view_complaints':			
		include_once("ad_view_complaints.php");
		break;
		case'allcomp_details':			
		include_once("allcomp_details.php");
		break;
		
		case'adaily':			
		include_once("adaily.php");
		break;
		case'adaily1':			
		include_once("adaily1.php");
		break;
		case'amonthly':			
		include_once("amonthly.php");
		break;
		case'amonthly1':			
		include_once("amonthly1.php");
		break;
		case'ayearly':			
		include_once("ayearly.php");
		break;
		case'ayearly1':			
		include_once("ayearly1.php");
		break;
		
        }
	}
     
 }
?>