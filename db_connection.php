<?php
	require_once '../web-config.php';

	$db = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error)
		die("Nepodařilo se připojit k databázi: " . $conn->connect_error);

	echo ("DEBUG: Databáze úspěšně připojena.</br>");
?>
