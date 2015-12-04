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
 - phpeeckem nainsertovat sedadla
 - do programu kalendar - jinak zobrazovat dnes, zitra, pozitri...a pak kalendar
 - poazadi - minimalne vybrat lepsi barvu
-->
<body>
	<?php include 'header.php'; ?>
	<div class="content">
		<?php require_once 'db_connection.php'; ?>
		<h2>Nejnovější filmy</h2>
		<?php
			$sql = "SELECT nazev, delka FROM Film ORDER BY id_filmu DESC LIMIT 6";
			//$stmt = $db->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
			$result = $db->query($sql);
			if ($result->num_rows > 0)
			{
				//echo("<div>");
				$divide = 0;
				while($row = $result->fetch_assoc())
				{
					if($divide % 3 == 0)
						echo("<div class='movies'>");
					echo("<table class='moviesTable'>");
					echo("<tr><td style='min-height: 80px'>IMG</td></tr>");
					echo("<tr><td>" . $row["nazev"] . "</td></tr>");
					echo("<tr><td>" . $row["delka"] . "minut</td></tr>");
					echo("</table>");
					if($divide % 3 == 2)
						echo("</div>");
					$divide++;
					/*
					echo("<span class='movie'>");
					echo("IMG</br>");
					echo("Nazev: " . $row["nazev"] . "</br>");
					echo("Delka: " . $row["delka"] . "</br>");
					echo("</br></span>");*/
				}
				//echo("</div>");
			}
			else
			    echo ("DEBUG: Chyba sql: " . $db->error);
		?>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
