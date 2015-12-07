<?php
	require_once 'web-config.php';
	$db = new mysqli($dbserver, $dbusername, $dbpass, $dbname);
	if ($db->connect_error)
		die("Nepodaøilo se pøipojit k databázi: " . $db->connect_error);
	$db->set_charset('latin2');
?>
