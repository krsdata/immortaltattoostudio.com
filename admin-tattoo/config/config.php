<?php
//print_r($_SERVER); die;
ob_start(); 
error_reporting(E_ERROR | E_PARSE);
session_start();
//$_SESSION['userLanguage'] = 'japanese';	
	/*==============LOCAL START========================*/
	define('HOST_NAME','localhost');
	define('USER_NAME','immortal_user');
	define('PASSWORD','@123!user@');
	define('DATABASE_NAME','immortal_db'); 
	
	define('ABS_ROOT_PATH','/home/immortaltattoo/public_html/admin-tattoo/');
	define('SITE_NAME','Immortal tatto studio');
	define('SITE_URL','http://immortaltattoostudio.com/admin-tattoo/');
	define('REQUEST_URL',$_SERVER['PHP_SELF'].'?repp='.$_GET['repp'].'&page='.$_GET['page'].'&search='.$_GET['search']);
    define('DEF_QRY_STR','?repp='.$_GET['repp'].'&page='.$_GET['page'].'&search='.$_GET['search']);
	
	/*==============LOCAL END========================*/
	
	 
	/*==============LIVE END========================*/
	
	require_once(ABS_ROOT_PATH.'config/dbConn.php');
	require_once(ABS_ROOT_PATH.'config/dataTable.php');
	require_once(ABS_ROOT_PATH."classes/function.php");
	$obj = new myFunction();
?>