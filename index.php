<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2">
	<title>Řetězec multikin</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<!-- TODO:
 - tady: 3-5 clanku o novejch filmech, co se vysilaji - slo by selectem
 - bordery tlacitkum
 - udelat registraci
 - pridat do login stranky prihlaseni pro zamenstnance
 -
-->
<body>
	<?php include 'header.php'; ?>
	<div class="content">
		<?php require_once 'db_connection.php'; ?>
		<?php
			$sql = ";";
			if ($db->query($sql) === TRUE)
				echo("DEBUG: Vloženo");
			else
			    echo ("DEBUG: Chyba od sql: " . $db->error);
		?>
	</div>
</body>
</html>
