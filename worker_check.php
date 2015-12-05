<?php
	if( !isset($_SESSION['worker']) or $_SESSION['worker'] == "")
	{
		echo("Worker neni prihlasen.");
	}
?>
