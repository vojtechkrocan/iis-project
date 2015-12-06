<?php
	session_start();
	define("USER_RIGHTS", "1");
	define("WORKER_RIGHTS", "2");
	define("ADMIN_RIGHTS", "3");
	define("SYSTEM_USER_ID", "1");
	require_once 'db_connection.php';
	$_userLogged_ = false;
	$_userRights_ = 0;
	if( isset($_SESSION['user']) and $_SESSION['user'] != "" )
		$_userLogged_ = $_SESSION['user'];
	if( isset($_SESSION['rights']) and $_SESSION['rights'] != "")
		$_userRights_ = $_SESSION['rights'];
	include 'header.php';
?>
