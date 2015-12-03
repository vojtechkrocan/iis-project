<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
	<title>Øetìzec multikin</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<!-- TODO:
 - tady: 3-5 clanku o novejch filmech, co se vysilaji - slo by selectem
 - bordery tlacitkum
 - udelat registraci
 - pridat do login stranky prihlaseni pro zamenstnance
 - phpeeckem nainsertovat sedadla
-->
<body>
	<?php include 'header.php'; ?>
	<div class="content">
		<?php require_once 'db_connection.php'; ?>
		<?php
			$sql = "SELECT nazev, delka FROM Film";
			//$stmt = $db->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
			$result = $db->query($sql);
			if ($result->num_rows > 0)
			{
				while($row = $result->fetch_assoc())
				{
					echo("<div>");
					echo("Nazev filmu: " . $row["nazev"] . " | " . "Delka: " . $row["delka"]);
					echo("</div>");
				}
			}
			else
			    echo ("DEBUG: Chyba od sql: " . $db->error);
		?>
	</div>
</body>
</html>
