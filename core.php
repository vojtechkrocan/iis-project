<?php
	session_start();
	define("USER_RIGHTS", "1");
	define("WORKER_RIGHTS", "2");
	define("ADMIN_RIGHTS", "3");
	define("SYSTEM_USER_ID", "1");
	require_once 'db_connection.php';
	$userLogged = false;
	$userRights = 0;
	if( isset($_SESSION['user']) and $_SESSION['user'] != "" )
		$userLogged = true;
	if( isset($_SESSION['rights']) and $_SESSION['rights'] != "")
		$userRights = $_SESSION['rights'];
	include 'header.php';
?>
