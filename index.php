<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
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
			$sql = "INSERT INTO Zanr (nazev) VALUES ('Porno')";
			if ($db->query($sql) === TRUE)
				echo("DEBUG: Vlozeno");
			else
			    echo ("DEBUG: Chyba od sql: " . $db->error);
		?>
	</div>
</body>
</html>
