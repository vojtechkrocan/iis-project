<?php
	require_once 'web-config.php';
	$db = new mysqli($dbserver, $dbusername, $dbpass, $dbname);
	if ($db->connect_error)
		die("Nepoda�ilo se p�ipojit k datab�zi: " . $db->connect_error);
	$db->set_charset('latin2');
?>
