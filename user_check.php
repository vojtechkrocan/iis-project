<?php
	if( !isset($_SESSION['user']) or $_SESSION['user'] == "")
	{
		echo("Nikdo neni prihlasen.");
	}
?>
